<?php

namespace app\modules\flyshow\controllers;

use Yii;
use yii\web\Controller;

class MainController extends Controller
{
    public function actionIndex(){
      return $this->render('index');
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
