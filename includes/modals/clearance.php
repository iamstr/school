   <?php 

                if(isset($_GET['clearance'])):

                  $edit=$_GET['clearance'];
 $_SESSION['girl']=  $edit;


?>
              
              <script>
                $(document).ready(function($){
                    $("#clearanceModal").modal('show')
                });

                
              </script>
               <?php else: $edit=null;
                endif;


              ?>
           

           <!-- Modal -->
            <div class="modal fade" id="clearanceModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                      Clearance Module
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <form action="php_action/<?php echo $edit?"editClearance.php":"createClearance.php"?>"  id="clearanceForm" method="post">
                  
                  <div class="modal-body">
                    <div class="selection-modal d-flex flex-wrap mb-3"></div>
                    <div class="medical d-flex justify-content-between my-5">
                      <label for=""> Taken to MOL</label>

                      <div class="btn-group btn-group-toggle mx-2" data-toggle="buttons">
                        <label class="btn btn-secondary active">
                          <input type="radio" value="ready" name="status" id="status1" autocomplete="off" checked />
                          YES
                        </label>
                        <label class="btn btn-secondary">
                          <input type="radio" value="pending" name="status" id="status2" autocomplete="off" />
                          NO
                        </label>
                      </div>
                    </div>
                     <div class="medical d-flex justify-content-between my-5">
                      <label for=""> Attenstion List</label>

                      <div class="btn-group btn-group-toggle mx-2" data-toggle="buttons">
                        <label class="btn btn-secondary active">
                          <input type="radio" value="ready" name="attestation" id="attestation1" autocomplete="off" checked />
                          READY
                        </label>
                        <label class="btn btn-secondary">
                          <input type="radio" value="pending" name="attestation" id="attestation2" autocomplete="off" />
                          PENDING
                        </label>
                      </div>
                    </div>
                    <div class="medical d-flex justify-content-between my-5">
                      <label for=""> Certificate Of Incorporation</label>

                      <div class="btn-group btn-group-toggle mx-2" data-toggle="buttons">
                        <label class="btn btn-secondary active">
                          <input type="radio" value="printed" name="cof" id="cof1" autocomplete="off" checked />
                          PRINTED
                        </label>
                        <label class="btn btn-secondary">
                          <input type="radio" value="pending" name="cof" id="cof2" autocomplete="off" />
                          PENDING
                        </label>
                      </div>
                    </div>
                    <div class="medical d-flex justify-content-between my-5">
                      <label for=""> Full Medical</label>

                      <div class="btn-group btn-group-toggle mr-4 pr-4" data-toggle="buttons">
                        <label class="btn btn-secondary active">
                          <input type="radio" value="printed" name="medical" id="medical1" autocomplete="off" checked />
                          PRINTED
                        </label>
                        <label class="btn btn-secondary">
                          <input type="radio" value="pending" name="medical" id="medical2" autocomplete="off" />
                          PENDING
                        </label>
                      </div>
                    </div>
                    <div class="medical d-flex justify-content-between my-5">
                      <label for=""> Good Conduct</label>

                      <div class="btn-group btn-group-toggle mr-4 pr-4" data-toggle="buttons">
                        <label class="btn btn-secondary active">
                          <input type="radio" value="printed" name="conduct" id="conduct1" autocomplete="off" checked />
                          PRINTED
                        </label>
                        <label class="btn btn-secondary">
                          <input type="radio" value="pending" name="conduct" id="conduct2" autocomplete="off" />
                          PENDING
                        </label>
                      </div>
                    </div>
                    <div class="medical d-flex justify-content-between my-5">
                      <label for="">Girl's Contract</label>

                      <div class="btn-group btn-group-toggle mx-2" data-toggle="buttons">
                        <label class="btn btn-secondary active">
                          <input type="radio" value="printed" name="contract" id="contract1" autocomplete="off" checked />
                          PRINTED
                        </label>
                        <label class="btn btn-secondary">
                          <input type="radio" value="pending" name="contract" id="contract2" autocomplete="off" />
                          PENDING
                        </label>
                      </div>
                    </div>
                    <div class="medical d-flex justify-content-between my-5">
                      <label for="">Next Of Kin ID Copy</label>

                      <div class="btn-group btn-group-toggle mx-2" data-toggle="buttons">
                        <label class="btn btn-secondary active">
                          <input type="radio" value="printed" name="kin" id="kin1" autocomplete="off" checked />
                          PRINTED
                        </label>
                        <label class="btn btn-secondary">
                          <input type="radio" value="pending" name="kin" id="kin2" autocomplete="off" />
                          PENDING
                        </label>


                      </div>
                    </div>
                    <div class="medical d-flex justify-content-between my-5">
                      <label for="">Visa Form</label>

                      <div class="btn-group btn-group-toggle mx-2" data-toggle="buttons">
                        <label class="btn btn-secondary active">
                          <input type="radio" value="printed" name="visa" id="visa1" autocomplete="off" checked />
                          PRINTED
                        </label>
                        <label class="btn btn-secondary">
                          <input type="radio" value="pending" name="visa" id="visa2" autocomplete="off" />
                          PENDING
                        </label>


                      </div>
                    </div>
                    <div class="medical d-flex justify-content-between my-5">
                      <label for="">Passport Copy</label>

                      <div class="btn-group btn-group-toggle mx-2" data-toggle="buttons">
                        <label class="btn btn-secondary active">
                          <input type="radio" value="printed" name="passport" id="passport1" autocomplete="off" checked />
                          PRINTED
                        </label>
                        <label class="btn btn-secondary">
                          <input type="radio" value="pending" name="passport" id="passport2" autocomplete="off" />
                          PENDING
                        </label>


                      </div>
                    </div>

                  </div>
                  
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                      Close
                    </button>
                    <button type="submit" id="clearanceSubmit" class="btn btn-primary">
                      Save changes
                    </button>
                  </div>
                  </form>
                  
                </div>
              </div>
            </div>
<script>//    ajax call
    
    
        
        	$("#clearanceSubmit").unbind('click').bind('click', function() {
             
              	
              	$("#clearanceForm").unbind('submit').bind('submit', function(e){
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