<?php

require_once 'core.php';
$infos='';
$valid['success'] = array('success' => false, 'messages' => array());
if(!empty($_POST)):
$infos=json_decode($_POST['info'],true);

$user=$_SESSION["user"];
$date=date("Y-m-d H:m:s");
$pending="pending";
foreach ($infos as $info) {
  
  if(!empty($info)):
  
  $expense=$info["expense"];
  $desc=$info["desc"];
  $cost=$info["cost"];
  $sql = "INSERT INTO `expenses`( `expense_name`, `expense_desc`, `expense_cost`, `expense_date`, `expense_status`, `user_id`)   VALUES ('$expense', '$desc' ,'$cost','$date', '$pending','$user')";
				if($connect->query($sql) === TRUE) {
					$valid['success'] = true;
                    $girl_id = $connect->insert_id;
                  $valid['messages'] = "The director will be notified  here is the request ID... ".$girl_id;
                  
                }else{
                  $valid['success'] = true;
                  $valid['messages'] = "failed... ". $connect->error;
                  
                }
  else: echo $info;
  
  endif; //end of if empty

}






  
else: $valid['success']=false; $valid['message']="something went wrong 😫".$infos; 

endif;$connect->close();

	echo json_encode($valid);
 








?>