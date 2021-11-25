<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {	

 
  $fullname		= mysqli_real_escape_string($connect,$_POST['fullname']);
  
  $agency_id			= mysqli_real_escape_string($connect,$_POST['agency']);
  $id			= mysqli_real_escape_string($connect,$_POST['id']);
  $phone			= mysqli_real_escape_string($connect,$_POST['phone']);
  $dob			= mysqli_real_escape_string($connect,$_POST['dob']);
  
  $county		= mysqli_real_escape_string($connect,$_POST['county']);
 
  $passport	= mysqli_real_escape_string($connect,$_POST['passport']);

  $kin_names	= mysqli_real_escape_string($connect,$_POST['kin_names']);
  
  $kin_number= mysqli_real_escape_string($connect,$_POST['kin_number']);
  
  
  $user=$_SESSION['user'];
  $girl=$_SESSION['girl'];
  $date=date("Y-m-d H:m:s");
  
  

	
				$sql = "UPDATE `girls` SET 
                `girl_name`='$fullname', 
                `girl_IDnumber`='$id',
                `girl_phone`='$phone',
                `age`='$dob',
                `county`='$county',
                `passport`='$passport', 
                `agency_id`='$agency_id',
                `kin_name`='$kin_names',
                `kin_phone`='$kin_number',
                `updated_by`='$user' WHERE girl_id='$girl'";
				if($connect->query($sql) === TRUE) {
					$valid['success'] = true;
                    
              
                 $valid['success'] = true;
				 $valid['messages'] = "Updated Successfully";
                  
                           
                  
                  
                
					
                  
				} else {
					$valid['success'] = false;
					$valid['messages'] = "Something went wrong  Ran into a problem ".$connect->error;
				}

				// /else	
		
	} // if in_array 		

	$connect->close();

	echo json_encode($valid);
 
