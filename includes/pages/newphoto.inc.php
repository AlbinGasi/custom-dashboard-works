<div id="page-inner">
	<div class="row">
		<div class="col-md-12">
			<h2>Add new photo</h2>   
			<h5></h5>
			<hr />
			</div>
			<form action="" method="POST" enctype="multipart/form-data">
			<div class="col-md-4 col-sm-4">
				<div class="form-group">
				  <label for="category">Category: <span style="color:#777;font-style:italic;font-size:12px;">(required)</span></label>
				  <select class="form-control" id="category" name="category">
				  <option value=""></option>
				  <?php 
				  $get = new GetHandler;
				  $categories = $get->getAllCategories();
					foreach($categories as $category){
						echo "<option value='".$category['category_id']."'>".ucfirst($category['category_name'])."</option>";
					}
				  ?>
				  </select>
				</div>
			</div>
			<div class="col-md-8 col-sm-8">
				<label>Choose your image: <span style="color:#777;font-style:italic;font-size:12px;">(required)</span></label><br>
				 <input type="file" name="upload_photo" class="form-control"><br>
				 <label>Describe photo: <span style="color:#777;font-style:italic;font-size:12px;">(optional)</span></label>
				 <textarea name="photo_description" class="form-control" rows="4" cols="50"></textarea><br>
				 <input type="submit" class="btn btn-success square-btn-adjust form-control" value="Upload" name="btn-submit">
			</div>
			</form>
			
<div class="col-md-12">
<hr>
<?php

	if(isset($_POST['btn-submit'])){
		// Image 
		$photoExt = pathinfo($_FILES['upload_photo']['name'],PATHINFO_EXTENSION); // .jpg
		
		$photoName = uniqid() . '_' . $_FILES['upload_photo']['name'];
		$photoType = (!empty($_FILES['upload_photo']['tmp_name'])) ? getimagesize($_FILES['upload_photo']['tmp_name']) : false;
		$photoType = explode('/', $photoType['mime']);
		$photoType = $photoType[0];
		$photo_description = trim($_POST['photo_description']);
		
		// Category
		$category = trim($_POST['category']);
		
		$entity = new Entity;
		$photoValidate = $entity->validate('photo',['photo_type'=>$photoType,'photo_ext'=>$photoExt,'photo_name'=>$_FILES['upload_photo']['name']]);
		$categoyValidate = $entity->validate('category',['category'=> $category]);
		
		
		if($photoValidate == true && $categoyValidate == true){
			move_uploaded_file($_FILES['upload_photo']['tmp_name'], 'includes/uploads/images/'.$photoName);
			if ( $entity->insert_photo(['category_id'=>$category,'photo_name'=>$photoName,'photo_description'=>$photo_description]) ) {
				Alerts::get_alert('success','Success! ','Added new photo!');
			} else {
				Alerts::get_alert('danger','Error! ','There is some error!');
			}
		}else {
			Alerts::get_alert('danger','Error! ','Check your file or category, can\'t be empty and file must be image!');
		}

	}

?>
</div>    
		
	</div>
<!-- /. ROW  -->

               
</div>