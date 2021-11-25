<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());
$user=$_SESSION['user'];

if(isset($_POST)) {	

	
  
  
    $search=mysqli_real_escape_string($connect,$_POST['search']);
     $passport_photo=mysqli_real_escape_string($connect,$_FILES['passport_photo']['name']);
    $full_photo=mysqli_real_escape_string($connect,$_FILES['full_photo']['name']);
    $birth=mysqli_real_escape_string($connect,$_FILES['birth']['name']);
    $id=mysqli_real_escape_string($connect,$_FILES['id']['name']);
    $files=mysqli_real_escape_string($connect,$_FILES['files']['name']);
    $kin1=mysqli_real_escape_string($connect,$_FILES['kin1']['name']);
    $kin2=mysqli_real_escape_string($connect,$_FILES['kin2']['name']);
  
  
  
  
  if(isset($search)){
    
    
    	$sql = "SELECT  girl_fullname,girl_IDnumber from girls  WHERE girl_id=$search";
    
   

				$result=$connect->query($sql);
					$valid['success'] = true;
					$valid['messages'] = "Successfully Added";	
                  
                  $row=$result->fetch_array();
                  $girlName=$row[0];
                  $girlIDnumber=$row[1];
                  
                    if (!file_exists('../uploads/'.$search."-".$girlName."-".$girlIDnumber."/")) {
    mkdir('../uploads/'.$search."-".$girlName."-".$girlIDnumber."/", 0777, true);
}
                    
                    
                  
                  if(isset($passport_photo)){
                    
                    $passport_photo_file=$_FILES['passport_photo']['name'];
                    $type = explode('.',$passport_photo_file );
                    $type = $type[count($type)-1];		
                    $url = '../uploads/'.$search."-". $girlName."-".$girlIDnumber."/".$passport_photo;
                    $url2 = 'uploads/'.$search."-". $girlName."-".$girlIDnumber."/".$passport_photo;
                    
                    
                   
                    
                    
                    if(in_array($type, array('gif', 'jpg', 'jpeg', 'png', 'JPG', 'GIF', 'JPEG', 'PNG'))) {
		if(is_uploaded_file($_FILES['passport_photo']['tmp_name'])) {			
			if(move_uploaded_file($_FILES['passport_photo']['tmp_name'], $url)) {
				
				$sql = "INSERT INTO `uploads`(`upload_pic`, `girl_id`, `user_id`, `updatedBy`) 
				VALUES ('$url2', '$search', '$user', '$user')";

				if($connect->query($sql) === TRUE) {
					$valid['success'] = true;
					$valid['messages'] = "Successfully Added";	
				} else {
					$valid['success'] = false;
					$valid['messages'] = "what just happened...  ".$connect->error;
				}

			}	else {
              $returnJson=array("message"=>"something went wrong".'../uploads/'.$search."-". $girlName."-".$girlIDnumber."/".$passport_photo);
            
				return json_encode($returnJson);
			}	// /else	
		} // if
	} // if in_array 
                    
                    
                    
                    

                  }
                  
                  
                  
                  
                   
                  if(isset($full_photo)){
                    
                    
                    $type = explode('.', $_FILES['full_photo']['name']);
                    $type = $type[count($type)-1];		
                    $url = '../uploads/'.$search."-". $girlName."-".$girlIDnumber."/".$full_photo;
                    $url2 = 'uploads/'.$search."-". $girlName."-".$girlIDnumber."/".$full_photo;
                    
                    
                    
                    
                    
                    
                    
                    if(in_array($type, array('gif', 'jpg', 'jpeg', 'png', 'JPG', 'GIF', 'JPEG', 'PNG'))) {
		if(is_uploaded_file($_FILES['full_photo']['tmp_name'])) {			
			if(move_uploaded_file($_FILES['full_photo']['tmp_name'], $url)) {
				
				$sql = "UPDATE  `uploads` set `upload_full_pic`='$url2' where `girl_id`='$search'";

				if($connect->query($sql) === TRUE) {
					$valid['success'] = true;
					$valid['messages'] = "Successfully Added";	
				} else {
					$valid['success'] = false;
					$valid['messages'] = "Error while adding the members".$connect->error;
				}

			}	else {
              $returnJson=array("message"=>"something went wrong");
            
				return json_encode($returnJson);
			}	// /else	
		} // if
	} // if in_array 
                    
                    
                    
                    

                  }
                  
                  
                  
                    if(isset($birth)){
                    
                    
                    $type = explode('.', $_FILES['birth']['name']);
                    $type = $type[count($type)-1];		
                    $url = '../uploads/'.$search."-". $girlName."-".$girlIDnumber."/".$birth;
                    $url2 = 'uploads/'.$search."-". $girlName."-".$girlIDnumber."/".$birth;
                    
                    
                    
                    
                    
                    
                    
                    if(in_array($type, array('gif', 'jpg', 'jpeg', 'png', 'JPG', 'GIF', 'JPEG', 'PNG'))) {
		if(is_uploaded_file($_FILES['birth']['tmp_name'])) {			
			if(move_uploaded_file($_FILES['birth']['tmp_name'], $url)) {
				
				$sql = "UPDATE  `uploads` set `upload_birth_certificate`='$url2' where `girl_id`='$search'";

				if($connect->query($sql) === TRUE) {
					$valid['success'] = true;
					$valid['messages'] = "Successfully Added";	
				} else {
					$valid['success'] = false;
					$valid['messages'] = "Error while adding the members".$connect->error;
				}

			}	else {
              $returnJson=array("message"=>"something went wrong");
            
				return json_encode($returnJson);
			}	// /else	
		} // if
	} // if in_array 
                    
                    
                    
                    

                  }
                  
                 
                  
                  
                   if(isset($files)){
                    
                    
                    $type = explode('.', $_FILES['files']['name']);
                    $type = $type[count($type)-1];		
                    $url = '../uploads/'.$search."-". $girlName."-".$girlIDnumber.'/'.$files;
                    $url2 = 'uploads/'.$search."-". $girlName."-".$girlIDnumber.'/'.$files;
                    
                    
                    
                    
                    
                    
                    
                    if(in_array($type, array('gif', 'jpg', 'jpeg', 'png', 'JPG', 'GIF', 'JPEG', 'PNG'))) {
		if(is_uploaded_file($_FILES['files']['tmp_name'])) {			
			if(move_uploaded_file($_FILES['files']['tmp_name'], $url)) {
				
				$sql ="UPDATE  `uploads` set `upload_passport_copy`='$url2' where `girl_id`='$search'";

				if($connect->query($sql) === TRUE) {
					$valid['success'] = true;
					$valid['messages'] = "Successfully Added";	
				} else {
					$valid['success'] = false;
					$valid['messages'] = "Error while adding the members".$connect->error;
				}

			}	else {
              $returnJson=array("message"=>"something went wrong");
            
				return json_encode($returnJson);
			}	// /else	
		} // if
	} // if in_array 
                    
                    
                    
                    

                  }
                  
                 
                  
                  
                  
                   
                   if(isset($kin1)){
                    
                    
                    $type = explode('.', $_FILES['kin1']['name']);
                    $type = $type[count($type)-1];		
                    $url = '../uploads/'.$search."-". $girlName."-".$girlIDnumber.'/'.$kin1;
                    $url2 = 'uploads/'.$search."-". $girlName."-".$girlIDnumber.'/'.$kin1;
                    
                    
                    
                    
                    
                    
                    
                    if(in_array($type, array('gif', 'jpg', 'jpeg', 'png', 'JPG', 'GIF', 'JPEG', 'PNG'))) {
		if(is_uploaded_file($_FILES['kin1']['tmp_name'])) {			
			if(move_uploaded_file($_FILES['kin1']['tmp_name'], $url)) {
				
				$sql = "UPDATE  `uploads` set `upload_next_of_kin_1`='$url2' where `girl_id`='$search'";

				if($connect->query($sql) === TRUE) {
					$valid['success'] = true;
					$valid['messages'] = "Successfully Added";	
				} else {
					$valid['success'] = false;
					$valid['messages'] = "Error while adding the members".$connect->error;
				}

			}	else {
              $returnJson=array("message"=>"something went wrong");
            
				return json_encode($returnJson);
			}	// /else	
		} // if
	} // if in_array 
                    
                    
                    
                    

                  }
                  
                 
                  
                  
                   
                   if(isset($kin2)){
                    
                    
                    $type = explode('.', $_FILES['kin2']['name']);
                    $type = $type[count($type)-1];		
                    $url = '../uploads/'.$search."-". $girlName."-".$girlIDnumber.'/'.$kin2;
                    $url2 = 'uploads/'.$search."-". $girlName."-".$girlIDnumber.'/'.$kin2;
                    
                    
                    
                    
                    
                    
                    
                    if(in_array($type, array('gif', 'jpg', 'jpeg', 'png', 'JPG', 'GIF', 'JPEG', 'PNG'))) {
		if(is_uploaded_file($_FILES['kin2']['tmp_name'])) {			
			if(move_uploaded_file($_FILES['kin2']['tmp_name'], $url)) {
				
				$sql = "UPDATE  `uploads` set `upload_next_of_kin_2`='$url2' where `girl_id`='$search'";

				if($connect->query($sql) === TRUE) {
					$valid['success'] = true;
					$valid['messages'] = "Successfully Added";	
				} else {
					$valid['success'] = false;
					$valid['messages'] = "Error while adding the members".$connect->error;
				}

			}	else {
              $returnJson=array("message"=>"something went wrong");
            
				return json_encode($returnJson);
			}	// /else	
		} // if
	} // if in_array 
                    
                    
                    
                    

                  }
                  
                     
                   if(isset($id)){
                    
                    
                    $type = explode('.', $_FILES['id']['name']);
                    $type = $type[count($type)-1];		
                    $url = '../uploads/'.$search."-". $girlName."-".$girlIDnumber.'/'.$id;
                    $url2 = 'uploads/'.$search."-". $girlName."-".$girlIDnumber.'/'.$id;
                    
                    
                    
                    
                    
                    
                    
                    if(in_array($type, array('gif', 'jpg', 'jpeg', 'png', 'JPG', 'GIF', 'JPEG', 'PNG'))) {
		if(is_uploaded_file($_FILES['id']['tmp_name'])) {			
			if(move_uploaded_file($_FILES['id']['tmp_name'], $url)) {
				
				$sql = "UPDATE  `uploads` set `upload_copy_id`='$url2' where `girl_id`='$search'";

				if($connect->query($sql) === TRUE) {
					$valid['success'] = true;
					$valid['messages'] = "Successfully Added";	
				} else {
					$valid['success'] = false;
					$valid['messages'] = "Error while adding the members".$connect->error;
				}

			}	else {
              $returnJson=array("message"=>"something went wrong");
            
				return json_encode($returnJson);
			}	// /else	
		} // if
	} // if in_array 
                    
                    
                    
                    

                  }
                  
                 
                  
                  
                 
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
				} 
    
    
    
    
    
  }
  
  else{
    
    echo "<br/> oops ...something went wrong";
  }
  
//
//	$type = explode('.', $_FILES['productImage']['name']);
//	$type = $type[count($type)-1];		
//	$url = '../uploads/images/'.uniqid(rand()).'.'.$type;
//	if(in_array($type, array('gif', 'jpg', 'jpeg', 'png', 'JPG', 'GIF', 'JPEG', 'PNG'))) {
//		if(is_uploaded_file($_FILES['productImage']['tmp_name'])) {			
//			if(move_uploaded_file($_FILES['productImage']['tmp_name'], $url)) {
//				
//				$sql = "INSERT INTO product (product_name, product_image, brand_id, categories_id, quantity, rate, active, status,product_code) 
//				VALUES ('$productName', '$url', '$brandName', '$categoryName', '$quantity', '$rate', '$productStatus', 1,'$code')";
//
//				if($connect->query($sql) === TRUE) {
//					$valid['success'] = true;
//					$valid['messages'] = "Successfully Added";	
//				} else {
//					$valid['success'] = false;
//					$valid['messages'] = "Error while adding the members".$connect->error;
//				}
//
//			}	else {
//              $returnJson=array("message"=>"something went wrong");
//            
//				return json_encode($returnJson);
//			}	// /else	
//		} // if
//	} // if in_array 		

	$connect->close();

	echo json_encode($valid);
 
//} // /if $_POST