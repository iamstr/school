
<?php




require_once 'core.php';
$user=$_SESSION["user"];
$role=$_SESSION["role"];
if($role==="standard"):
$sql = "SELECT * FROM expenses  inner join users  on expenses.user_id=users.user_id where expenses.user_id= '$user' order by expense_status='pending' DESC" ;
else:$sql = "SELECT * FROM expenses  inner join users  on expenses.user_id=users.user_id order by expense_status='pending' DESC";
endif;
$result = $connect->query($sql);

$output = array('data' => array());
if($result->num_rows > 0) { 

 // $row = $result->fetch_array();
 $active = ""; 

 while($row = $result->fetch_array()) {
 	$expense_id = $row[0];
 	// active 
 	$expense_name = $row[1];
 	$expense_desc = $row[2];
 	$expense_cost= $row[3];
 	
 	$status = $row[5];
 	
 	$date = $row[4];
 	$fullname = $row["fullname"];
// 	$username = $row[1];


if($status==="pending"):$badge="bg-primary";

elseif($status==="rejected"): $badge="bg-danger";

else: $badge="bg-success";
endif;




?>




     <tr class="table-agent-row">

                    <td class="budget"><?php echo $expense_name;?></td>
                    <td class="budget"><?php echo $expense_desc;?></td>
                    <td class="budget"><?php echo $expense_cost;?></td>
                    <td class="budget"><?php echo $date;?></td>

                    <td>
                      <span class="badge badge-dot mr-4">
                        <i class="<?php echo $badge;?>"></i>
                        <span class="status"><?php echo $status;?></span>
                      </span>
                    </td>
                    

                 <?php if($_SESSION['role']==="admin"):?>
                    <td class="budget"><?php echo $fullname;?></td>
                    <td class="text-right">
                      <div class="dropdown">
                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="fas fa-ellipsis-v"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                          <a class="dropdown-item" href="?approve=<?php echo $expense_id;?>">Approve</a>
                          <a class="dropdown-item" href="?reject=<?php echo $expense_id;?>">Reject</a>
                          
                         
                        </div>
                      </div>
                    </td>
                    
                    <?php endif;?>
                  </tr>
                  
                 
                
                <?php 
 
                      } //end of while
                      } //end of if

            
                  ?>