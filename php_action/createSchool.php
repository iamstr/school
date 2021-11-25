<?php

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());
if(!empty($_POST)):
$girls=$_POST['girls'];


$name=mysqli_real_escape_string($connect,$_POST['name']);
$school=mysqli_real_escape_string($connect,$_POST['school']);
$start=mysqli_real_escape_string($connect,$_POST['start']);
$end=mysqli_real_escape_string($connect,$_POST['end']);







$start=date("Y-m-d",strtotime($start));
$end=date("Y-m-d",strtotime($end));

$user=$_SESSION["user"];
foreach ($girls as $girl) {
  
  if(!empty($girl)):
  
  $sql = "INSERT INTO `schools`( `school_names_id`, `school_start`, `school_end`, `school_cert`, `girl_id`, `user_id`, `updatedBy`) VALUES   ('$name', '$start' ,'$end','$school', '$girl','$user','$user')";
				if($connect->query($sql) === TRUE) {
					$valid['success'] = true;
                    $girl_id = $connect->insert_id;
                  $valid['messages'] = "updated successfully... ".$girl_id;
                  
                }else{
                  $valid['success'] = false;
                  $valid['messages'] = "failed... ". $connect->error;
                  
                }
  else: echo $girl;
  
  endif; //end of if empty

}






  
else: $valid['success']=false; $valid['message']="something went wrong 😫"; 

endif;$connect->close();

	echo json_encode($valid);
 








?>