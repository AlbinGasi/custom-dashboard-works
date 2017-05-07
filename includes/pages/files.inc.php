<script src="includes/elements/js/Init.js"></script>
<!-- Edit category MODAL -->
			  <div class="modal fade" id="edit-category" role="dialog">
				<div class="modal-dialog" role="document">
				  <div class="modal-content">
					<div class="modal-header">
					  <button type="button" class="close" data-dismiss="modal">&times;</button>
					  <h4 class="modal-title">Edit</h4>
					</div>
					<div class="modal-body">
						<div class="modal-body-edit-category">


						</div>

					<div style="margin-top:10px;" id="update-message">

					</div>

					</div>
					<div style="margin-top:0px;" class="modal-footer">
					<button id="save-category" type="button" class="btn btn-primary">Update</button>
					  <button id="close-category" type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
				  </div>
				</div>
			  </div>
 <!-- END EDIT Modal -->
 <!-- View  MODAL -->
			  <div class="modal fade" id="view-photo" role="dialog">
				<div class="modal-dialog" role="document">
				  <div class="modal-content">
					<input type="hidden" id="view-category-name">
					<input type="hidden" id="view-id">

							<img src="">

					<div class="modal-photo-description">
					<h4>Photo Description</h4>
						<p></p>
					</div>
					<div class="modal-footer">
					<button type="button"  class="edit-view btn btn-primary">Edit</button>
					  <button id="close-category" type="button" class="btn btn-success" data-dismiss="modal">Close</button>
					</div>
				  </div>
				</div>
			  </div>
 <!-- View Modal -->
<div id="page-inner">
	<div class="row">
		<div class="col-md-12">
			<h2>All your uploaded files</h2>   
			<h5>Check your uploaded files, sort by category, edit or delete! </h5>
			<hr />
		</div>
	
		<div class="col-md-12">
		<div class="table-responsive">
        <table class="table table-striped table-bordered table-hover">
        <thead>
        <tr>
        <th style="width:60px;"> ID</th>
        <th>Photo name</th>
        <th>Category</th>
        <th>Description</th>
        <th style="width:60px;">View</th>
        <th style="width:60px;">Edit</th>
		 <th style="width:60px;">Delete</th>
        </tr>
        </thead>
         <tbody>
			<?php
				$entity = new Entity;
				$get = new GetHandler;
				$photos = $get->getAllPhotoMain();
				foreach ( $photos as $photo ){
					echo "<tr id='".$photo['photo_id']."' class='".$photo['category_name']."'>";
					echo '<td>'.$photo['photo_id'].'</td>';
					echo '<td id="photo-name" class="'.$photo['photo_name'].'">'.$entity->checkLengthName($photo['photo_name'],20).'</td>';
					echo '<td class="cat-name" id="'.$photo['category_name'].'">'.$photo['category_name'].'</td>';
					echo '<td class="photo-description" id="'.$photo['photo_description'].'">'.$entity->checkLengthName($photo['photo_description'],10).'</td>';
					echo "<td><span class='view'><span style='color:blue;cursor:pointer;' class='glyphicon glyphicon-eye-open' aria-hidden='true'></span></span></td>";
					echo "<td><span class='edit'><span style='color:blue;cursor:pointer;' class='glyphicon glyphicon-edit' aria-hidden='true'></span></span></td>";
					echo "<td><span class='delete'><span style='color:blue;cursor:pointer;' class='glyphicon glyphicon-trash' aria-hidden='true'></span></span></td>";
					echo '</tr>';
				}
			?>
		 </tbody>
		 </table>
		
		</div>
		<script src="includes/elements/js/photo.js"></script>
		

	</div>
<!-- /. ROW  -->

               
</div>