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

}
