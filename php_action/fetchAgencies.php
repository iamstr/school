
<?php




require_once 'core.php';
$user=$_SESSION["user"];
$role=$_SESSION["role"];

$sql = "select agencies.agency_id,agency_name,agency_status,COUNT(girls.girl_id) as `total_girls`, SUM(report_due) as due , SUM(report_paid) as paid from girls LEFT JOIN agencies ON agencies.agency_id= girls.agency_id LEFT JOIN reports ON reports.girl_id= girls.girl_id GROUP BY girls.agency_id ";

$result = $connect->query($sql);

$output = array('data' => array());
if($result->num_rows > 0) { 

 
 $active = ""; 

 while($row = $result->fetch_array()) {
 	$agency_id = $row[0];
 	// active 
 	$agency_name = $row[1];
 	
// 	$agency_address= $row[3];
 	
 	$status = $row[2];
 	
 	$total = $row["total_girls"];
 	$due = $row["due"];
 	$paid = $row["paid"];
 




if($status==="inactive"): $badge="bg-danger";

else: $badge="bg-success";
endif;




?>




     <tr class="table-agent-row">

                    <td class="budget"><?php echo $agency_name;?></td>
                    
                  
                    <td class="budget"><?php echo $total;?></td>
                    <td class="budget local-string"><?php echo $due+$paid;?></td>
                      <td class="budget local-string"><?php echo $due;?></td>
                      <td class="budget local-string"><?php echo $paid;?></td>
                    
                   

                    <td>
                      <span class="badge badge-dot mr-4">
                        <i class="<?php echo $badge;?>"></i>
                        <span class="status"><?php echo $status;?></span>
                      </span>
                    </td>
                    

                
                  
                    <td class="text-right">
                      <div class="dropdown">
                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="fas fa-ellipsis-v"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                          <a class="dropdown-item" href="?approve=<?php echo $agency_id;?>">Approve</a>
                          <a class="dropdown-item" href="?reject=<?php echo $agency_id;?>">Reject</a>
                          
                         
                        </div>
                      </div>
                    </td>
                    
                    
                  </tr>
                  
                 
                
                <?php 
 
                      } //end of while
                      } //end of if

            
                  ?>