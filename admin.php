<?php
require_once 'core/init.php';

if(Users::is_loggedin()){
		if(!Users::can_view()){
		View::getPages('login');
		return false;
	}
}else{
	View::getPages('login');
	return false;
}


Template::setTitle('Your Dashboard');
$header = new Template('admin','header');
$sidebar = new Template('admin','sidebar');

	if(isset($_GET['action'])){
		$action = $_GET['action'];
		
		if(file_exists("includes/pages/{$action}.inc.php")){
			View::getPages($action);
		}else{
			View::getPages('404');
		}
	}else{
		View::getPages('home');
	}

$footer = new Template('admin','footer');
?>