<?php

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());
if(!empty($_POST)):
$girls=$_POST['girls'];

//$school=mysqli_real_escape_string($connect,$_POST['school']);
$attestation=mysqli_real_escape_string($connect,$_POST['attestation']);
$cof=mysqli_real_escape_string($connect,$_POST['cof']);
$contract=mysqli_real_escape_string($connect,$_POST['contract']);
$medical=mysqli_real_escape_string($connect,$_POST['medical']);
$conduct=mysqli_real_escape_string($connect,$_POST['conduct']);
$passport=mysqli_real_escape_string($connect,$_POST['passport']);
$kin=mysqli_real_escape_string($connect,$_POST['kin']);
$visa=mysqli_real_escape_string($connect,$_POST['visa']);
$status=mysqli_real_escape_string($connect,$_POST['status']);
//$wakala=mysqli_real_escape_string($connect,$_POST['wakala']);
//$wakala=mysqli_real_escape_string($connect,$_POST['wakala']);
//$hospital=mysqli_real_escape_string($connect,$_POST['hospital']);

$user=$_SESSION["user"];
$date=date("Y-m-d H:m:s");

foreach ($girls as $girl) {
  
  if(!empty($girl)):
  
  $sql = "INSERT INTO `clearance`( `clearance_attestationList`, `clearance_CertificateOfIncorporation`, `clearance_status`, `clearance_FullMedical`, `clearance_GoodConduct`, `clearance_PassportCopy`, `clearance_GirlContract`, `clearance_NextOfKinIDCopy`, `clearance_VisaForm`, `girl_id`, `user_id`, `updatedBy`)   VALUES ('$attestation', '$cof' ,'$status','$medical', '$conduct', '$passport','$contract', '$kin','$visa','$girl','$user','$user')";
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

endif;$connect->close();

	echo json_encode($valid);
 








?>