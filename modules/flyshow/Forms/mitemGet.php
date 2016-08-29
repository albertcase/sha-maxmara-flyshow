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
            ['imagepath', 'filter', 'filter' => 'trim'],
            ['imagepath', 'required'],

            ['title', 'filter', 'filter' => 'trim'],
            ['title', 'required'],
        ];
    }

    public function initPost()
    {
      $this->load(array("mtimeUpdate" => Yii::$app->request->post()));
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
      if($_db->searchData(array('id' => $this->mid) ,array('path', 'name'), 'mitem'), 'mitem'))
        return array(
          'code' => '10',
          'msg' => 'update success',
        );
      return array(
        'code' => '9',
        'msg' => 'update failed',
      );
    }

}
