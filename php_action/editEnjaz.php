<?php

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());
if(!empty($_POST)):


$enjaz=mysqli_real_escape_string($connect,$_POST['enjaz']);
$medical=mysqli_real_escape_string($connect,$_POST['medical']);

$wakala=mysqli_real_escape_string($connect,$_POST['wakala']);
$hospital=mysqli_real_escape_string($connect,$_POST['hospital']);

$user=$_SESSION["user"];
$date=date("Y-m-d H:m:s");
$girl=$_SESSION['girl'];
 $girl=mysqli_real_escape_string($connect,$girl);
  
  if(!empty($girl)):
  
  $sql = "UPDATE `enjaz` SET
  `enjaz_status`='$enjaz',
  `enjaz_date`='$date',
  `enjaz_medical`='$medical',
  `medical_id`='$hospital',  
  `enjaz_wakala`='$wakala',
  `updatedBy`='$user'
  WHERE girl_id='$girl'";
				if($connect->query($sql) === TRUE) {
					$valid['success'] = true;
                    $girl_id = $connect->insert_id;
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