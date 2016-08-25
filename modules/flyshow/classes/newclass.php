<?php
namespace app\modules\flyshow\classes;


class newclass{
    public function name($name){
    	$apis = '\app\modules\flyshow\classes\\'.$name;
    	return new $apis();
    }
}
