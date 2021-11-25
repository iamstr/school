  <?php 

                if(isset($_GET['girl'])){
                  
                

                  $edit=$_GET['girl'];
                 $_SESSION['girl']=  $edit;
                  
                                $sql="select * from girls left join agencies on agencies.agency_id=girls.agency_id where girl_id=$edit";
$result=$connect->query($sql);
require_once  $_SERVER['DOCUMENT_ROOT']."/school/php_action/fetchAgency.php";

while($row=$result->fetch_array()){
  
  $girl_name=$row[1];
    $girl_phone=$row[3];
    $girl_IDnumber=$row[2];
    $age=$row[7];
    $county=$row[5];
    $passport=$row[4];
    $agency_name=$row[14];
    $agency_id=$row[6];
    $kin_name=$row[8];
    $kin_phone=$row[9];
    
    
  
}
    

                 
    
                  
                  

?>
              
              <script>
                $(document).ready(function($){
$("#girlModal").modal('show')
                });

                
              </script>
               <?php 

                  
                  


                  
                  
                  
                  
                }

 else{$edit=null;
     

     
     $girl_name="";
    $girl_phone="";
    $age="";
    $county="";
    $passport="";
    $agency_name="";
    $agency_id="";
    $kin_name="";
    $kin_phone="";
     }
               


              ?>
             
         <div class="modal fade" id="girlModal" tabindex="-1" role="dialog" aria-labelledby="musanedModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:800px;transform: translateX(150px);">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                      Update Girl Info
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                    <!--                  <form action=""  id="#musanedForm">-->
                    <div class="modal-body">     
             
    <form class="w-100 " action="php_action/editGirl.php" method="post" id="addNewGirl">
      <div class="row">
        <div class="col card-before" style="">
          <!-- start of first step -->
          <div class="card  steps-form  border-0 shadow-none  ">
            <!-- Card header -->
            <div class="card-header border-0">
              <h3 class="mb-0">First Stage</h3>
            </div>
            <div class="container ml-3 slideLeft">
              <div class="row">
                <div class="col-5">
                  <div class="form-group">
                    <label for="fullname">Girl Fullname</label>
                    <input type="text" class="form-control form-control-muted" id="fullname" name="fullname" placeholder="Mary Moraa" value="<?php echo $girl_name;?>">
                  </div>
                </div>
                <div class="col-5">
                  <div class="form-group">
                    <label for="id">Girl ID Number</label>
                    <input type="text" class="form-control form-control-muted" id="id" name="id" placeholder="00000000" value="<?php echo $girl_IDnumber; ?>">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-5">
                  <div class="form-group">
                    <label for="phone">Girl Phone Number</label>
                    <input type="tel" class=" form-control form-control-muted" id="phone" name="phone" placeholder="0722123456" value="<?php echo $girl_phone;?>">
                  </div>
                </div>
                <div class="col-5">
                  <div class="form-group">
                    <label for="dob">Age of Girl</label>
                    <div class="form-group">

                      
                      <input class="form-control  form-control-muted" placeholder="21" type="number" name="dob" min="21" max="50" value="<?php echo $age;?>">
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                
                <div class="col-5">
                  <div class="form-group">
                    <label for="county">Girl County</label>
                    <select class="form-control" id="county" name="county">
                      <option>1</option>
                      <option>2</option>
                      <option>3</option>
                      <option>4</option>
                      <option>5</option>
                    </select>
                  </div>
                </div>
                
                
                <div class="col-5">
                  <div class="form-group">
                    <label for="passport"> Passport Number</label>
                    <input type="text" class="form-control form-control-muted" id="passport" name="passport" placeholder="AK078341" value="<?php echo $passport;?>">
                  </div>
                </div>
              </div>
            </div>
            <!-- Card footer -->
            <div class="card-footer py-4">
              <div class="d-flex justify-content-end">
                <button class="btn btn-icon btn-primary w-25 btn-lg steps-form-button-next" type="button">
                  <span class="btn-inner--text">Next</span>
                  <span class="btn-inner--icon"><i class="ni ni-bold-right"></i></span>
                </button>
              </div>

            </div>
          </div>
          <!--end of first step  -->

          <!-- second step -->
          <div class="card  steps-form border-0 shadow-none   ">
            <!-- Card header -->
            <div class="card-header border-0">
              <h3 class="mb-0">Second Stage</h3>
            </div>
           <div class="container ml-3 mt-5 slideLeft">

              <div class="row">

                <div class="col-5">
                  <div class="form-group">
                    <label for="kin_names"> Next Of Kin Names</label>
                    <input type="text" class="form-control form-control-muted" id="kin_names" name="kin_names" placeholder="John Kabuga Salim" value="<?php echo $kin_name;?>">
                  </div>
                </div>

                 <div class="col-5">
                  <div class="form-group">
                    <label for="kin_number"> Next Of Kin Number</label>
                    <input type="tel" class="form-control form-control-muted" id="kin_number" name="kin_number" placeholder="07xx xxx xxx" value="<?php echo $kin_phone;?>">
                  </div>
                </div>

              </div>
               
               
               
                   <div class="row">
                <div class="col-6">
                <div class="form-group">
                  <label for="exampleFormControlInput1"> Agency Name</label>
                  <select class="form-control" id="agency" name="agency">
                      <option value="-1">Select the agency</option>
                      <option value="0">Create New agency</option>
                      <!-- Single option -->
                       <?php require_once("php_action/fetchAgency.php");  agencies($agency_id);?>
	                  </select>
                </div>
                </div>
              </div>
              
              <div class="row">


                <div class="col-6">
                  <div class="form-group d-none">
                    <label for="exampleFormControlInput1"> Agency Name</label>
                    <input type="text" class="form-control form-control-muted" id="exampleFormControlInput1" name="agency_name" placeholder="WAJIB AGENCY" hidden="" autocomplete="off">
                  </div>
                </div>
                <div class="col-5 d-none">
                  <div class="form-group d-none">
                    <label for="exampleFormControlInput1"> Agency Number</label>
                    <input type="tel" class="form-control form-control-muted" id="exampleFormControlInput1" name="agency_number" placeholder="1234567" hidden="">
                  </div>
                </div>

              </div>
                
            

            </div>
            <!-- Card footer -->
            <div class="card-footer py-4">
              <div class="d-flex justify-content-end">
                <button class="btn btn-icon btn-outline-secondary w-25 btn-lg steps-form-button-back" type="button">
                  <span class="btn-inner--icon"><i class="ni ni-bold-left"></i></span>
                  <span class="btn-inner--text">Back</span>
                </button>
                <button class="btn btn-icon btn-primary w-25 btn-lg" type="submit"  id="submitModal">
                  <span class="btn-inner--text">Next</span>
                  <span class="btn-inner--icon"><i class="ni ni-bold-right"></i></span>
                </button>
              </div>

            </div>
          </div>

        
         
        </div>

      </div>
    </form>


                    
                  </div>
                </div>
           </div>
</div>


 <script>
      $(document).ready(function() {
        const stepForm = $(".steps-form")


        $('#dob').datepicker({
          autoclose: true,
           changeMonth: true,
      changeYear: true,
          format: 'yyyy-mm-dd',
         defaultViewDate :new Date(),
          startDate:"-38y",
          endDate: '-21y'
        }); 
        
        $('#pdi').datepicker({
          autoclose: true,
           changeMonth: true,
      changeYear: true,
          format: 'yyyy-mm-dd',
         defaultViewDate :new Date(),
          startDate:"-10y",
          endDate: '0d'
        });


        for (step of $(".steps-form")) {

          step.style.display = "none";
        }

        $(".steps-form")[0].style.display = "flex";




        const stepNext = $(".steps-form-button-next"),
          stepBack = $(".steps-form-button-back")


        stepNext.click(function(e) {

          if (e.currentTarget.classList.contains("btn")) {



            const buttonParent = e.currentTarget.parentNode,
              footer = buttonParent.parentNode,
              parent = footer.parentNode,
              container = parent.children[1],
              index = $(".steps-form").index(parent)

            //   parent.toggleClass("animate");
            console.log(stepForm.length, index)
            if ((index + 1) < stepForm.length && index >= 0) {
              stepForm[index + 1].children[1].classList.add("slideLeft")
              parent.children[1].classList.remove("slideLeft")
              stepForm[index + 1].style.display = "flex"

              parent.style.display = "none";



            }
          }


        })
        stepBack.click(function(e) {
          if (e.currentTarget.classList.contains("btn")) {
            const buttonParent = e.currentTarget.parentNode,
              footer = buttonParent.parentNode,
              container = footer.nextSibling,
              parent = footer.parentNode,
              //                      container=parent.children[1],      
              index = $(".steps-form").index(parent)
            console.log(stepForm.length, index, parent)

            if ((index - 1) > -1) {

              stepForm[index - 1].style.display = "flex"
              parent.style.display = "none";
              stepForm[index - 1].children[1].classList.add("slideRight")
              parent.children[1].classList.remove("slideLeft")
              //                        parent.classList.add("slideLeft")
              //                        stepForm[index+1].classList.add("slideRight")
              //                        parent.classList.remove("slideLeft","slideRight")

            }

          }

        })
        
        
        
        //agent select
        
        $("#agent").on("change",function(e){
          
          
          
          if($(this).val()===$('#agent option:eq(1)').val()){
            
            console.log($(this).val())
            $("[name=agent_number]").removeAttr("hidden")
            $("[name=agent_number]").parent().removeClass("d-none")
            $("[name=agent_name]").parent().removeClass("d-none")
            $("[name=agent_name]").removeAttr("hidden")
          }else{
            
            $("[name=agent_number]").attr("hidden",true)
             $("[name=agent_name]").attr("hidden",true)
            $("[name=agent_number]").parent().addClass("d-none")
            $("[name=agent_name]").parent().addClass("d-none")
            
          }
          
        })
        
        
        
        
        	$("#submitModal").unbind('click').bind('click', function() {
             
              	
              	$("#addNewGirl").unbind('submit').bind('submit', function(){
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
								$("#addNewGirl").hide()									
							// shows a successful message after operation
							$('.modal-body').append('<div class="alert alert-success">'+
		            '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
		            '<strong><i class="ni ni-like-2"></i></strong> '+ response.messages +
		          '</div>');

							// remove the mesages
		          $(".alert-success").delay(1000).show(10, function() {
								$(this).delay(3000).hide(10, function() {
									$(this).remove();
                                  $("#addNewGirl").show()
								});
							}); // /.alert

		          
						} // /if response.success
                      
                      
                      else{
                        
                        
                        
                        
							$("html, body, div.modal, .modal-content, div.modal-body").animate({scrollTop: '0'}, 100);
									$("#addNewGirl").hide()								
							// shows a successful message after operation
							$('.modal-body').append('<div class="alert alert-warning shaking-2">'+
		            '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
		            '<strong><i class="ni ni-like-2"></i></strong> '+ response.messages +
		          '</div>');

							// remove the mesages
		          $(".alert-warning").delay(500).show(10, function() {
								$(this).delay(3000).hide(10, function() {
									$(this).remove();
                                  $("#addNewGirl").show()
								});
							}); // /.alert

                        
                        
                        
                        
                        
                      }
						
					} // /success function
				}); // /ajax function
                  
                  return false;
                  
              	})
        
            })

      })

    </script>
