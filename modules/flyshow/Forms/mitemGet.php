<?php
namespace app\modules\flyshow\Forms;

use yii\base\Model;
use Yii;
use app\modules\flyshow\classes\database;

class mitemGet extends Model
{
    public $mid = 1;

    public function rules()
    {
        return [

        ];
    }

    public function initPost()
    {
      $this->load(array("mitemGet" => Yii::$app->request->post()));
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
      if($data = $_db->searchData(array('id' => $this->mid) ,array('path', 'name'), 'flyshow'))
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
