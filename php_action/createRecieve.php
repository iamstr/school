<?php
require_once("core.php");
$valid['success'] = array('success' => false, 'messages' => array());
if(isset($_POST['girl'])&&isset($_POST['paid'])&& isset($_POST["payment"])):

$user=$_SESSION['user'];
  $date=date("Y-m-d");
$paid=$_POST['paid'];
$payment=$_POST['payment'];
$girl=$_POST['girl'];
$sql="update reports set report_due=report_due-'$paid' , report_paid=report_paid+'$paid', report_update_by='$user' where girl_id='$girl'";
$connect->query($sql);
$select=" select report_id from reports where girl_id='$girl'";


$result=$connect->query($select);

if($result->num_rows >0):

$row=$result->fetch_array();
$report=$row[0];


$insert=" INSERT INTO payments ( `payment_type`,`report_id`, `recieved_by`) VALUES ('$payment','$report','$user')";

if($result=$connect->query($insert)):

$valid["messages"]=" successfully recieved ";
$valid["success"]=true;


else:

    $valid["messages"]=" unsuccessfully attemptedtry again... ";
    $valid["success"]=false;


endif;
endif;

endif;

$connect->close();

echo json_encode($valid);
  


?>