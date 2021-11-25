<?php
require_once("core.php");

if(isset($_REQUEST['girl'])){
$girl=mysqli_real_escape_string($connect,$_REQUEST['girl']);
  echo $girl. "is greaaaaaaaaaaaaaat";
$sql="SELECT  
girls.girl_id,
girls.girl_name , 
girl_IDNumber,
agency_name,
report_amount,
report_due,
report_paid,
reports.report_amount,
payment_type,
payment_date,
username

FROM  girls 

      LEFT join users on users.user_id=girls.updated_by
      LEFT JOIN agencies on girls.agency_id=agencies.agency_id
      LEFT join    

       ( payments RIGHT join reports on reports.report_id=payments.report_id) on reports.girl_id= girls.girl_id

 
 where girls.girl_id=$girl";


$result=$connect->query($sql);
if($result->num_rows>0):
  
  
  while($row= $result->fetch_assoc()):
    
    
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
        <span class="name mb-0 text-sm"><?php echo $row["girl_name"];?> </span>
      </div>
    </div>
  </th>


  
  <td class="budget"><?php echo $row["girl_IDNumber"];?></td>
  <td class="budget"><?php echo $row["agency_name"];?></td>
  <td class="budget"><?php echo $row["report_amount"];?></td>
  <td class="budget"><?php echo $row["report_due"];?></td>
  <td class="budget"><?php echo $row["report_paid"];?></td>
 
  <td class="budget"><?php echo $row["payment_type"];?></td>
  <td class="budget"><?php echo $row["payment_date"];?></td>
  <td class="budget"><?php echo $row["username"];?></td>
  

  
  <!--
                      <td class="text-center">
                        <div class="dropdown">
                          <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v"></i>
                          </a>
                          <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                            <a class="dropdown-item" href="?girl=5">Girl Details</a>
                            <a class="dropdown-item" href="?kin=5">Next Of Kin</a>
                            <a class="dropdown-item" href="?school=5">School</a>
                            <a class="dropdown-item" href="?musaned=5">Musaned</a>
                            <a class="dropdown-item" href="?nea=5">Nea</a>
                            <a class="dropdown-item" href="?enjaz=5">Enjaz</a>
                            <a class="dropdown-item" href="?embassy=5">Embassy</a>
                            <a class="dropdown-item" href="?clearance=5">Clearance</a>
                            <a class="dropdown-item" href="?travel=5">Travel</a>
                          </div>
                        </div>
                      </td>
-->
</tr>








<?php
    

endwhile;
else:"something went wrong cut one... ".$_GET['girl'];
endif;
}else{"something went wrong... ";}

