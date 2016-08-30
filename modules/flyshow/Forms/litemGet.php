<?php
namespace app\modules\flyshow\Forms;

use yii\base\Model;
use Yii;
use app\modules\flyshow\classes\database;

class litemGet extends Model
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
      $this->load(array("litemGet" => Yii::$app->request->post()));
    }

    public function doData()
    {
        if ($this->validate()) {
          return $this->updateall();
        }
        return array('code' => '11', 'msg' => 'input error');//request field error
    }

    public function updateall(){
      $_db = new database();
      if($data = $_db->searchData(array('id' => $this->mid) ,array('id', 'path', 'name', 'comment'), 'flyshow'))
        return array(
          'code' => '10',
          'data' => $data[0],
          'msg' => 'get success',
        );
      return array(
        'code' => '9',
        'msg' => 'get failed',
      );
    }

}
