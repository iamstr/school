<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {	

	$userName 		= mysqli_real_escape_string($connect,$_POST['username']);
	$firstname 		= mysqli_real_escape_string($connect,$_POST['firstname']);
	$lastname 		=mysqli_real_escape_string($connect, $_POST['lastname']);
	$fullname 		= $firstname." ".$lastname;
	$branch 		= mysqli_real_escape_string($connect,$_POST['branch']);
  
  $password 			= md5("12345");
  $email 			= mysqli_real_escape_string($connect,$_POST['email']);
  $role 			= mysqli_real_escape_string($connect,$_POST['role']);
  $phone			= mysqli_real_escape_string($connect,$_POST['phone']);

	
				$sql = "INSERT INTO `users`(`username`, `password`, `email`, `role`, `phone`,  `fullname`) 
				VALUES ('$userName', '$password' , '$email','$role','$phone','$fullname')";
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
 
