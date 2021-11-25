<?php 	

require_once 'core.php';
require_once 'db_connect.php';

































 
if(isset($_REQUEST["term"])){
    // Prepare a select statement
   $girl=mysqli_real_escape_string($connect,$_REQUEST["term"]);
$sql="select * from report where  (girl_IDNumber like '%$girl%' ||girl_name like '%$girl%'|| passport like '%$girl%')";
$result=$connect->query($sql);


$rows=15;
while($row=$result->fetch_array()):
$girl_id=$row["girl_id"];
$girl_fullname=$row["girl_name"];
$girl_IDnumber=$row["girl_IDNumber"];
$girl_phone=$row["girl_phone"];
$girl_dob=$row["age"];

$girl_county=$row["county"];
$girl_passport=$row["passport"];

$dateCreated=$row["admission_date"];
$kin_fullname=$row["kin_name"];

$kin_phone=$row["kin_phone"];

$agency_name=["agency_name"];
$report_amount=["report_amount"];
$report_paid=["report_paid"];
$report_due=["report_due"];
$report_date=["report_date"];
$report_updated_date=["report_updated_date"];


$count=1;





?>








<tr class="table-agent-row">
  <th scope="row">
    <div class="media align-items-center">
      <!--
                        <a href="#" class="avatar rounded-circle mr-3">
                          <img alt="Image placeholder" src="" />
                        </a>
-->
      <div class="media-body">
        <span class="name mb-0 text-sm"><?php echo $girl_fullname;?>
          <?php //echo $row[$count]; ?>
        </span>
      </div>
    </div>
  </th>

  <?php while($count<$rows):
              
    $count++;
    
    ?>

  <td class="budget">
    <?php echo $row[$count]?$row[$count]:"N/A";
              
    
    
    ?></td>
  <?php endwhile;
              
    
    
    ?>

  <td class="text-center">
    <div class="dropdown">
      <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-ellipsis-v"></i>
      </a>
      <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
        <a class="dropdown-item" href="?girl=<?php echo $girl_id;?>">Girl Details</a>
        
      </div>
    </div>
  </td>
</tr>

<?php  endwhile;?>




<?php
}
 
// Close connection
$connect->close();
?>