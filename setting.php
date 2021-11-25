<?php include("includes/header.php");?>
<style>
  .rotato {

    animation: rotato .2s ease-out forwards infinite;
  }

  @keyframes rotato {

    from {
      transform: rotate(0deg);
    }

    to {

      transform: rotate(90deg);
    }
  }

</style>

<body>
  <?php include("includes/sidebar.php");?>

  <!-- Main content -->
  <div class="main-content" id="panel">
    <!-- Topnav -->
    <?php include("includes/top-nav.php");?>
    <!-- Page content -->
    <div class="container-fluid mt-6">
      <div class="row">

        <div class="col">
          <div class="card">
            <div class="card-header">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">Preferences</h3>
                </div>
                <div class="col-4 text-right">
                  <span class="btn btn-sm btn-primary"><i class=" ni ni-settings-gear-65 text-white rotato"></i></span>
                </div>
              </div>
            </div>
            <div class="card-body">

              <h4 class="mb-4">
                Change Info
              </h4>


              <form class="row mt-1 d-none" action="changeEmail" id="changeEmail" method="post">

                <div class="col-lg-6">
                  <div class="form-group">
                    <label class="form-control-label" for="input-email">Email address</label>
                    <input type="email" id="input-email" class="form-control" placeholder="jesse@example.com">
                  </div>
                </div>
                <div style="justify-content: center;padding-top: 0.5rem;" class="col d-flex flex-column ">
                  <button class="btn btn-danger w-50 btn-lg"  type="submit">Save changes</button>

                </div>

              </form>


              <form class="row mt-1 d-none" action="changePhone" id="changePhone" method="post">

                <div class="col-lg-6">
                  <div class="form-group">
                    <label class="form-control-label" for="input-phone">Phone Number</label>
                    <input type="tel" id="input-phone" class="form-control" placeholder="07xxxx">
                  </div>
                </div>
                <div style="justify-content: center;padding-top: 0.5rem;" class="col d-flex flex-column ">
                  <button class="btn btn-danger w-50 btn-lg "  type="submit">Save changes</button>

                </div>

              </form>

              <form class="row mt-1" action="php_action/changePassword.php" id="changePassword" method="post">

                <div class="col-lg-3">
                  <div class="form-group">
                    <label class="form-control-label" for="input-password"> Old Password </label>
                    <input type="password" id="old-password" class="form-control" placeholder="**********" name="password">
                  </div>
                </div>
                 <div class="col-lg-3">
                  <div class="form-group">
                    <label class="form-control-label" for="input-password"> New Password </label>
                    <input type="password" id="new-password" class="form-control" placeholder="**********" name="new">
                  </div>
                </div> 
                 <div class="col-lg-3">
                  <div class="form-group">
                    <label class="form-control-label" for="input-password"> Confirm New Password </label>
                    <input type="password" id="confirm-password" class="form-control" placeholder="**********" name="confirm">
                  </div>
                </div>
                <div  class="col-lg-3">
                 <div class="form-group pt-2">
                   <button class="btn btn-danger  btn-lg  btn-block form-control mt-4" type="submit" id="submitPassword">Save changes</button>
                 </div>
                  

                </div>

              </form>
 <div class="modal fade" id="changeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered" role="document">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>
       <div class="modal-body">
        
  <div class="modal-message"></div>
       </div>
       <div class="modal-footer">
        
       </div>
     </div>
   </div>
 </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php include("includes/footer.php");?>
</body>
<script>
  
  const oldPassword=$("old-password")
  const newPassword=$("new-password")
  const confirmPassword=$("confirm-password")
  
  
        	$("#submitPassword").unbind('click').bind('click', function() {
             const alert=`
                          <div class="alert alert-primary slideLeft" role="alert">
                              <span class="alert-icon"><i class="ni ni-like-2"></i></span>
                              <span class="alert-text"><strong>You have successfully submitted the changes!</strong> </span>
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                              </button
                           </div>`;
              $('.modal-message').append(alert)
              
//              $('.modal-body form').hide()
//              $(".modal-message").html(alert)
              	
              	$("#changePassword").unbind('submit').bind('submit', function(){
              	 var form = $(this);
				var formData = new FormData(this);
                  console.log(formData)
                  		$.ajax({
					url : form.attr('action'),
					type: form.attr('method'),
					data: formData,
					dataType: 'json',
					cache: false,
					contentType: false,
					processData: false,
					success:function(response) {
                    console.log(response)
						if(response.success == true) {
							
                            $("#changeModal").modal("show")
							$("html, body, div.modal, .modal-content, div.modal-body").animate({scrollTop: '0'}, 100);
																	
							// shows a successful message after operation
							$('.modal-message').html('<div class="alert alert-success">'+
		            '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
		            '<strong><i class="ni ni-like-2"></i></strong> '+ response.messages +
		          '</div>');

							// remove the mesages
		          $(".alert-success").delay(1000).show(10, function() {
								$(this).delay(3000).hide(10, function() {
									$(this).remove();
									$("#changeModal").modal("hide");
//                                  $('.modal-body form').show()
								});
							}); // /.alert

		          
						} // /if response.success
                      
                      
                      else{
                        
                        
                        $("#changeModal").modal("show")
                        
							$("html, body, div.modal, .modal-content, div.modal-body").animate({scrollTop: '0'}, 100);
																	
							// shows a successful message after operation
							$('.modal-message').append('<div class="alert alert-warning shaking-2">'+
		            '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
		            '<strong><i class="ni ni-like-2"></i></strong> '+ response.messages +
		          '</div>');

							// remove the mesages
		          $(".alert-warning").delay(500).show(10, function() {
								$(this).delay(3000).hide(10, function() {
									$(this).remove();
									$("#changeModal").modal("hide");
                                 
								});
							}); // /.alert

                        
                        
                        
                        
                        
                      }
						
					} // /success function
				}); // /ajax function
                  
                  return false;
                  
              	})
        
            })

  
  
</script>