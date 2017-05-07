<?php 
require_once '../../core/init.php';
if(isset($_POST['id'])){
	$entity = new Entity;
	$id = trim($_POST['id']);
	$photo_name = trim($_POST['photo_name']);
	$entity->delete_photo($id);
	
	$image_store = '../uploads/images/'.$photo_name;
	if(@unlink($image_store)){
		
	} else {
		
	}
}
?>