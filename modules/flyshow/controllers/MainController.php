<?php

namespace app\modules\flyshow\controllers;

use Yii;
use yii\web\Controller;
use app\modules\flyshow\Forms as Forms;

class MainController extends Controller
{
    public function actionIndex(){
      $data = array(
        array(
          'title' => '首页',
          'img' => '/vstyle/img/homepage.jpg',
          'comment' => '图片来源：Femina',
        ),
        array(
          'title' => '大片星赏',
          'img' => '/vstyle/img/loadpage-2.jpg',
          'comment' => '图片来源：Femina',
          'son' => array(
            array('title' => 'Max Mara群星璀璨', 'img' => '/vstyle/img/pro-1.jpg', 'comment' => '图片来源：Femina'),
            array('title' => 'Max Mara群星璀璨', 'img' => '/vstyle/img/pro-1.jpg', 'comment' => '图片来源：Femina'),
            array('title' => 'Max Mara群星璀璨', 'img' => '/vstyle/img/pro-1.jpg', 'comment' => '图片来源：Femina'),
            array('title' => 'Max Mara群星璀璨', 'img' => '/vstyle/img/pro-1.jpg', 'comment' => '图片来源：Femina'),
          ),
        ),
        array(
          'title' => '星动瞬间',
          'img' => '/vstyle/img/loadpage-3.jpg',
          'comment' => '图片来源：Femina',
          'son' => array(
            array('title' => 'Max Mara群星璀璨', 'img' => '/vstyle/img/pro-1.jpg', 'comment' => '图片来源：Femina'),
            array('title' => 'Max Mara群星璀璨', 'img' => '/vstyle/img/pro-1.jpg', 'comment' => '图片来源：Femina'),
            array('title' => 'Max Mara群星璀璨', 'img' => '/vstyle/img/pro-1.jpg', 'comment' => '图片来源：Femina'),
            array('title' => 'Max Mara群星璀璨', 'img' => '/vstyle/img/pro-1.jpg', 'comment' => '图片来源：Femina'),
          ),
        ),
      );
      return $this->render('index', array('data' => $data));
    }

    public function actionUploadimg(){
      $response = \Yii::$app->response;
      $response->format = \yii\web\Response::FORMAT_JSON;
      $response->data = array();
      return $response;
    }

    public function actionBackend(){
      if(!\Yii::$app->session->has('user')){
        $form = new Forms\itemsGet();
        $data = $form->doData();
        if($data['code'] == '10')
          $data = $data['data'];
        else
          $data = array();
        return $this->renderPartial('backend', array('data' => $data));
      }else{
        return $this->renderPartial('login');
      }
    }
}
