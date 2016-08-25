<?php
namespace app\modules\flyshow\classes;

use Yii;
use yii\web\Controller;
use app\modules\wechat\classes\wechatCallbackapiTest;

/**
* ACM for Memcached
*/
class memcache
{
	public $server;
	public $port;
	public $prostr;
	private $memcache;

	function __construct()
	{
	    $this->memcache =  new \Memcached();
	    $this->memcache->addServer($this->server, $this->port);
	}

	function addDatas(array $data){
	    foreach($data as $x)
		$this->addData($x['key'],$x['val'],$x['limit']);
	}

	function addData($key,$val,$limit = 0)
	{
		$key = $this->prostr.':'.$key;
		$this->memcache->set($key, $val , $limit);
	}

	function getData($key)
	{
		$key = $this->prostr.':'.$key;
		return $this->memcache->get($key);
	}

	function getDatas($data)
	{
		$out = array();
		foreach($data as $x)
		    $out[$x] = $this->getData($x);
		return $out;
	}

	function delData($key ,$delay='0')
	{
	  $key = $this->prostr.':'.$key;
	  return $this->memcache->delete($key, $delay);
	}

	function delDatas($data)
	{
	  foreach($data as $x)
		    $this->dalData($x);
	}

	function rewriteData($key ,$key_val ,$limit = 0)
	{
	  $key = $this->prostr.':'.$key;
	  $this->memcache->set($key, $val , $limit);
	}

}
