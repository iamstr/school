<?php include("includes/header.php");?>

<body>
  <?php include("includes/sidebar.php");?>
  <!-- Main content -->
  <div class="main-content" id="panel">
    <!-- Topnav -->
    <?php include("includes/top-nav.php");?>
    
    <?php 
    
     if(isset($_GET['approve'])):
    $status=$_GET['approve'];
    $sql="update  agencies set Agency_status='active' where Agency_id='$status'";
    $result=$connect->query($sql);
//    else:echo "failed...".$connect->error;
//    endif;
    
    endif;
    
    if(isset($_GET['reject'])):
    
    $status=$_GET['reject'];
    $sql="update agencies set Agency_status='inactive' where Agency_id='$status'";
    $result=$connect->query($sql);
//    else:echo "failed...".$connect->error;
//    endif;
    
    endif;
    
    ?>
    
    
    
    <!-- Page content -->




    <div class="container-fluid mt-5">
      <div class="row">
        <div class="col">
          <div class="card">
            <!-- Card header -->
            <div class="card-header border-0">
              <h3 class="mb-0">Add New Agency</h3>
            </div>
            <div class="card-body">
              <a class="btn btn-primary" href="#" role="button" data-toggle="modal" data-target="#exampleModal">Create New Agency </a>

              <!-- Modal -->
              <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Create Agency</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                     <div class="modal-message mx-auto w-75"></div>
                      <form id="AgencyForm" action="php_action/createAgency.php" method="post">
                    <div class="modal-body">
                     
                 <h6 class="heading-small text-muted mb-4">Agency information</h6>
                 <div class="pl-lg-1">
                   <div class="row">
                     <div class="col-lg-6">
                       <div class="form-group">
                         <label class="form-control-label" for="input-username">Agency Name</label>
                         <input type="text" id="input-username" class="form-control" placeholder="Agency 1" value="lucky.jesse" name="Agency">
                       </div>
                     </div>
                     <div class="col-lg-6 d-none">
                       <div class="form-group">
                         <label class="form-control-label" for="input-email">Agency address</label>
                         <input type="text" id="input-email" class="form-control" placeholder="CBD Nairobi" name="address">
                       </div>
                     </div>
                   </div>
                        <div class="row">
                          
                          
                          <div class=" col-lg-6">
                       <div class="form-group">
                         <label class="form-control-label" for="input-last-name">Agency Active</label>
                         <div class="form-group">
                         
                         <select class="form-control" id="role" name="status">
                           <option value="active">Active</option>
                           <option value="inactive">Inactive</option>
                         </select>
                       </div>
                       </div>
                     </div>
                          
                        </div>
                         </div>
                      
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-warning" id="AgencySubmit">Create Agency</button>
                    </div>
                    </form>
                  </div>
                </div>
              </div>



            </div>
          </div>
        </div>
      </div>
    </div>





    <div class="container-fluid mt-5">
      <div class="row">
        <div class="col">
          <div class="card">
            <!-- Card header -->
            <div class="card-header border-0">
              <h3 class="mb-0">All The Agencies</h3>
            </div>
            <!-- Light table -->
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr class="table-agent position-relative">

                    <th scope="col" class="sort" data-sort="name">Agency Name</th>
                    <th scope="col" class="sort" data-sort="budget">Total Number of Girls </th>
                    <th scope="col" class="sort" data-sort="budget"> Payment Amount </th>
                    <th scope="col" class="sort" data-sort="budget">Agency Payment Due </th>
                    <th scope="col" class="sort" data-sort="budget">Agency Payment Paid </th>
                    
                    
                   

                    <th scope="col" class="sort" data-sort="status">Status</th>

                    <th scope="col" class="position-sticky">Actions</th>
                  </tr>
                </thead>
                <tbody class="list">
                
                
                    <?php require_once("php_action/fetchagencies.php");?>


                </tbody>
              </table>
            </div>
            <!-- Card footer -->
            <div class="card-footer py-4 d-none">
              <nav aria-label="...">
                <ul class="pagination justify-content-end mb-0">
                  <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1">
                      <i class="fas fa-angle-left"></i>
                      <span class="sr-only">Previous</span>
                    </a>
                  </li>
                  <li class="page-item active">
                    <a class="page-link" href="#">1</a>
                  </li>
                  <li class="page-item">
                    <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item">
                    <a class="page-link" href="#">
                      <i class="fas fa-angle-right"></i>
                      <span class="sr-only">Next</span>
                    </a>
                  </li>
                </ul>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php include("includes/footer.php");?>
  <script>
    
    $(document).ready(function($){

        	$("#AgencySubmit").unbind('click').bind('click', function() {
             
              	
              	$("#AgencyForm").unbind('submit').bind('submit', function(e){
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
								$('.modal form').hide()									
							// shows a successful message after operation
							$('.modal-message').append('<div class="alert alert-success">'+
		            '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
		            '<strong><i class="ni ni-like-2"></i></strong> '+ response.messages +
		          '</div>');

							// remove the mesages
		          $(".alert-success").delay(1000).show(10, function() {
								$(this).delay(3000).hide(10, function() {
									$(this).remove();
                                  $('.modal form').show()
								});
							}); // /.alert

		          
						} // /if response.success
                      
                      
                      else{
                        
                        
                        
                        
							$("html, body, div.modal, .modal-content, div.modal-body").animate({scrollTop: '0'}, 100);
									$('.modal form').hide()								
							// shows a successful message after operation
							$('.modal-message').append('<div class="alert alert-warning shaking-2">'+
		            '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
		            '<strong><i class="ni ni-like-2"></i></strong> '+ response.messages +
		          '</div>');

							// remove the mesages
		          $(".alert-warning").delay(500).show(10, function() {
								$(this).delay(3000).hide(10, function() {
									$(this).remove();
                                  $('.modal form').show()
								});
							}); // /.alert

                        
                        
                        
                        
                        
                      }
						
					} // /success function
				}); // /ajax function
                  
                  return false;
                  
              	})
        
            })

      
      
      
//      change the figures to local string
      $(".budget.local-string").each(function(e){
       let localString= $(this).text(),
       
       
       reversed=[...localString]
       
       
       reversed.forEach(function(elem,index){
         
         
         
         /*
         
         pattern is 1,000 ---->length 4
                    10,000 ---->length 5
                    100,000 ---->length 6
                    1,000,000 ---->length 7
                    10,000,000 ---->length 8
                    100,000,000 ---->length 9
         */
         console.log("the index is ... ",index)
         
         if(index>=4){
           
//            if(index%reversed.length===0){
           reversed.splice((reversed.length-index)+1,0,",")
           
//         }
         }
         
        
         
       })
        
//        reversed=reversed.reverse().join("")
        reversed=reversed.join("")
        console.log(reversed)
        $(this).text(reversed)
      })
    
    
          });
</script>
</body>
