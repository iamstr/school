<?php 	

require_once "core.php";
function agencies($agent=false){
  
  global $connect;

$sql = "SELECT * FROM agencies";

$result = $connect->query($sql);

//$output = array('data' => array());
if($result->num_rows > 0) { 

 // $row = $result->fetch_array();
 $active = ""; 

 while($row = $result->fetch_array()) {
 	$userid = $row[0];
 	// active 
 	$username = $row[1];
 	

 	$button = '<!-- Single option -->
	
	   <option value="'.$userid.'" '.  ($agent==$userid? "selected":null). '>'.$username.' </option>';

	

 	echo $button;	
 } // /while 

}// if num_rows

$connect->close();


  
  
}


