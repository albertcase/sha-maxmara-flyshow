<?php
namespace app\modules\flyshow\Forms;

use yii\base\Model;
use Yii;
use app\modules\flyshow\classes\database;

class backLogin extends Model
{
    public $username;
    public $password;

    public function rules()
    {
        return [
          ['username', 'filter', 'filter' => 'trim'],
          ['username', 'required'],
          ['username', 'match', 'pattern' => '/^.{1,30}$/'],

          ['password', 'filter', 'filter' => 'trim'],
          ['password', 'required'],
          ['password', 'match', 'pattern' => '/^.{1,30}$/'],
        ];
    }

    public function initPost()
    {
      $this->load(array("backLogin" => Yii::$app->request->post()));
    }

    public function doData()
    {
        if ($this->validate()) {
          return $this->updateall();
        }
        return array('code' => '11', 'msg' => 'input error');//request field error
    }

    public function updateall(){
      $admin = array(
        'admin' => 'maxmarasamesamechina',
      );
      if(isset($admin[$this->username])){
        if($admin[$this->username] == $this->password){
          \Yii::$app->session->set('user', $this->username);
          return array(
            'code' => '10',
            'msg' => 'login success',
          );
        }
      }
      return array(
        'code' => '9',
        'msg' => 'password or username error',
      );
    }


}
