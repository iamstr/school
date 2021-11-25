<?php

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());
if(!empty($_POST)):
$girl=$_SESSION['girl'];

$status=mysqli_real_escape_string($connect,$_POST['status']);

$user=$_SESSION["user"];
$date=date("Y-m-d");


  
  if(!empty($girl)):
  
  $sql = "UPDATE `nea` SET 
  `nea_date`='$date' ,
  `nea_status`='$status' , 
  `updatedBy`='$user' WHERE girl_id='$girl'";
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








  
else: $valid['success']=false; $valid['message']="something went wrong 😫"; 

endif;$connect->close();

	echo json_encode($valid);
 








?>