<?php
namespace app\modules\flyshow;

use Yii;

class Module extends \yii\base\Module
{

    public function init()
    {
         parent::init();
         \Yii::configure($this, require(__DIR__ . '/config/main.php'));
        $this->id = 'flyshow';
    }
}
