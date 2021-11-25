
              <?php 

                if(isset($_GET['travel'])):

                  $edit=$_GET['travel'];
 $_SESSION['girl']=  $edit;


?>
              
              <script>
                $(document).ready(function($){
$("#travelModal").modal('show')
                });

                
              </script>
               <?php else: $edit=null;
                endif;


              ?>

             
                 <!-- Modal -->
            <div class="modal fade" id="travelModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                      Travel Module
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <form action="php_action/<?php echo $edit?"editTravel.php":"createTravel.php"?>" id="travelForm" method="post">
                  <div class="modal-body">
                    <div class="selection-modal d-flex flex-wrap mb-3"></div>
                    <div class="medical d-flex justify-content-between my-5 align-items-center">
                      <label for=""> Pregnancy Test</label>

                      <div class="btn-group btn-group-toggle mx-2" data-toggle="buttons">
                        <label class="btn btn-secondary active">
                          <input type="radio" value="passed" name="pregnancy" id="pregnancy1" autocomplete="off" checked />
                          PASSED
                        </label>
                        <label class="btn btn-secondary">
                          <input type="radio" value="failed" name="pregnancy" id="pregnancy2" autocomplete="off" />
                          FAILED
                        </label>
                      </div>
                    </div>
                    <div class="medical d-flex justify-content-between my-5 align-items-center">
                      <label for=""> Yellow Fever</label>

                      <div class="btn-group btn-group-toggle mx-2" data-toggle="buttons">
                        <label class="btn btn-secondary active">
                          <input type="radio" value="ready" name="yellow" id="yellow1" autocomplete="off" checked />
                          READY
                        </label>
                        <label class="btn btn-secondary">
                          <input type="radio" value="pending" name="yellow" id="yellow2" autocomplete="off" />
                          PENDING
                        </label>
                      </div>
                    </div>
                    <div class="medical d-flex justify-content-between my-5 align-items-center">
                      <label for=""> PCR Status</label>

                      <div class="btn-group btn-group-toggle mx-2" data-toggle="buttons">
                        <label class="btn btn-secondary active">
                          <input type="radio" value="recieved" name="status" id="status1" autocomplete="off" checked />
                          RECIEVED
                        </label>
                        <label class="btn btn-secondary">
                          <input type="radio" value="pending" name="status" id="status2" autocomplete="off" />
                          PENDING
                        </label>
                      </div>
                    </div>
                    <div class="medical d-flex justify-content-between my-5 align-items-center">
                      <label for=""> PCR Code</label>




                      <input class="form-control w-75 " placeholder="CODE" type="text" name="code">

                    </div>
                    <div class="medical d-flex justify-content-between my-5  align-items-center">
                      <label for=""> PRC Date</label>

                      <div class="input-group w-75">

                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                        </div>
                        <input class="form-control datepicker" placeholder="Select date" type="text" name="pcr">
                      </div>
                    </div>
                    <div class="medical d-flex justify-content-between my-5 align-items-center">
                      <label for=""> T-shirt</label>

                      <div class="btn-group btn-group-toggle mr-4 pr-4" data-toggle="buttons">
                        <label class="btn btn-secondary active">
                          <input type="radio" value="given" name="tshirt" id="tshirt1" autocomplete="off" checked />
                          GIVEN
                        </label>
                        <label class="btn btn-secondary">
                          <input type="radio" value="not given" name="tshirt" id="tshirt2" autocomplete="off" />
                          NOT GIVEN
                        </label>
                      </div>
                    </div>
                    <div class="medical d-flex justify-content-between my-5 align-items-center">
                      <label for="">Stamped Clearance Form</label>

                      <div class="btn-group btn-group-toggle mx-2" data-toggle="buttons">
                        <label class="btn btn-secondary active">
                          <input type="radio" value="ready" name="stamped" id="stamped1" autocomplete="off" checked />
                          READY
                        </label>
                        <label class="btn btn-secondary">
                          <input type="radio" value="pending" name="stamped" id="stamped2" autocomplete="off" />
                          PENDING
                        </label>
                      </div>
                    </div>
                    <div class="medical d-flex justify-content-between my-5 align-items-center">
                      <label for="">Ticket</label>

                      <div class="btn-group btn-group-toggle mx-2" data-toggle="buttons">
                        <label class="btn btn-secondary active">
                          <input type="radio" value="printed" name="ticket" id="ticket1" autocomplete="off" checked />
                          PRINTED
                        </label>
                        <label class="btn btn-secondary">
                          <input type="radio" value="pending" name="ticket" id="ticket2" autocomplete="off" />
                          PENDING
                        </label>


                      </div>
                    </div>
                    <div class="medical d-flex justify-content-between my-5 align-items-center">
                      <label for="">Travel Date</label>

                      <div class="input-group w-75">

                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                        </div>
                        <input class="form-control datepicker" placeholder="Select date" type="text" name="travel">
                      </div>
                    </div>
                    <div class="medical d-flex justify-content-between my-5 align-items-center">
                      <label for="">Arrival Date</label>

                      <div class="input-group w-75">

                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                        </div>
                        <input class="form-control datepicker" placeholder="Select date" type="text" name="arrival">
                      </div>
                    </div>

                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" >
                      Close
                    </button>
                    <button type="submit" class="btn btn-primary" id="travelSubmit">
                      Save changes
                    </button>
                  </div>
                  </form>
                  
                </div>
              </div>
            </div>




<script>
  
  
  
  //    ajax call
    
    
        
        	$("#travelSubmit").unbind('click').bind('click', function() {
             
              	
              	$("#travelForm").unbind('submit').bind('submit', function(e){
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