<?php

class Testcontroller {

	function test(){
	$url="http://".$_SERVER['HTTP_HOST'].":".$_SERVER['SERVER_PORT'].$_SERVER['REQUEST_URI'];
	$pos = strrpos ($url,'php');
	$len = strlen($url);
	$str = substr($url, $pos+4, $len-$pos);
	$len = strlen($str);
	$pos = strrpos ($str,'/');
	$method = substr($str, $pos+1, $len-$pos);
	$controller = substr($str, 0, $pos);
	$controller = ucwords($controller)."Controller";
	$controllerFile = ucwords($controller).".php";

	$filepath = $_SERVER['DOCUMENT_ROOT']."/wp-content/plugins/in-api/modules/Test/Controller"."/".$controllerFile;
	if (!file_exists($filepath))
	 	$error =  "Error: Controller File does not exist!!";
	else
	{
		include_once($controllerFile);
		$instance = new $controller();
		if (!method_exists($instance, $method))
		 	$error =  "Error: This method does not exist in this controller!!";
		else
		 	$error =  "";

	}
		unset($instance);
		return $error;
	}
}
?>