
           
             <?php 

                if(isset($_GET['enjaz'])):

                  $edit=$_GET['enjaz'];
 $_SESSION['girl']=  $edit;


?>
              
              <script>
                $(document).ready(function($){
$("#enjazModal").modal('show')
                });

                
              </script>
               <?php else: $edit=null;
                endif;


              ?>

             
                 <!-- Modal -->
            <div class="modal fade" id="enjazModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                      Modal title
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                    <form action="php_action/<?php echo $edit?"editEnjaz.php":"createEnjaz.php"?>"  id="enjazForm" method="post">
                    
                  <div class="modal-body">
                    <div class="selection-modal d-flex flex-wrap mb-3"></div>
                    <div class="medical d-flex justify-content-between my-5">
                      <label for="">Full Medical </label>

                      <div class="btn-group btn-group-toggle mx-2" data-toggle="buttons">
                        <label class="btn btn-secondary active">
                          <input type="radio"  value="done" name="medical" id="medical1" autocomplete="off" checked />
                          DONE
                        </label>
                        <label class="btn btn-secondary">
                          <input type="radio"  value="pending" name="medical" id="medical2" autocomplete="off" />
                          PENDING
                        </label>
                      </div>
                    </div>
                    <div class="medical d-flex justify-content-between my-5">
                      <label for="">Medical School</label>

                      <div class="btn-group btn-group-toggle mr-4 pr-4" data-toggle="buttons">
                        <label class="btn btn-secondary active">
                          <input type="radio"  value="1" name="hospital" id="hospital1" autocomplete="off" checked />
                          Bayan
                        </label>
                        <label class="btn btn-secondary">
                          <input type="radio"  value="2" name="hospital" id="hospital2" autocomplete="off" />
                          Tai
                        </label>
                      </div>
                    </div>
                    <div class="medical d-flex justify-content-between my-5">
                      <label for="">Wakala</label>

                      <div class="btn-group btn-group-toggle mx-2" data-toggle="buttons">
                        <label class="btn btn-secondary active">
                          <input type="radio"  value="not paid" name="wakala" id="wakala1" autocomplete="off" checked />
                          NOT PAID
                        </label>
                        <label class="btn btn-secondary">
                          <input type="radio"  value="paid" name="wakala" id="wakala2" autocomplete="off" />
                          PAID
                        </label>
                      </div>
                    </div>
                    <div class="medical d-flex justify-content-between my-5">
                      <label for="">Enjaz</label>

                      <div class="btn-group btn-group-toggle mx-2" data-toggle="buttons">
                        <label class="btn btn-secondary active">
                          <input type="radio"  value="not uploaded" name="enjaz" id="enjaz1" autocomplete="off" checked />
                          NOT UPLOADED
                        </label>
                        <label class="btn btn-secondary">
                          <input type="radio"  value="uploaded" name="enjaz" id="enjaz2" autocomplete="off" />
                          UPLOADED
                        </label>

                        <label class="btn btn-secondary">
                          <input type="radio"  value="paid" name="enjaz" id="enjaz4" autocomplete="off" />
                          PAID
                        </label>
                      </div>
                    </div>
                   
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                      Close
                    </button>
                    <button type="submit" class="btn btn-primary" id="enjazSubmit">
                      Save changes
                    </button>
                  </div>
                </form>
                </div>
              </div>
            </div>


<script>//    ajax call
    
    
        
        	$("#enjazSubmit").unbind('click').bind('click', function() {
             
              	
              	$("#enjazForm").unbind('submit').bind('submit', function(e){
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
							

							$("html, body, div.modal, .modal-content, div.modal-body").animate({scrollTop: '0'}, 100);
								$('.modal-body div').hide()									
							// shows a successful message after operation
							$('.modal-body').append('<div class="alert alert-success">'+
		            '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
		            '<strong><i class="ni ni-like-2"></i></strong> '+ response.messages +
		          '</div>');

							// remove the mesages
		          $(".alert-success").delay(1000).show(10, function() {
								$(this).delay(3000).hide(10, function() {
									$(this).remove();
                                  $('.modal-body div').show()
								});
							}); // /.alert

		          
						} // /if response.success
                      
                      
                      else{
                        
                        
                        
                        
							$("html, body, div.modal, .modal-content, div.modal-body").animate({scrollTop: '0'}, 100);
									$('.modal-body div').hide()								
							// shows a successful message after operation
							$('.modal-body').append('<div class="alert alert-warning shaking-2">'+
		            '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
		            '<strong><i class="ni ni-like-2"></i></strong> '+ response.messages +
		          '</div>');

							// remove the mesages
		          $(".alert-warning").delay(500).show(10, function() {
								$(this).delay(3000).hide(10, function() {
									$(this).remove();
                                  $('.modal-body div').show()
								});
							}); // /.alert

                        
                        
                        
                        
                        
                      }
						
					} // /success function
				}); // /ajax function
                  
                  return false;
                  
              	})
        
            })

    
   </script>