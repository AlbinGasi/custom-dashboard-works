$(document).ready(function(){
					$('.delete').click(function(){
						var id = $(this).parent().parent().attr("id");
						var photoName = $(this).parent().siblings('#photo-name').attr('class');
						
						if(confirm("Are you sure you want delete this photo?")){
							$.ajax({
							type: 'post',
							url: 'includes/pages/photo-delete.inc.php',
							data: {'id':id,'photo_name':photoName},
							success: function (data){
								
							}
						});
							$(this).parent().parent().fadeOut(300,function(){
								$(this).remove();
							})
						
						}else{
							
						}
					});
					
					$('.view').click(function(){
						var photoName = $(this).parent().siblings('#photo-name').attr('class');
						var imgUrl = 'includes/uploads/images/'+photoName;
						var photoDescription = $(this).parent().siblings('.photo-description').attr('id');
						var id = $(this).parent().parent().attr("id");
						var catName = $(this).parent().siblings('.cat-name').attr('id');
						
						$('#view-category-name').val(catName);
						$('#view-id').val(id);
						$('#view-photo img').attr('src',imgUrl);
						$('#view-photo .modal-photo-description p').html(photoDescription);
						$('#view-photo').modal('show');
					});
					
					$('.edit').click(function(){
						$('#view-photo').modal("hide");
						var id = $(this).parent().parent().attr("id");
						var catName = $(this).parent().siblings('.cat-name').attr('id');
						var send = true;
						$.ajax({
							url: 'includes/get-data/get-categories.inc.php',
							type: 'post',
							data: {'send':send,'id':id,'category_name':catName},
							success: function(feedback){
								$(".modal-body-edit-category").html(feedback);
								$("#update-message").html("");
								$('#edit-category').modal('show');
							}
						});
					});
					
					$('.edit-view').click(function(){
						$('#view-photo').modal("hide");
						var id = $("#view-id").val();
						var catName = $("#view-category-name").val();
						var send = true;
						$.ajax({
							url: 'includes/get-data/get-categories.inc.php',
							type: 'post',
							data: {'send':send,'id':id,'category_name':catName},
							success: function(feedback){
								$(".modal-body-edit-category").html(feedback);
								$("#update-message").html("");
								$('#edit-category').modal('show');
							}
						});
					});
					
					$(document).on("click","#save-category",function(){
						$("#update-message").html("");
						photoId = $("#photo-id").val();
						action = 'save';
						id = $( "select#change-photo-category option:checked" ).val();
						name = $( "select#change-photo-category option:checked" ).html();
						photoDescription = $('#photo-edit-description').val();
						
						$.ajax({
							url: 'includes/pages/photo-edit.inc.php',
							type: 'post',
							data: {'action':action,'category_id':id, 'photo_id':photoId, 'photo_description':photoDescription},
							success: function(feedback){
								$("#update-message").html(feedback);
								
							}
						});
					});	
					
					$(document).on("click","#close-category",function(){
						var checkStatus = $("#check-status").val();
						
						if(checkStatus == "success"){
							$("tr#"+photoId).find('.cat-name').html(name)
							$("tr#"+photoId).find('.cat-name').attr('id',name);
							$("tr#"+photoId).find('.photo-description').html(photoDescription);
							$("tr#"+photoId).find('.photo-description').attr('id',photoDescription);
						}else{

						}
					});
			});