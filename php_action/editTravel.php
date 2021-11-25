<?php

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());
if(!empty($_POST)):



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
$girl=$_SESSION['girl'];


   $girl=mysqli_real_escape_string($connect,$girl);

  
  if(!empty($girl)):
  
  $sql = "UPDATE`travel` 
  SET
  `travel_date`= '$travel',
  `travel_arrival`='$arrival',
  `travel_pregnancy`='$pregnancy', 
  `travel_pcrStatus`='$status',
  `travel_pcrCode`='$code',
  `travel_pcrDate`='$pcr', 
  `travel_tshirt`='$tshirt',
  `travel_stampedClearanceForm`='$stamped', 
  `travel_ticket`='$ticket', 
  `travel_yellowFever`='$yellow', 
  `updatedBy`='$user' 
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