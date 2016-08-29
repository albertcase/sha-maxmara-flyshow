<?php
namespace app\modules\flyshow\Forms;

use yii\base\Model;
use Yii;
use app\modules\flyshow\classes\database;

class litemInsert extends Model
{
    public $imagepath;
    public $title;
    public $tid;
    public $comment;

    public function rules()
    {
        return [
            ['imagepath', 'filter', 'filter' => 'trim'],
            ['imagepath', 'required'],

            ['title', 'filter', 'filter' => 'trim'],
            ['title', 'required'],

            ['comment', 'filter', 'filter' => 'trim'],
            ['comment', 'required'],

            ['tid', 'filter', 'filter' => 'trim'],
            ['tid', 'required'],
            ['tid', 'integer'],
            ['tid', 'match', 'pattern' => '/^[2-3]$/'],
        ];
    }

    public function initPost()
    {
      $this->load(array("litemInsert" => Yii::$app->request->post()));
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
      $width = intval(($_db->getcount('hierarchy' , array('parent' => $this->tid)))) + 1;
      if($tid = $_db->insertData(array('width' => $width, 'comment' => $this->comment,'name' => $this->title, 'path' => $this->imagepath), 'flyshow')){
        $_db->insertUData(array('tid' => $tid, 'parent' => $this->tid), 'hierarchy');
        return array(
          'code' => '10',
          'msg' => 'insert success',
        );
      }
      return array(
        'code' => '9',
        'msg' => 'insert failed',
      );
    }

}
