<?php 
require_once '../../core/init.php';
if(isset($_POST['id'])){
	$entity = new Entity;
	$id = trim($_POST['id']);
	$entity->delete_category($id);
}
?>