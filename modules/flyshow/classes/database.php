<?php
namespace app\modules\flyshow\classes;

use Yii;

class database
{
    private $_db;

    public function __construct(){
      $this->_db = \Yii::$app->db;
    }

    public function checkData(array $data=array() , $table){
    	$rows = (new \yii\db\Query())
    	    ->select(array())
    	    ->from($table)
    	    ->where($this->buildparm($data), $this->buildval($data))
    	    ->limit(1)
    	    ->all();
    	 if($rows)
    	    return true;
    	 return false;
    }

    public function getcount($table , $data=array()){
      $rows = (new \yii\db\Query())
          ->select(array())
          ->from($table)
          ->where($this->buildparm($data), $this->buildval($data));
      return $rows->count();
    }

    public function searchData(array $data=array() ,array $dataout=array(), $table, $order ='', $limit = 0 ,$offset = 0){
      $rows = (new \yii\db\Query())
          ->select($dataout)
          ->from($table)
          ->where($this->buildparm($data), $this->buildval($data))
          ->orderBy($order);
       if($limit > 0)
          $rows = $rows->limit($limit);
       if($order != '')
          $rows = $rows->orderBy($order);
       if($offset > 0)
          $rows = $rows->offset($offset);
       $rows = $rows->all();
       if($rows)
          return $rows;
       return false;
    }

    public function getLastid($id = ''){
      return $this->_db->getLastInsertID($id);
    }

    public function insertData(array $data=array(), $table){
    	  $result = $this->_db->createCommand()->insert($table, $data)->execute();
        if($result)
          return $this->_db->getLastInsertID();
        return false;
    }

    public function insertUData(array $data=array(), $table){
      if(!$this->checkData($data ,$table))
          return $this->_db->createCommand()->insert($table, $data)->execute();
      return false;
    }

    public function insertUDatas(array $data=array(), $table){
    	foreach($data as $x){
    	    if($this->checkData($x, $table))
    		    continue;
    	    $this->insertData($x, $table);
    	}
    	return true;
    }

    public function updateData(array $data=array() ,array $change=array(), $table){
    	if($this->checkData($data ,$table))
    	  return $this->_db->createCommand()->update($table, $change, $this->buildparm($data), $this->buildval($data))->execute();
    	return false;
    }

    public function delData(array $data=array(), $table){
    	if($this->checkData($data ,$table))
    	    return $this->_db->createCommand()->delete($table, $this->buildparm($data), $this->buildval($data))->execute();
    	return false;
    }

    public function delDatas(array $data=array(), $table){
    	foreach($data as $x){
    	    $this->delData($x ,$table);
    	}
    	return true;
    }

    public function executeSql($sql){
      $command = $this->_db->createCommand($sql);
      $command->execute();
      return true;
    }

    public function selectSql($sql){
      $command = $this->_db->createCommand($sql);
      return $command->queryAll();
    }

//sub function
    public function buildparm($data){
      $data = array_keys($data);
      $keys = array();
      foreach($data as $x){
        $keys[] = $x.'=:'.$x;
      }
      return implode(' and ', $keys);
    }

    public function buildval($data){
      $out = array();
      foreach($data as $x => $x_val){
        $out[':'.$x] = $x_val;
      }
      return $out;
    }
}
