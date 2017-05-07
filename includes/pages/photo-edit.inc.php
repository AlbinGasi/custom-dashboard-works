<?php 
require_once '../../core/init.php';

if(isset($_POST['action'])){
	$entity = new Entity;
	$category_id = (isset($_POST['category_id'])) ? trim($_POST['category_id']) : 'none';
	$photo_id = trim($_POST['photo_id']);
	$photo_description = trim($_POST['photo_description']);
	
	if($category_id == "none"){
		Alerts::get_alert('info','No change! ', ' There is no change!');
	}else{
		if($entity->edit_photo_category(['category_id'=>$category_id, 'photo_id'=>$photo_id, 'photo_description'=>$photo_description])){
			Alerts::get_alert('success','Success! ', '  You successfully changed a photo data!');
			echo '<input type="hidden" id="check-status" value="success">';
		}else{
			Alerts::get_alert('danger','Error! ', ' There is some error!');
			echo '<input type="hidden" id="check-status" value="error">';
		}
	}
	
	
}
?>