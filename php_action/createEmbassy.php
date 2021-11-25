<?php

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());
if(!empty($_POST)):
$girls=$_POST['girls'];
$school=mysqli_real_escape_string($connect,$_POST['school']);
$enjaz_number=mysqli_real_escape_string($connect,$_POST['enjaz_number']);
$medical=mysqli_real_escape_string($connect,$_POST['medical']);
$conduct=mysqli_real_escape_string($connect,$_POST['conduct']);
$wakala=mysqli_real_escape_string($connect,$_POST['wakala']);
$enjaz=mysqli_real_escape_string($connect,$_POST['enjaz']);
$visa=mysqli_real_escape_string($connect,$_POST['visa']);
$user=$_SESSION["user"];
$date=date("Y-m-d");

foreach ($girls as $girl) {
  
  if(!empty($girl)):
  
  $sql = "INSERT INTO `embassy`(`embassy_status`, `embassy_date`, `embassy_visaForm`, `embassy_medical`, `girl_id`, `user_id`, `updatedBy`,  `enjaz_number`)   VALUES ('$enjaz', '$date' ,'$visa','$medical','$girl','$user','$user','$enjaz_number')";
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