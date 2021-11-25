<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {	

  $fullname		= mysqli_real_escape_string($connect,$_POST['fullname']);
  $id			= mysqli_real_escape_string($connect,$_POST['id']);
  $phone			= mysqli_real_escape_string($connect,$_POST['phone']);
  $dob			= mysqli_real_escape_string($connect,$_POST['dob']);
  
  $county		= mysqli_real_escape_string($connect,$_POST['county']);
 
  $passport	= mysqli_real_escape_string($connect,$_POST['passport']);

  $kin_names	= mysqli_real_escape_string($connect,$_POST['kin_names']);
  
  $kin_number= mysqli_real_escape_string($connect,$_POST['kin_number']);
  
  
  
  $user=$_SESSION['user'];
  $date=date("Y-m-d");
  
          if(!empty($_POST['agency_name'])){
                    
                    $agent_name= mysqli_real_escape_string($connect,$_POST['agency_name']);
                  
                    $sqlAgent="INSERT INTO `agencies`( `agency_name`) VALUES ( '$agent_name')";
            
                    if($result=$connect->query($sqlAgent)){
                      $agency=$connect->insert_id;
                      
                    }else{
                      
                      $valid["messages"]=" ooops name already exists";
                      $valid["success"]=false;
//                      return $valid;
                    }
                  }else{
                    
                     $agent= mysqli_real_escape_string($connect,$_POST['agency']);
           
                      $sqlAgent="select * from agencies where agency_id='$agent'";
                    
                    $resultAgent=$connect->query($sqlAgent);
                    $rowAgent=$resultAgent->fetch_array();
                    $agent_name= $rowAgent['agency_name'];
                    $agency= mysqli_real_escape_string($connect,$rowAgent['agency_id']);

                  }
                     

	
				$sql = "INSERT INTO `girls`( `girl_name`, `girl_IDNumber`, `girl_phone`, `passport`, `county`, `agency_id`, `age`, `kin_name`, `kin_phone`, `admission_date`, `updated_by`) 
				VALUES ('$fullname', '$id' , '$phone','$passport','$county','$agency','$dob',
                '$kin_names','$kin_number','$date',$user)";
				if($connect->query($sql) === TRUE) {
					$valid['success'] = true;
                    $girl_id = $connect->insert_id;
                  
                  
                  
                  $sqlKin=" INSERT INTO `reports`( `report_paid`, `report_due`, `girl_id`, `report_date`, `report_update_by`) VALUES( 0,25000,$girl_id,'$date',$user)";
                 
                  
                         
                             
                  
                  
                 
                  if($connect->query($sqlKin) === TRUE) {
                    
                    
                    
                     $valid['messages'] = "SuccessFully Added"; 
                    
                    
                  }else{
                    
                    $valid['success'] = false;
					$valid['messages'] = "Error while adding the reports  Try updating instead";
                  }
                 
					
                  
				} else {
					$valid['success'] = false;
					$valid['messages'] = "Error while adding the girl  Try updating instead ";
				}

				// /else	
		
	} // if in_array 		

	$connect->close();

	echo json_encode($valid);
 
