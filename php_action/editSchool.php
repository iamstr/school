<?php

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());
if(!empty($_POST)):



$name=mysqli_real_escape_string($connect,$_POST['name']);
$school=mysqli_real_escape_string($connect,$_POST['school']);
$start=mysqli_real_escape_string($connect,$_POST['start']);
$end=mysqli_real_escape_string($connect,$_POST['end']);
$girl=$_SESSION['girl'];






$start=date("Y-m-d",strtotime($start));
$end=date("Y-m-d",strtotime($end));

$user=$_SESSION["user"];

  
  if(!empty($girl)):
  
  $sql = "UPDATE  `schools` SET 
  
  `school_names_id`='$name',
  `school_start`='$start',
  `school_end`='$end',
  `school_cert`='$school', 
  
   
  `updatedBy`='$user'   WHERE `girl_id`='$girl'";
				if($connect->query($sql)) {
					$valid['success'] = true;
                    
                  $valid['messages'] = "updated successfully... ";
                  
                }else{
                  $valid['success'] = false;
                  $valid['messages'] = "failed... ". $connect->error;
                  
                }
  else: echo $girl;
  
  endif; //end of if empty








  
else: $valid['success']=false; $valid['message']="something went wrong 😫"; 

endif;$connect->close();

	echo json_encode($valid);
 








?>