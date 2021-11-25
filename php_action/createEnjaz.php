<?php

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());
if(!empty($_POST)):
$girls=$_POST['girls'];
//$school=mysqli_real_escape_string($connect,$_POST['school']);
$enjaz=mysqli_real_escape_string($connect,$_POST['enjaz']);
$medical=mysqli_real_escape_string($connect,$_POST['medical']);
//$conduct=mysqli_real_escape_string($connect,$_POST['conduct']);
//$wakala=mysqli_real_escape_string($connect,$_POST['wakala']);
$wakala=mysqli_real_escape_string($connect,$_POST['wakala']);
$hospital=mysqli_real_escape_string($connect,$_POST['hospital']);

$user=$_SESSION["user"];
$date=date("Y-m-d H:m:s");

foreach ($girls as $girl) {
  
  if(!empty($girl)):
  
  $sql = "INSERT INTO `enjaz`( `enjaz_status`, `enjaz_date`, `enjaz_medical`, `medical_id`,  `enjaz_wakala`, `girl_id`, `user_id`, `updatedBy`)   VALUES ('$enjaz', '$date' ,'$medical', '$hospital', '$wakala','$girl','$user','$user')";
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