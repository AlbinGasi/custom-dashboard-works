$(document).ready(function(){
					$('.delete').click(function(){
						var id = $(this).parent().parent().attr("id");
						if(confirm("Are you sure you want delete this category?")){
							$.ajax({
							type: 'post',
							url: 'includes/pages/category-delete.inc.php',
							data: {'id':id},
							success: function (data){
								
							}
						});
							$(this).parent().parent().fadeOut(300,function(){
								$(this).remove();
							})
						
						}else{
							
						}
						
					});
					
					$('.edit').click(function(){
						var id = $(this).parent().parent().attr("id");
						var catName = $(this).parent().siblings('.cat-name').attr('id');
						$(this).parent().siblings('.cat-name').html("<input style='width:40%;height:30px;display:inline;' type='text' id='new-cat-name' class='form-control' value='"+catName+"'> <button style='display:inline;padding:3px 12px;' class='save btn btn-success'>Save</button><button style='display:inline;padding:3px 12px;margin-left:5px;' class='cancel btn btn-danger'>Cancel</button><span style='display:block;margin-top:0px;padding:0px 0;' id='data-message'></span>");
					});
					
					$(document).on('click','.cancel',function(){
						var catNameCancel = $(this).parent().parent().attr('class');
						$(this).parent().html(catNameCancel);
					});
					
					$(document).on('click','.save',function(){
						var newCatName = $("#new-cat-name").val();
						var catID = $(this).parent().parent().attr('id');
						
						$.ajax({
							type: 'post',
							url: 'includes/pages/category-edit.inc.php',
							data: {'id':catID, 'category_name':newCatName},
							success: function(data){
								
								if(data == 'Success'){
									$('#data-message').css({'margin-top':'7px','padding':'6px 0'});
									$('#data-message').attr('class','label label-success');
									$('#data-message').parent().parent().attr('class',newCatName);
									$('.cat-name').attr('id',newCatName); 
								}else{
									$('#data-message').css({'margin-top':'7px','padding':'6px 0'});
									$('#data-message').attr('class','label label-danger');
								}
								
								if(data == 'Success'){
									$('#data-message').html(data + ' <div class="loader"></div>');
									setTimeout(function(){
										$('#data-message').parent().html(newCatName);
									}, 1300);
								}else{
									$('#data-message').html(data);
								}
							}
						});
						
					});
					
				});