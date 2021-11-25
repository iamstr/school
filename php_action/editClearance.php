<?php

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());
if(!empty($_POST)):
$girl=$_SESSION['girl'];


$attestation=mysqli_real_escape_string($connect,$_POST['attestation']);
$cof=mysqli_real_escape_string($connect,$_POST['cof']);
$contract=mysqli_real_escape_string($connect,$_POST['contract']);
$medical=mysqli_real_escape_string($connect,$_POST['medical']);
$conduct=mysqli_real_escape_string($connect,$_POST['conduct']);
$passport=mysqli_real_escape_string($connect,$_POST['passport']);
$kin=mysqli_real_escape_string($connect,$_POST['kin']);
$visa=mysqli_real_escape_string($connect,$_POST['visa']);
$status=mysqli_real_escape_string($connect,$_POST['status']);

$user=$_SESSION["user"];
$date=date("Y-m-d H:m:s");

 $girl=mysqli_real_escape_string($connect,$girl);
  
  if(!empty($girl)):
  
  $sql = "UPDATE `clearance` SET
  
  
   `clearance_attestationList`= '$attestation',
   `clearance_CertificateOfIncorporation`='$cof', 
   `clearance_status`='$status', 
   `clearance_FullMedical`='$medical',
   `clearance_GoodConduct`='$conduct', 
   `clearance_PassportCopy`='$passport', 
   `clearance_GirlContract`='$contract',
   `clearance_NextOfKinIDCopy`='$kin', 
   `clearance_VisaForm`='$visa',
   `updatedBy` ='$user'
   WHERE girl_id='$girl'";
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

endif;$connect->close();

	echo json_encode($valid);
 








?>