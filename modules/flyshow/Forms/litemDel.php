<?php
namespace app\modules\flyshow\Forms;

use yii\base\Model;
use Yii;
use app\modules\flyshow\classes\database;

class litemDel extends Model
{
    public $mid;

    public function rules()
    {
        return [
          ['mid', 'filter', 'filter' => 'trim'],
          ['mid', 'required'],
          ['mid', 'integer'],
          ['mid', 'match', 'pattern' => '/((^[4-9]$)|(^[0-9]{2,6}$))/'],
        ];
    }

    public function initPost()
    {
      $this->load(array("litemDel" => Yii::$app->request->post()));
    }

    public function doData()
    {
        if ($this->validate()) {
          return $this->updateall();
        }
        return array('code' => '11', 'msg' => 'input error');//request field error
    }

    public function arrayFmat($data, $key){
      $out = array();
      foreach($data as $x){
        $out[] = $x[$key];
      }
      return $out;
    }

    public function updateall(){
      $_db = new database();
      if($ws = $_db->searchData(array('id' => $this->mid), array('width'), 'flyshow')){
        if($parent = $_db->searchData(array('tid' => $this->mid), array('parent'), 'hierarchy')){
          $son = $_db->searchData(array('parent' => $parent[0]['parent']), array('tid'), 'hierarchy');
          $son = $this->arrayFmat($son, 'tid');
          $son = implode(",", $son);
          $sql = "UPDATE flyshow SET width = width-1 WHERE width > {$ws['0']['width']} AND id in ({$son})";
          $_db->executeSql($sql);
        }
        $data = $_db->delData(array('id' => $this->mid), 'flyshow');
        return array(
          'code' => '10',
          'msg' => 'delete success',
        );
      }
      return array(
        'code' => '9',
        'msg' => 'delete failed',
      );
    }

}
