<?php
require_once 'core.php';
if(!empty($_POST)):
$valid['success'] = array('success' => false, 'messages' => array());
$girls=$_POST['girls'];
$status=mysqli_real_escape_string($connect,$_POST['status']);
$agency=mysqli_real_escape_string($connect,$_POST['agency']);
$name=mysqli_real_escape_string($connect,$_POST['name']);
$number=mysqli_real_escape_string($connect,$_POST['number']);
$ID=mysqli_real_escape_string($connect,$_POST['ID']);
$address=mysqli_real_escape_string($connect,$_POST['address']);
$contract_number=mysqli_real_escape_string($connect,$_POST['contract_number']);
$visa_number=mysqli_real_escape_string($connect,$_POST['visa_number']);
$user=$_SESSION["user"];
$date=date("Y-m-d");
echo print_r($girls);
foreach ($girls as $girl) {
  $girl=mysqli_real_escape_string($connect,$girl);
  
  if(!empty($girl)):
  
  $sql = "INSERT INTO `musaned`( `musaned_status`, `musaned_sponsporName`, `musaned_sponsporNumber`, `musaned_sponsporID`, `musaned_sponsporAddress`, `musaned_contractNumber`, `musaned_visaNumber`, `agency_id`, `girl_id`, `user_id`, `updatedBy`)VALUES ('$status', '$name' , '$number', '$ID', '$address',  '$contract_number', '$visa_number',$agency, $girl ,$user,$user)";
				if($connect->query($sql) === TRUE) {
					$valid['success'] = true;
                    $girl_id = $connect->insert_id;
                  $valid['messages'] = "updated successfully... ".$girl_id;
                  
                }else{
                  $valid['success'] = true;
                  $valid['messages'] = "failed... ". $connect->error;
                  
                }
  else: echo $girl;
  
  endif; //end of if empty

}






  
else: $valid['success']=false; $valid['message']="something went wrong 😫";

endif; $connect->close();

	echo json_encode($valid);
 






