<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {	

	
	$branch 	= mysqli_real_escape_string($connect,$_POST['Agency']);
	$status		= mysqli_real_escape_string($connect,$_POST['status']);
//	$address	= mysqli_real_escape_string($connect,$_POST['address']);
  
  
	
				$sql = "INSERT INTO `agencies`( `agency_name`,  `agency_status`) 
				VALUES ('$branch','$status')";
				if($connect->query($sql) === TRUE) {
					$valid['success'] = true;
					$valid['messages'] = "Successfully Added";	
				} else {
					$valid['success'] = false;
					$valid['messages'] = "Error while adding the members".$connect->error;
				}

				// /else	
		
	} // if in_array 		

	$connect->close();

	echo json_encode($valid);
 
