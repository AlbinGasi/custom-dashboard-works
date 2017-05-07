<?php
require_once 'core/init.php';

$data = new GetHandler;

if(isset($_GET['category'])){
	$category = $_GET['category'];
	if($category == "all"){
		$data->getAllPhoto();
	}else{
		$data->getPhotoByCat($category);
	}
}

?>