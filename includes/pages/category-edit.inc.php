<?php 
require_once '../../core/init.php';

if(isset($_POST['id'])){
	$entity = new Entity;
	$id = trim($_POST['id']);
	$category_name = trim($_POST['category_name']);
	$category_name = mb_strtolower($category_name, mb_detect_encoding($category_name));
	
	$categoryValidate = $entity->validate('categoryadd', ['category_name'=>$category_name]);
	
	if($categoryValidate == 'success'){
		$entity->edit_category($id, $category_name);
		echo "Success";
	} else {
		foreach($categoryValidate as $categoryError){
			//Alerts::get_alert('danger','Error! ', $categoryError);
			echo $categoryError;
		}
	}
	
	
}
?>