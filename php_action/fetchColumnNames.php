
<?php   require_once("core.php");?>
<div class="row w-100">
  
  <h3 class="font-weight-bold m-4">Girl Details</h3>
</div>

<?php

//girls table
$sql="SELECT DISTINCT UPPER( column_name) FROM INFORMATION_SCHEMA.COLUMNS where TABLE_SCHEMA='schools' &&  TABLE_NAME='girls'  and column_name not like'%girl_id'&& column_name not like '%update%' and column_name not like'%agency_id' ";

$result=$connect->query($sql) ;
  
  
  while($row=$result->fetch_array()){
    
    echo '<div class="btn-group-toggle m-1 my-2" data-toggle="buttons">
  <label class="btn btn-outline-str-secondary active" class="text-capitalize">
    <input type="checkbox" autocomplete="off" checked /> '.str_replace("_"," ",$row[0]).'</label></div>';
  }
  ?>


<!--
<div class="row w-100">
  
  <h3 class="font-weight-bold m-4">Uploads</h3>
</div>
-->


<?php

//agency table
$sql="SELECT DISTINCT UPPER( column_name) FROM INFORMATION_SCHEMA.COLUMNS where TABLE_SCHEMA='schools' &&  TABLE_NAME='agencies'  && column_name  like '%agency_name' ";

$result=$connect->query($sql) ;
  
  
  while($row=$result->fetch_array()){
    
    echo '<div class="btn-group-toggle m-1 my-2" data-toggle="buttons">
  <label class="btn btn-outline-str-secondary active" class="text-capitalize">
    <input type="checkbox" autocomplete="off" checked /> '.str_replace("_"," ",$row[0]).'</label></div>';
  }
  ?>


<div class="row w-100">
  
  <h3 class="font-weight-bold m-4">Reports</h3>
</div>









<?php

//next of kin table
$sql="SELECT  UPPER( column_name) FROM INFORMATION_SCHEMA.COLUMNS where TABLE_SCHEMA='schools' &&  TABLE_NAME='reports'    && column_name not like '%_update_by%' && column_name not like '%girl_id%'  &&   column_name not like '%report_id%'";

$result=$connect->query($sql) ;
  
  
  while($row=$result->fetch_array()){
    
    echo '<div class="btn-group-toggle m-1 my-2" data-toggle="buttons">
  <label class="btn btn-outline-str-secondary active" class="text-capitalize">
    <input type="checkbox" autocomplete="off" checked /> '.str_replace("_"," ",$row[0]).'</label></div>';
  }
  ?>











