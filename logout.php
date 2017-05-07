<?php
require_once 'core/init.php';
if(Users::is_loggedin()){
	$siteHASH = Config::get('hash_key');
	unset($_SESSION[$siteHASH]);
	//session_unset();
	//session_destroy();
	header("Location:" . $_SERVER['HTTP_REFERER']);
}else{
	header("Location: admin.php");
}
?>