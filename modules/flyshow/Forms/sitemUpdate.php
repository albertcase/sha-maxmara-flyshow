<?php
namespace app\modules\flyshow\Forms;

use yii\base\Model;
use Yii;
use app\modules\flyshow\classes\database;

class sitemUpdate extends Model
{
    public $imagepath;
    public $title;
    public $mid;

    public function rules()
    {
        return [
            ['imagepath', 'filter', 'filter' => 'trim'],
            ['imagepath', 'required'],

            ['title', 'filter', 'filter' => 'trim'],
            ['title', 'required'],

            ['mid', 'filter', 'filter' => 'trim'],
            ['mid', 'required'],
            ['mid', 'integer'],
            ['mid', 'match', 'pattern' => '/^[2-3]$/'],
        ];
    }

    public function initPost()
    {
      $this->load(array("sitemUpdate" => Yii::$app->request->post()));
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
      if($_db->updateData(array('id' => $this->mid), array('name' => $this->title, 'path' => $this->imagepath), 'flyshow'))
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
