<?php 	

require_once 'core.php';



if(isset($_REQUEST["term"])):
$q = $_REQUEST["term"];
$q = strtolower($q);

$q = mysqli_real_escape_string($connect,$q);
$sql="select girl_id,girl_name,girl_IDNumber,passport from girls where ( LOWER(girl_name) LIKE '%$q%' ) ||(LOWER(girl_IDNumber)  LIKE '%$q%') ||  (LOWER(passport) LIKE '%$q%') ";


$result =$connect->query($sql); 


 
  while($row=$result->fetch_array()){
    
 
  
  ?>
  
  
  <li class="list-group-item d-flex flex-row justify-content-between custom-list-group-item tasks">
                <span class="maid-name" id="<?php echo $row["girl_id"];?>"><?php echo $row["girl_name"]. " ".$row["girl_IDNumber"];?></span>
                
              </li>
  
  
  <?php
  } //end of while
else:  echo "<p>No matches found</p>";

endif;
?>
































<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */

 
$connect->close();
?>