<div id="page-inner">
	<div class="row">
		<div class="col-md-12">
			<h2>Manage of categories</h2>   
			<h5>You can add, edit or delete categories! </h5>
			<hr />
			
		
		<div class="col-md-6 col-sm-6">
		 <div class="panel panel-default">
                        <div class="panel-heading">
                            Add new category
                        </div>
                        <div class="panel-body">
                           <form action="" method="post">
							<div class="form-group">
								<label>Category name</label>
								<input type="text" name="category" class="form-control">
							</div>
								<input type="submit" name="btn_submit" value="Add" class="btn btn-success square-btn-adjust form-control">
							</form>
							<br>
							<?php
								if(isset($_POST['btn_submit'])){
									$category = trim($_POST['category']);
									$category = mb_strtolower($category, mb_detect_encoding($category));
									$entity = new Entity;
									$categoryValidate = $entity->validate('categoryadd', ['category_name'=>$category]);
									
									if($categoryValidate == 'success'){
										$entity->insert_category(['category_name'=>$category]);
									} else {
										foreach($categoryValidate as $categoryError){
											Alerts::get_alert('danger','Error! ', $categoryError);
										}
									}
								}
							?>
                        </div>
                    </div>
		</div>
			
			<?php
				$get = new GetHandler;
				$categories = $get->getAllCategories();
			?>
			
			<div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th style="width:60px;"> ID</th>
                                            <th>Category name</th>
                                            <th style="width:60px;">Edit</th>
                                            <th style="width:60px;">Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php
										foreach($categories as $category){
											echo "<tr id=".$category['category_id']." class='".$category['category_name']."'>";
											echo "<td>".$category['category_id']."</td>";
											echo "<td class='cat-name' id='".$category['category_name']."'>".$category['category_name']."</td>";
											echo "<td><span class='edit'><span style='color:blue;cursor:pointer;' class='glyphicon glyphicon-edit' aria-hidden='true'></span></span></td>";
											echo "<td><span class='delete'><span style='color:blue;cursor:pointer;' class='glyphicon glyphicon-trash' aria-hidden='true'></span></span></td>";
											echo "</tr>";
										}
									?> 
                                    </tbody>
                                </table>
            </div>        
			
			<script src="includes/elements/js/category.js"></script>
		</div>
	</div>
<!-- /. ROW  -->
</div>