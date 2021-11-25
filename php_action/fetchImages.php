<?php require_once("core.php");
if(isset($_GET['images'])):
$images=$_GET['images'];
$sql="select * from uploads where girl_id=$images";
$result=$connect->query($sql);


if ($result->num_rows > 0) :
$row=$result->fetch_array();
$upload_pic=$row["upload_pic" ];
$upload_full_pic=$row["upload_full_pic"];
$upload_birth_certificate=$row["upload_birth_certificate"];
$upload_copy_id=$row["upload_copy_id"];
$upload_passport_copy=$row["upload_passport_copy"];
$upload_next_of_kin_1=$row["upload_next_of_kin_1"];
$upload_next_of_kin_2=$row["upload_next_of_kin_2"];

else:


$upload_pic="https://via.placeholder.com/150";
$upload_full_pic="https://via.placeholder.com/150";
$upload_birth_certificate="https://via.placeholder.com/150";
$upload_copy_id="https://via.placeholder.com/150";
$upload_passport_copy="https://via.placeholder.com/150";
$upload_next_of_kin_1="https://via.placeholder.com/150";
$upload_next_of_kin_2="https://via.placeholder.com/150";

endif;










?>








<div class="d-flex justify-content-between my-5 ">

  <div class="media-uploaded d-flex flex-column rounded shadow-lg mr-3 ">


    <img src="<?php echo $upload_pic;?>" alt="" class="rounded-top girl_img" style="height: 200px; min-width:200px;max-width:100%" />
    <div class="p-4">
      <h4 class="my-1">Passport Photo</h4>
      <input type="file" class="form-control" name="pic">
    </div>

  </div>



  <div class="media-uploaded d-flex flex-column rounded shadow-lg mx-3 ">
    <img src="<?php echo $upload_full_pic;?>" alt="" class="rounded-top girl_img" style="height: 200px; min-width:200px;max-width:100%">
    <div class="p-4">
      <h4 class="my-1">Full Photo</h4>
      <input type="file" class="form-control" name="full">
    </div>

  </div>



  <div class="media-uploaded d-flex flex-column rounded shadow-lg mx-3 ">

    <img src="<?php echo $upload_birth_certificate;?>" alt="" class="rounded-top girl_img" style="height: 200px; min-width:200px;max-width:100%">
    <div class="p-4">
      <h4 class="my-1">birth certificate</h4>
      <input type="file" class="form-control" name="birth">
    </div>


  </div>

  <div class="media-uploaded d-flex flex-column rounded shadow-lg mx-3 ">
    <img src="<?php echo $upload_copy_id;?>" alt="" class="rounded-top girl_img" style="height: 200px; min-width:200px;max-width:100%">
    <div class="p-4">
      <h4 class="my-1">ID </h4>
      <input type="file" class="form-control" name="id">
    </div>

  </div>

</div>


<div class="d-flex justify-content-between my-5">

  <div class="media-uploaded d-flex flex-column rounded shadow-lg mr-3 ">


    <img src="<?php echo $upload_passport_copy;?>" alt="" class="rounded-top girl_img" style="height: 200px; min-width:200px;max-width:100%" />
    <div class="p-4">
      <h4 class="my-1">Passport Copy </h4>
      <input type="file" class="form-control" name="passport">
    </div>

  </div>



  <div class="media-uploaded d-flex flex-column rounded shadow-lg mx-3 ">
    <img src="<?php echo $upload_next_of_kin_1;?>"alt="" class="rounded-top girl_img" style="height: 200px; min-width:200px;max-width:100%">
    <div class="p-4">
      <h4 class="my-1">Next Of Kin ID</h4>
      <input type="file" class="form-control" name="kin1">
    </div>

  </div>



  <div class="media-uploaded d-flex flex-column rounded shadow-lg mx-3 ">

    <img src="<?php echo $upload_next_of_kin_2;?>" alt="" class="rounded-top girl_img" style="height: 200px; min-width:200px;max-width:100%">
    <div class="p-4">
      <h4 class="my-1">Next of Kin ID 2</h4>
      <input type="file" class="form-control" name="kin2">
    </div>


  </div>

  <div class="media-uploaded d-flex flex-column bg-transparent mx-3 w-100 d-none ">
    <img src="<?php echo $upload_copy_id;?>" alt="" class="rounded-top girl_img d-none" style="height: 200px; min-width:200px;max-width:100%">
    <div class="p-4 d-none">
      <h4 class="my-1">ID </h4>
      <input type="file" class="form-control">
    </div>

  </div>

</div>
<script>
  
  $(document).ready(function($){
let inputElement,notAllowed=false;
    
    
     $("input[type=file]").change(function(e) {

       
       const input = this,
        url = $(this).val(),
        element=e;
        ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
      
//      $(".rounded-top.girl_img").addClass("mx-auto d-block rounded shadow-lg my-5")
      if (input.files && input.files[0] && (ext == "png" || ext == "jpeg" || ext == "jpg")) {
        var reader = new FileReader();
        notAllowed=false;
        reader.onload = function(e) {
          $(".rounded-top.girl_img").attr('width', "200");
//         console.log(element.target)
          $(element.target.parentElement.previousElementSibling).attr('src', e.target.result)
        }
        reader.readAsDataURL(input.files[0]);
      } else {
        notAllowed=true;
        document.querySelector(".notified").click()
        inputElement=$(element.target)[$(element.target).index($(element.target))]
        
       if(notAllowed){
         
       $(".retry").click(function(e) {
        
         
         $(inputElement).click()
          notAllowed=false;

        })
      
        }
        
      }


    })
    
    
    
    
    
    
    
        });
</script>
<?php endif;?>