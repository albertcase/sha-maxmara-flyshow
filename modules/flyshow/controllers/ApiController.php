<?php

namespace app\modules\flyshow\controllers;

use Yii;
use yii\web\Controller;
use app\modules\flyshow\Forms as Forms;

class ApiController extends Controller
{
    public function actionIndex(){
      return $this->render('/main/index');
    }

    public function actionBankend(){
      return $this->render('/main/index');
    }

    public function actionMitemupdate(){
      $form = new Forms\mitemUpdate();
      $form->initPost();
      $response = \Yii::$app->response;
      $response->format = \yii\web\Response::FORMAT_JSON;
      $response->data = $form->doData();
      return $response;
    }

    public function actionSitemupdate(){
      $form = new Forms\sitemUpdate();
      $form->initPost();
      $response = \Yii::$app->response;
      $response->format = \yii\web\Response::FORMAT_JSON;
      $response->data = $form->doData();
      return $response;
    }

    public function actionLitemupdate(){
      $form = new Forms\litemUpdate();
      $form->initPost();
      $response = \Yii::$app->response;
      $response->format = \yii\web\Response::FORMAT_JSON;
      $response->data = $form->doData();
      return $response;
    }

    public function actionLiteminsert(){
      $form = new Forms\litemInsert();
      $form->initPost();
      $response = \Yii::$app->response;
      $response->format = \yii\web\Response::FORMAT_JSON;
      $response->data = $form->doData();
      return $response;
    }

    public function actionItemsget(){
      $form = new Forms\itemsGet();
      $response = \Yii::$app->response;
      $response->format = \yii\web\Response::FORMAT_JSON;
      $response->data = $form->doData();
      return $response;
    }

    public function actionMitemget(){
      $form = new Forms\mitemGet();
      $response = \Yii::$app->response;
      $response->format = \yii\web\Response::FORMAT_JSON;
      $response->data = $form->doData();
      return $response;
    }

    public function actionSitemget(){
      $form = new Forms\sitemGet();
      $form->initPost();
      $response = \Yii::$app->response;
      $response->format = \yii\web\Response::FORMAT_JSON;
      $response->data = $form->doData();
      return $response;
    }

    public function actionLitemget(){
      $form = new Forms\litemGet();
      $form->initPost();
      $response = \Yii::$app->response;
      $response->format = \yii\web\Response::FORMAT_JSON;
      $response->data = $form->doData();
      return $response;
    }

    public function actionFileupload(){
      $form = new Forms\fileUpload();
      $form->initPost();
      $response = \Yii::$app->response;
      $response->format = \yii\web\Response::FORMAT_JSON;
      $response->data = $form->doData();
      return $response;
    }

    public function actionLitemdel(){
      $form = new Forms\litemDel();
      $form->initPost();
      $response = \Yii::$app->response;
      $response->format = \yii\web\Response::FORMAT_JSON;
      $response->data = $form->doData();
      return $response;
    }

    public function actionNewranking(){
      $form = new Forms\newRanking();
      $form->initPost();
      $response = \Yii::$app->response;
      $response->format = \yii\web\Response::FORMAT_JSON;
      $response->data = $form->doData();
      return $response;
    }
}
