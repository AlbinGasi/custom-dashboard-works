<?php 
require_once '../../core/init.php';

$get = new GetHandler;

if(isset($_POST['send'])){
	$all_categories = $get->getAllCategories();
	$setted_cat = trim($_POST['category_name']);
	$photo_id = trim($_POST['id']);
	$photo_description = $get->getPhotoDescription($photo_id);
	
	echo '<input id="photo-id" type="hidden" id="photo-id" value="'.$photo_id.'">';
	echo '<h5>Photo Category</h5>';
	echo '<select class="form-control" id="change-photo-category">';
	foreach($all_categories as $category){
		if($setted_cat == $category['category_name']){
			echo '<option class="input-edit-category" value="'.$category['category_id'].'" selected>'.$category['category_name'].'</option>';
		}else{
			echo '<option class="input-edit-category" value="'.$category['category_id'].'">'.$category['category_name'].'</option>';
		}
	}
	echo '</select>';
	
	echo '<br><h5>Photo Description</h5>';
	echo '<textarea id="photo-edit-description" class="form-control" rows="4" cols="30">'.$photo_description.'</textarea>';
}
?>