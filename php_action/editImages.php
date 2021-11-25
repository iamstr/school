<?php

if(isset($_POST['girl'])):
require_once("core.php");
$valid['success'] = array('success' => false, 'messages' => array());
$girl=mysqli_real_escape_string($connect,$_POST['girl']);
  
  $sql="select girl_fullname,girl_IDnumber from girls where girl_id=$girl";
  $result=$connect->query($sql);
  $row=$result->fetch_array();
  $girlName=$row['girl_fullname'];
  $girlIDnumber=$row['girl_IDnumber'];
  
  $sql="select * from uploads where girl_id=$girl";
$result=$connect->query($sql);
if($result->num_rows==1):

$pic=$_FILES["pic"]["name"]?$_FILES["pic"]["name"]:"https://via.placeholder.com/150";
$full=$_FILES["full"]["name"]?$_FILES["full"]["name"]:"https://via.placeholder.com/150";
$birth=$_FILES["birth"]["name"]?$_FILES["birth"]["name"]:"https://via.placeholder.com/150";
$id=$_FILES["id"]["name"]?$_FILES["id"]["name"]:"https://via.placeholder.com/150";
$passport=$_FILES["passport"]["name"]?$_FILES["passport"]["name"]:"https://via.placeholder.com/150";
$kin1=$_FILES["kin1"]["name"]?$_FILES["kin1"]["name"]:"https://via.placeholder.com/150";
$kin2=$_FILES["kin2"]["name"]?$_FILES["kin2"]["name"]:"https://via.placeholder.com/150";

 $pic_url = '../uploads/'.$girl."-". $girlName."-".$girlIDnumber."/".$pic;
 $pic_url2 = 'uploads/'.$girl."-". $girlName."-".$girlIDnumber."/".$pic;
 $full_url = '../uploads/'.$girl."-". $girlName."-".$girlIDnumber."/".$full;
 $full_url2 = 'uploads/'.$girl."-". $girlName."-".$girlIDnumber."/".$full;
 $birth_url = '../uploads/'.$girl."-". $girlName."-".$girlIDnumber."/".$birth;
 $birth_url2 = 'uploads/'.$girl."-". $girlName."-".$girlIDnumber."/".$birth;
 $id_url = '../uploads/'.$girl."-". $girlName."-".$girlIDnumber."/".$id;
 $id_url2 = 'uploads/'.$girl."-". $girlName."-".$girlIDnumber."/".$id;
 $passport_url = '../uploads/'.$girl."-". $girlName."-".$girlIDnumber."/".$passport;
 $passport_url2 = 'uploads/'.$girl."-". $girlName."-".$girlIDnumber."/".$passport;
 $kin2_url = '../uploads/'.$girl."-". $girlName."-".$girlIDnumber."/".$kin2;
 $kin2_url2 = 'uploads/'.$girl."-". $girlName."-".$girlIDnumber."/".$kin2;
 $kin1_url1 = '../uploads/'.$girl."-". $girlName."-".$girlIDnumber."/".$kin1;
 $kin1_url2 = 'uploads/'.$girl."-". $girlName."-".$girlIDnumber."/".$kin1;

 if(isset($pic)):
    $type = explode('.', $_FILES['pic']['name']);
    $type = $type[count($type)-1];
    if(in_array($type, array('gif', 'jpg', 'jpeg', 'png', 'JPG', 'GIF', 'JPEG', 'PNG'))) {
		if(is_uploaded_file($_FILES['pic']['tmp_name'])) {			
			if(move_uploaded_file($_FILES['pic']['tmp_name'], $pic_url)) {
				
				$sql ="UPDATE  `uploads` set `upload_pic`='$pic_url2' where `girl_id`='$girl'";

				if($connect->query($sql) === TRUE) {
					$valid['success'] = true;
					$valid['messages'] = "Successfully Updated";	
				} else {
					$valid['success'] = false;
					$valid['messages'] = "Error while adding the members".$connect->error;
				}

			}	else {
             $valid['messages'] ="something went wrong";
            
				
			}	// /else	
		} // if
	} // if in_array 
endif;


if(isset($full)):
    $type = explode('.', $_FILES['full']['name']);
    $type = $type[count($type)-1];
if(in_array($type, array('gif', 'jpg', 'jpeg', 'png', 'JPG', 'GIF', 'JPEG', 'PNG'))) {
		if(is_uploaded_file($_FILES['full']['tmp_name'])) {			
			if(move_uploaded_file($_FILES['full']['tmp_name'], $full_url)) {
				
				$sql ="UPDATE  `uploads` set `upload_full_pic`='$full_url2' where `girl_id`='$girl'";

				if($connect->query($sql) === TRUE) {
					$valid['success'] = true;
					$valid['messages'] = "Successfully Updated";	
				} else {
					$valid['success'] = false;
					$valid['messages'] = "Error while adding the members".$connect->error;
				}

			}	else {
             $valid['messages'] ="something went wrong";
            
				
			}	// /else	
		} // if
	} // if in_array 

endif;
if(isset($id)):
    $type = explode('.', $_FILES['id']['name']);
    $type = $type[count($type)-1];
if(in_array($type, array('gif', 'jpg', 'jpeg', 'png', 'JPG', 'GIF', 'JPEG', 'PNG'))) {
		if(is_uploaded_file($_FILES['id']['tmp_name'])) {			
			if(move_uploaded_file($_FILES['id']['tmp_name'], $id_url)) {
				
				$sql ="UPDATE  `uploads` set `upload_copy_id`='$id_url2' where `girl_id`='$girl'";

				if($connect->query($sql) === TRUE) {
					$valid['success'] = true;
					$valid['messages'] = "Successfully Updated";	
				} else {
					$valid['success'] = false;
					$valid['messages'] = "Error while adding the members".$connect->error;
				}

			}	else {
             $valid['messages'] ="something went wrong";
            
				
			}	// /else	
		} // if
	} // if in_array 


endif;

if(isset($birth)):
    $type = explode('.', $_FILES['birth']['name']);
    $type = $type[count($type)-1];
if(in_array($type, array('gif', 'jpg', 'jpeg', 'png', 'JPG', 'GIF', 'JPEG', 'PNG'))) {
		if(is_uploaded_file($_FILES['birth']['tmp_name'])) {			
			if(move_uploaded_file($_FILES['birth']['tmp_name'], $birth_url)) {
				
				$sql ="UPDATE  `uploads` set `upload_birth_certificate`='$birth_url2' where `girl_id`='$girl'";

				if($connect->query($sql) === TRUE) {
					$valid['success'] = true;
					$valid['messages'] = "Successfully Updated";	
				} else {
					$valid['success'] = false;
					$valid['messages'] = "Error while adding the members".$connect->error;
				}

			}	else {
             $valid['messages'] ="something went wrong while uploading BIRTH CERTIFICATE";
            
				
			}	// /else	
		} // if
	} // if in_array 


endif;

if(isset($passport)):
    $type = explode('.', $_FILES['passport']['name']);
    $type = $type[count($type)-1];
if(in_array($type, array('gif', 'jpg', 'jpeg', 'png', 'JPG', 'GIF', 'JPEG', 'PNG'))) {
		if(is_uploaded_file($_FILES['passport']['tmp_name'])) {			
			if(move_uploaded_file($_FILES['passport']['tmp_name'], $passport_url)) {
				
				$sql ="UPDATE  `uploads` set `upload_passport_copy`='$passport_url2' where `girl_id`='$girl'";

				if($connect->query($sql) === TRUE) {
					$valid['success'] = true;
					$valid['messages'] = "Successfully Updated";	
				} else {
					$valid['success'] = false;
					$valid['messages'] = "Error while adding the members".$connect->error;
				}

			}	else {
             $valid['messages'] ="something went wrong while uploading PASSPORT COPY";
            
				
			}	// /else	
		} // if
	} // if in_array 

endif;

if(isset($kin1)):
    $type = explode('.', $_FILES['kin1']['name']);
    $type = $type[count($type)-1];
if(in_array($type, array('gif', 'jpg', 'jpeg', 'png', 'JPG', 'GIF', 'JPEG', 'PNG'))) {
		if(is_uploaded_file($_FILES['kin1']['tmp_name'])) {			
			if(move_uploaded_file($_FILES['kin1']['tmp_name'], $kin1_url1)) {
				
				$sql ="UPDATE  `uploads` set `upload_next_of_kin_1`='$kin1_url2' where `girl_id`='$girl'";

				if($connect->query($sql) === TRUE) {
					$valid['success'] = true;
					$valid['messages'] = "Successfully Updated";	
				} else {
					$valid['success'] = false;
					$valid['messages'] = "Error while adding the members".$connect->error;
				}

			}	else {
             $valid['messages'] ="Something went wrong while uploading KIN1";
            
				
			}	// /else	
		} // if
	} // if in_array 
endif;


if(isset($kin2)):
    $type = explode('.', $_FILES['kin2']['name']);
    $type = $type[count($type)-1];
if(in_array($type, array('gif', 'jpg', 'jpeg', 'png', 'JPG', 'GIF', 'JPEG', 'PNG'))) {
		if(is_uploaded_file($_FILES['kin2']['tmp_name'])) {			
			if(move_uploaded_file($_FILES['kin2']['tmp_name'], $kin2_url)) {
				
				$sql ="UPDATE  `uploads` set `upload_next_of_kin_2`='$kin2_url2' where `girl_id`='$girl'";

				if($connect->query($sql) === TRUE) {
					$valid['success'] = true;
					$valid['messages'] = "Successfully Updated";	
				} else {
					$valid['success'] = false;
					$valid['messages'] = "Error while adding the members".$connect->error;
				}

			}	else {
             $valid['messages'] ="something went wrong while uploading KIN2";
            
				
			}	// /else	
		} // if
	} // if in_array 

endif;

else: $valid['success'] = false;
      $valid['messages'] = "Trying uploading as opposed to updating".$connect->error;
endif;
endif;

echo json_encode($valid);


                    
?>