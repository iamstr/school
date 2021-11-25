<?php 	

require_once 'core.php';

$sql = "SELECT * FROM `branches` WHERE `branch_status`='active'" ;
$result = $connect->query($sql);

$output = array('data' => array());

if($result->num_rows > 0) { 

 // $row = $result->fetch_array();
 $activeBrands = ""; 

 while($row = $result->fetch_array()) {
 	
 	

 	
	echo '<option value="'.$row["branch_id"].'">Branch '.$row["branch_name"].'</option>';

// 	$output['data'][] = array( 		
// 		$row[1], 		
// 		$activeBrands,
// 		$button
// 		); 	
 } // /while 

} // if num_rows

$connect->close();

//echo json_encode($output);