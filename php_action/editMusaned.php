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
$girl=$_SESSION['girl'];
echo print_r($girls);

  $girl=mysqli_real_escape_string($connect,$girl);
  
  if(!empty($girl)):
  
  $sql = "UPDATE `musaned` SET 
  `musaned_status`='$status', 
  `musaned_sponsporName`='$name' , 
  `musaned_sponsporNumber`='$number',
  `musaned_sponsporID`='$ID',
  `musaned_sponsporAddress`='$address',
  `musaned_contractNumber`='$contract_number',
  `musaned_visaNumber`='$visa_number', 
  `agency_id`=$agency,
  `updatedBy`=$user
   WHERE girl_id=$girl ";
				if($connect->query($sql) === TRUE) {
					$valid['success'] = true;
                  
                  $valid['messages'] = "updated successfully... ";
                  
                }else{
                  $valid['success'] = true;
                  $valid['messages'] = "failed... ". $connect->error;
                  
                }
  else: echo $girl;
  
  endif; //end of if empty








  
else: $valid['success']=false; $valid['message']="something went wrong 😫";

endif; $connect->close();

	echo json_encode($valid);
 






