<?php

namespace app\modules\flyshow\controllers;

use Yii;
use yii\web\Controller;

class ApiController extends Controller
{
    public function actionIndex(){
      return $this->render('/main/index');
    }

    public function actionBankend(){
      return $this->render('/main/index');
    }

}
