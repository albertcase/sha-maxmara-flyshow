<?php

namespace app\modules\flyshow\controllers;

use Yii;
use yii\web\Controller;

class MainController extends Controller
{
    public function actionIndex(){
      $data = array(
        array(
          'title' => 'Max Mara群星璀璨',
          'img' => '/vstyle/img/homepage.jpg',
          'comment' => '图片来源：Femina',
        ),
        array(
          'title' => '大片星赏',
          'img' => '/vstyle/img/loadpage-2.jpg',
          'comment' => '图片来源：Femina',
          'son' => array(
            array('title' => 'Max Mara群星璀璨', 'img' => '/vstyle/img/pro-1.jpg', 'comment' => '图片来源：Femina0'),
            array('title' => 'Max Mara群星璀璨', 'img' => '/vstyle/img/pro-1.jpg', 'comment' => '图片来源：Femina1'),
            array('title' => 'Max Mara群星璀璨', 'img' => '/vstyle/img/pro-1.jpg', 'comment' => '图片来源：Femina2'),
            array('title' => 'Max Mara群星璀璨', 'img' => '/vstyle/img/pro-1.jpg', 'comment' => '图片来源：Femina3'),
          ),
        ),
        array(
          'title' => '星动瞬间',
          'img' => '/vstyle/img/loadpage-3.jpg',
          'comment' => '图片来源：Femina',
          'son' => array(
            array('title' => 'Max Mara群星璀璨', 'img' => '/vstyle/img/pro-1.jpg', 'comment' => '图片来源：FeminaA'),
            array('title' => 'Max Mara群星璀璨', 'img' => '/vstyle/img/pro-1.jpg', 'comment' => '图片来源：FeminaB'),
            array('title' => 'Max Mara群星璀璨', 'img' => '/vstyle/img/pro-1.jpg', 'comment' => '图片来源：FeminaC'),
            array('title' => 'Max Mara群星璀璨', 'img' => '/vstyle/img/pro-1.jpg', 'comment' => '图片来源：FeminaD'),
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
        $data = array(
          array(
            'title' => '首页',
            'img' => '/vstyle/img/homepage.jpg',
            'comment' => '图片来源：Femina',
            'mson' => array(
                array(
                  'title' => '大片星赏',
                  'img' => '/vstyle/img/loadpage-2.jpg',
                  'comment' => '图片来源：Femina',
                  'son' => array(
                    array('title' => 'Max Mara群星璀璨1', 'img' => '/vstyle/img/pro-1.jpg', 'comment' => '图片来源：Femina'),
                    array('title' => 'Max Mara群星璀璨2', 'img' => '/vstyle/img/pro-1.jpg', 'comment' => '图片来源：Femina'),
                    array('title' => 'Max Mara群星璀璨3', 'img' => '/vstyle/img/pro-1.jpg', 'comment' => '图片来源：Femina'),
                    array('title' => 'Max Mara群星璀璨4', 'img' => '/vstyle/img/pro-1.jpg', 'comment' => '图片来源：Femina'),
                  ),
                ),
                array(
                  'title' => '星动瞬间',
                  'img' => '/vstyle/img/loadpage-3.jpg',
                  'comment' => '图片来源：Femina',
                  'son' => array(
                    array('title' => 'Max Mara群星璀璨1', 'img' => '/vstyle/img/pro-1.jpg', 'comment' => '图片来源：Femina'),
                    array('title' => 'Max Mara群星璀璨2', 'img' => '/vstyle/img/pro-1.jpg', 'comment' => '图片来源：Femina'),
                    array('title' => 'Max Mara群星璀璨3', 'img' => '/vstyle/img/pro-1.jpg', 'comment' => '图片来源：Femina'),
                    array('title' => 'Max Mara群星璀璨4', 'img' => '/vstyle/img/pro-1.jpg', 'comment' => '图片来源：Femina'),
                  ),
                ),
              ),
          ),
        );
        return $this->renderPartial('backend', array('data' => $data));
      }else{
        return $this->renderPartial('login');
      }
    }
}
