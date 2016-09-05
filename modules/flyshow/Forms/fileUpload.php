<?php
namespace app\modules\flyshow\Forms;

use yii\base\Model;
use Yii;
use yii\web\UploadedFile;
use app\modules\flyshow\classes\database;

class fileUpload extends Model
{
    public $uploadfile;

    public function rules()
    {
        return [
          [['uploadfile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg, jpeg'],
        ];
    }

    public function initPost()
    {
      $this->uploadfile = UploadedFile::getInstance($this, 'uploadfile');
    }

    public function doData()
    {
        if ($this->validate()) {
          return $this->updateall();
        }
        return array('code' => '11', 'msg' => 'input error');//request field error
    }

    public function updateall(){
      $newpath = 'upload/img/' . uniqid() . '.' . $this->uploadfile->extension;
      if($this->uploadfile->saveAs($newpath));
        return array(
          'code' => '10',
          'path' => '/'.$newpath,
          'msg' => 'upload success',
        );
      return array(
        'code' => '9',
        'msg' => 'upload failed',
      );
    }

}
