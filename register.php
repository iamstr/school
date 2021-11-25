 <?php include("includes/header.php");?>

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
                   <h3 class="mb-0">Create New User </h3>
                 </div>
                 <div class="col-4 text-right">
                   <a href="#!" class="btn btn-sm btn-primary">Settings</a>
                 </div>
               </div>
             </div>
             <div class="card-body">
              <div class="card-message"></div>
               <form id="registerForm" action="php_action/createUser.php" method="post">
                 <h6 class="heading-small text-muted mb-4">User information</h6>
                 <div class="pl-lg-4">
                   <div class="row">
                     <div class="col-lg-6">
                       <div class="form-group">
                         <label class="form-control-label" for="input-username">Username</label>
                         <input type="text" id="input-username" class="form-control" placeholder="Username" value="lucky.jesse" name="username">
                       </div>
                     </div>
                     <div class="col-lg-6">
                       <div class="form-group">
                         <label class="form-control-label" for="input-email">Email address</label>
                         <input type="email" id="input-email" class="form-control" placeholder="jesse@example.com" name="email">
                       </div>
                     </div>
                   </div>
                   <div class="row">
                     <div class="col-lg-6">
                       <div class="form-group">
                         <label class="form-control-label" for="input-first-name">First name</label>
                         <input type="text" id="input-first-name" class="form-control" placeholder="First name" value="Lucky" name="firstname">
                       </div>
                     </div>
                     <div class="col-lg-6">
                       <div class="form-group">
                         <label class="form-control-label" for="input-last-name">Last name</label>
                         <input type="text" id="input-last-name" class="form-control" placeholder="Last name" value="Jesse" name="lastname">
                       </div>
                     </div>
                   </div>
                   <div class="row">
                     <div class=" col-lg-6">
                       <div class="form-group">
                         <label class="form-control-label" for="input-last-name">Phone Number</label>
                         <input type="text" id="input-last-name" class="form-control" placeholder="Last name" value="07xxxxxx" name="phone">
                       </div>
                     </div>
                     <div class=" col-lg-6">
                       <div class="form-group">
                         <label class="form-control-label" for="input-last-name">User Role</label>
                         <div class="form-group">
                         
                         <select class="form-control" id="role" name="role">
                           <option value="admin">Admin</option>
                           <option value="standard">Standard</option>
                         </select>
                       </div>
                       </div>
                     </div>
                   </div>

                 </div>
                 <hr class="my-4" />
                 <!-- Address -->
                 <h6 class="heading-small text-muted mb-4 d-none">Contact information</h6>
                 <div class="pl-lg-4">
                   <div class="row d-none">
                     <div class="col-md-12">
                       <div class="form-group">
                         <label for="exampleFormControlSelect1">Select Branch</label>
                         <select class="form-control" id="exampleFormControlSelect1" name="branch">
                           <?php require_once("php_action/fetchBranch.php");?>
                         </select>
                       </div>
                     </div>
                   </div>

                 </div>
                 <div class="p-4">
                   <div class="d-flex flex-row justify-content-center">
                     <!--                <div class="col-lg-6">-->
                     <button class="btn btn-warning w-50 btn-lg " type="submit" id="registerSubmit"> Create New User</button>
                     <!--               </div>-->

                   </div>


                 </div>
               </form>
             </div>
           </div>
         </div>
       </div>


     </div>
   </div>
   <?php include("includes/footer.php");?>
   <script>
     
     $(document).ready(function($){
//    ajax call
    
    
        
        	$("#registerSubmit").unbind('click').bind('click', function() {
             
              	
              	$("#registerForm").unbind('submit').bind('submit', function(e){
                  e.preventDefault();
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
							

							$("html, body, div.card, .card-body").animate({scrollTop: '0'}, 100);
								$('.card-body form').hide()									
							// shows a successful message after operation
							$('.card-message').append('<div class="alert alert-success">'+
		            '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
		            '<strong><i class="ni ni-like-2"></i></strong> '+ response.messages +
		          '</div>');

							// remove the mesages
		          $(".alert-success").delay(1000).show(10, function() {
								$(this).delay(3000).hide(10, function() {
									$(this).remove();
                                  $('.card-body form').show()
								});
							}); // /.alert

		          
						} // /if response.success
                      
                      
                      else{
                        
                        
                        
                        
							$("html, body, div.modal, .modal-content, div.modal-body").animate({scrollTop: '0'}, 100);
									$('.card-body form').hide()								
							// shows a successful message after operation
							$('.card-message').append('<div class="alert alert-warning shaking-2">'+
		            '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
		            '<strong><i class="ni ni-like-2"></i></strong> '+ response.messages +
		          '</div>');

							// remove the mesages
		          $(".alert-warning").delay(500).show(10, function() {
								$(this).delay(3000).hide(10, function() {
									$(this).remove();
                                  $('.card-body form').show()
								});
							}); // /.alert

                        
                        
                        
                        
                        
                      }
						
					} // /success function
				}); // /ajax function
                  
                  return false;
                  
              	})
        
            })

    
    


  });

           
</script>
 </body>
