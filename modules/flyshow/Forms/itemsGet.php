<?php
namespace app\modules\flyshow\Forms;

use yii\base\Model;
use Yii;
use app\modules\flyshow\classes\database;

class itemsGet extends Model
{

    public function rules()
    {
        return [];
    }

    public function initPost()
    {
      $this->load(array("itemsGet" => Yii::$app->request->post()));
    }

    public function doData()
    {
        if ($this->validate()) {
          return $this->updateall();
        }
        return array('code' => '11', 'msg' => 'input error');//request field error
    }

    public function frontData(){
      $_db = new database();
      if($keys = $_db->searchData(array() ,array(), 'flyshow')){
        $hier = $_db->searchData(array() ,array(), 'hierarchy');
        return array(
          'code' => '10',
          'data' => $this->frontFmt($keys, $hier),
          'msg' => 'success'
        );
      }
      return array(
        'code' => '9',
        'msg' => 'there are not any slide show data',
        'data' => array()
      );
    }

    public function frontFmt($keys, $hier){
      $list =  $this->sliceFmt($keys, $hier);
      $out = array();
      $out['0'] = array();
      if(isset($list['0'])){
        $out = array_merge($out, $list['0']["son"]);
      }
      unset($list['0']["son"]);
      $out['0'] = $list[0];
      return $this->changeKeyname($out);
    }

    public function changeKeyname($keys){
      $out = array();
      if(!is_array($keys))
        return $keys;
      foreach($keys as $x => $_val){
        if($x == '0')
          $x = '0';
        if($x == 'name')
          $x = 'title';
        if($x == 'path'){
          $x = 'img';
          $_val = ltrim($_val, '/');
          $_val = "/cimg.php?style=w_600&image=".$_val;
        }
        $out[$x] = $this->changeKeyname($_val);
      }
      return $out;
    }

    public function updateall(){
      $_db = new database();
      if($keys = $_db->searchData(array() ,array(), 'flyshow')){
        $hier = $_db->searchData(array() ,array(), 'hierarchy');
        return array(
          'code' => '10',
          'data' => $this->sliceFmt($keys, $hier),
          'msg' => 'success'
        );
      }
      return array(
        'code' => '9',
        'msg' => 'there are not any slide show data',
        'data' => array()
      );
    }

    public function flyshowFmt($keys){
      $out = array();
      foreach($keys as $x){
        $out[$x['id']] = $x;
      }
      return $out;
    }

    public function hierarchyFmt($hier){
      $out = array();
      foreach($hier as $x){
        if(!isset($out[$x['parent']]))
          $out[$x['parent']] = array();
        array_push($out[$x['parent']], $x['tid']);
      }
      ksort($out);
      return $out;
    }

    public function sliceFmt($keys, $hier){
      $out = array();
      $keys = $this->flyshowFmt($keys);
      $hier = $this->hierarchyFmt($hier);
      return $this->subFmat($keys, $hier);
    }

    public function subFmat($keys, $hier){
      $out = array();
      foreach($hier['0'] as $x){
        array_push($out, $this->nFmt($keys[$x], $x, $keys, $hier));
      }
      return $out;
    }

    public function widthFmat($shier,$keys){
      $out = array();
      foreach($shier as $x){
        $out[$keys[$x]['width']] = $x;
      }
      ksort($out);
      return $out;
    }

    public function nFmt($n, $nid, $keys, $hier){
      if(isset($hier[$nid])){
        $n['type'] = 'mslid';
        $n['son'] = array();
        $hi = $this->widthFmat($hier[$nid],$keys);
        foreach($hi as $x){
          array_push($n['son'], $this->nFmt($keys[$x], $x, $keys, $hier));
        }
      }else{
        $n['type'] = 'lslid';
      }
      return $n;
    }

}
