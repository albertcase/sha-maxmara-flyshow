<?php
namespace app\modules\flyshow\Forms;

use yii\base\Model;
use Yii;
use app\modules\flyshow\classes\database;

class newRanking extends Model
{
    public $ranking;

    public function rules()
    {
        return [
          ['ranking', 'filter', 'filter' => 'trim'],
          ['ranking', 'required'],
        ];
    }

    public function initPost()
    {
      $this->load(array("newRanking" => Yii::$app->request->post()));
    }

    public function doData()
    {
        if ($this->validate()) {
          $this->ranking = json_decode($this->ranking);
          return $this->updateall();
        }
        return array('code' => '11', 'msg' => 'input error');//request field error
    }

    public function updateall(){
      $this->sqlRanking();
      return array(
        'code' => '10',
        'msg' => 'rank success',
      );
    }

    public function sqlRanking(){
      $_db = new database();
      $hier = $_db->searchData(array() ,array(), 'hierarchy');
      $hier = $this->hierarchyFmt($hier);
      foreach($this->ranking as $x => $x_val){
        $width = 1;
        foreach($x_val as $k){
          if(isset($hier[$x])){
            if(in_array($k ,$hier[$x])){
              $_db->updateData(array('id' => $k), array('width' => $width), 'flyshow');
              $width++;
            }
          }
        }
      }
    }

    public function hierarchyFmt($hier){
      $out = array();
      foreach($hier as $x){
        if(!isset($out[$x['parent']]))
          $out[$x['parent']] = array();
        array_push($out[$x['parent']], $x['tid']);
      }
      ksort($out);
      return $out;
    }

}
