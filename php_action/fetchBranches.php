
<?php




require_once 'core.php';
$user=$_SESSION["user"];
$role=$_SESSION["role"];

$sql = "select branches.branch_id,branch_name,branch_status,`branch_address`,COUNT(users.branch_id) as `total_branch` from ( (branches LEFT JOIN users ON branches.branch_id= users.branch_id ) ) GROUP BY users.branch_id";

$result = $connect->query($sql);

$output = array('data' => array());
if($result->num_rows > 0) { 

 
 $active = ""; 

 while($row = $result->fetch_array()) {
 	$branch_id = $row[0];
 	// active 
 	$branch_name = $row[1];
 	
 	$branch_address= $row[3];
 	
 	$status = $row[2];
 	
 	$total = $row["total_branch"];
 




if($status==="inactive"): $badge="bg-danger";

else: $badge="bg-success";
endif;




?>




     <tr class="table-agent-row">

                    <td class="budget"><?php echo $branch_name;?></td>
                    
                    <td class="budget"><?php echo $branch_address;?></td>
                    <td class="budget"><?php echo $total;?></td>
                    
                   

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
                          <a class="dropdown-item" href="?approve=<?php echo $branch_id;?>">Approve</a>
                          <a class="dropdown-item" href="?reject=<?php echo $branch_id;?>">Reject</a>
                          
                         
                        </div>
                      </div>
                    </td>
                    
                    
                  </tr>
                  
                 
                
                <?php 
 
                      } //end of while
                      } //end of if

            
                  ?>