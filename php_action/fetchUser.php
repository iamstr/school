<?php 	



require_once 'core.php';

$sql = "SELECT * FROM users ";

$result = $connect->query($sql);

$output = array('data' => array());
if($result->num_rows > 0) { 

 // $row = $result->fetch_array();
 $active = ""; 

 while($row = $result->fetch_array()) {
 	$userid = $row[0];
 	// active 
 	$fullname = $row[1];
 	$username = $row[2];
 	$email = $row[4];
 	$role = $row[6];
 	$status = $row[7];
 	$phone = $row[5];
 	$date = $row[8];
 	
// 	$username = $row[1];

   
   if($status==="fired"): $badge="bg-danger";

else: $badge="bg-success";
endif;



   
   
 	$button = '<tr class="table-agent-row">

                    <td class="budget">'.$userid.'</td>
                    <td class="budget">'.$fullname.'</td>
                    <td class="budget">'.$phone.'</td>
                    <td class="budget">'.$date.'</td>

                    <td>
                      <span class="badge badge-dot mr-4">
                        <i class="'.$badge.'"></i>
                        <span class="status">'.$status.'</span>
                      </span>
                    </td>

                 

                    <td class="text-right">
                      <div class="dropdown">
                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-id='.$userid.'>
                          <i class="fas fa-ellipsis-v"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow" style="">
                          <a class="dropdown-item" href="?approve='.$userid.'">Working</a>
                          <a class="dropdown-item" href="?reject='.$userid.'">Fire</a>
                          

                        </div>
                      </div>
                    </td>
                  </tr>';

	echo $button;

// 	$output['data'][] = array( 		
// 		// name
// 		$username,
// 		// button
// 		$button 		
// 		); 	
 } // /while 

}// if num_rows

$connect->close();

//echo json_encode($output);