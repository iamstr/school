<?php

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());
if(!empty($_POST)):
$girls=$_POST['girls'];


$pregnancy=mysqli_real_escape_string($connect,$_POST['pregnancy']);
$code=$_POST['code']?$_POST['code']:null;
$code=mysqli_real_escape_string($connect,$code);
$status=mysqli_real_escape_string($connect,$_POST['status']);
$travel=mysqli_real_escape_string($connect,$_POST['travel']);
$arrival=mysqli_real_escape_string($connect,$_POST['arrival']);
$stamped=mysqli_real_escape_string($connect,$_POST['stamped']);
$ticket=mysqli_real_escape_string($connect,$_POST['ticket']);
$yellow=mysqli_real_escape_string($connect,$_POST['yellow']);
$pcr=mysqli_real_escape_string($connect,$_POST['pcr']);
$tshirt=mysqli_real_escape_string($connect,$_POST['tshirt']);
$travel=date("Y-m-d H:m:s",strtotime($travel));
$arrival=date("Y-m-d H:m:s",strtotime($arrival));
$pcr=date("Y-m-d H:m:s",strtotime($pcr));
$user=$_SESSION["user"];
foreach ($girls as $girl) {
  
  if(!empty($girl)):
  
  $sql = "INSERT INTO `travel`( `travel_date`, `travel_arrival`, `travel_pregnancy`, `travel_pcrStatus`, `travel_pcrCode`, `travel_pcrDate`, `travel_tshirt`, `travel_stampedClearanceForm`, `travel_ticket`, `travel_yellowFever`, `girl_id`, `user_id`, `updatedBy` )   VALUES ('$travel', '$arrival' ,'$pregnancy','$status','$code', '$pcr', '$tshirt', '$stamped','$ticket','$yellow', '$girl','$user','$user')";
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