<?php
namespace app\modules\flyshow\classes;

class strTest{
  public function email($key){
    return $this->reg($key ,"/^[0-9a-zA-Z._-]+@[0-9a-zA-Z]+(\.[0-9a-zA-Z]+){0,3}$/");
  }

  public function number($key){
    return $this->reg($key ,"/^-{0,1}[0-9]+$/");
  }

  public function telphone($key){
    return $this->reg($key ,"/^([\+]{0,1}[0-9]{1,5}[\s-]{0,1}){0,1}[0-9]+$/");
  }

  public function text($key){
    return $key;
  }

  public function reg($key ,$reg){
    return preg_match($reg ,trim($key));
  }

  public function comfirmKeys($keys){ /*array(array('key' => key ,'type'=> post/get ,'regtype'=> regtype ,$selfReg => '') )*/
    $out = array();
    $k = '';
    $request = \Yii::$app->request;
    foreach($keys as $x){
      $k = $request->$x['type']($x['key'] ,'');
      if($x['regtype'] != 'text'){
          if(!$this->$x['regtype']($k)){
            return false;
          }
      }
      $out = $out + array($x['key'] => $k);
      unset($k);
    }
    return $out;
  }

  public function uselykeys($keys){
    $out = array();
    $kk = $this->comfirmKeys($keys);
    if(!is_array($kk))
      return false;/*format error*/
    foreach($kk as $x => $x_val){
      if($x_val != '')
        $out[$x] = $x_val;
    }
    unset($kk, $x_val, $x);
    if(count($out)>0)
      return $out;
    return true;
  }
}
