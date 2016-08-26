<?php

namespace app\modules\flyshow\controllers;

use Yii;
use yii\web\Controller;

class MainController extends Controller
{
    public function actionIndex(){
      $data = array(
        array(
          'title' => 'title-1',
          'img' => '/vstyle/img/homepage.jpg',
          'comment' => '图片来源：Femina',
        ),
        array(
          'title' => 'title-2',
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
          'title' => 'title-3',
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
      return $response;
    }

    public function actionBackend(){
      if(\Yii::$app->session->has('user')){
        return $this->renderPartial('backend');
      }else{
        return $this->renderPartial('login');
      }
    }
}
