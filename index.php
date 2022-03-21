<?php 
session_start();
require 'config.php';
spl_autoload_register(function ($class){
    if(strpos($class,'Controller') > -1){
    if(file_exists('controllers/'.$class.'.php')){
    	 require_once 'controllers/'.$class.'.php';
      }else{
         require 'naoencontrado.html';exit;
      }
	}elseif (file_exists('classes/'.$class.'.php')) {
		  require_once 'classes/'.$class.'.php';
        

	}else{
		  require_once 'core/'.$class.'.php';
	}
});
  $core = new Core();
  $core ->run();

 ?> ?>