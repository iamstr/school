<?php

use PhpOffice\PhpSpreadsheet\Reader\Xlsx;


require_once 'core.php';
require '../vendor/autoload.php';
//echo $_FILES['bulk']['name'];
$valid['success'] = array('success' => false, 'messages' => array());
if ($_FILES['bulk']['name']) {

    $allowedFileType = [
        'application/vnd.ms-excel',
        'text/xls',
        'text/xlsx',
        'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
    ];

    if (in_array($_FILES["bulk"]["type"], $allowedFileType)) {

        $targetPath = '../uploads/' . $_FILES['bulk']['name'];
        move_uploaded_file($_FILES['bulk']['tmp_name'], $targetPath);

        $Reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();

        $spreadSheet = $Reader->load($targetPath);
        $excelSheet = $spreadSheet->getActiveSheet();
        $spreadSheetAry = $excelSheet->toArray();
        $sheetCount = count($spreadSheetAry);

        for ($i = 0; $i <= $sheetCount; $i ++) {
            $productCode = "";
            if (isset($spreadSheetAry[$i][0])) {
                $productCode = mysqli_real_escape_string($connect, $spreadSheetAry[$i][0]);
            }
             $productName= "";
             $productRate= "";
             $productQuantity= "";
             $productCategory= "";
             $productBrand= "";
             $status= "";
          
//            $productName= "";
//            $productName= "";
            if (isset($spreadSheetAry[$i][1])) {
                $productName = mysqli_real_escape_string($connect, $spreadSheetAry[$i][1]);
            }if (isset($spreadSheetAry[$i][2])) {
                $productRate = mysqli_real_escape_string($connect, $spreadSheetAry[$i][2]);
            }
            if (isset($spreadSheetAry[$i][3])) {
                 $productQuantity = mysqli_real_escape_string($connect, $spreadSheetAry[$i][3]);
            }
          
          if (isset($spreadSheetAry[$i][4])) {
                 $productBrand = mysqli_real_escape_string($connect, $spreadSheetAry[$i][4]);
            }
          if (isset($spreadSheetAry[$i][5])) {
                 $productCategory = mysqli_real_escape_string($connect, $spreadSheetAry[$i][5]);
            }
          if (isset($spreadSheetAry[$i][6])) {
                 $status = mysqli_real_escape_string($connect, $spreadSheetAry[$i][6]);
            }

            if (! empty($productName) && ! empty($productCode)&& ! empty($productRate)&& ! empty($productQuantity)) {

                $paramArray = array(
                  $productCode,
                  $productName,
                  $productRate,
                   $productQuantity
                );
              
              if($productName==="Product Name"||$productCode==="Product Code"||$productRate==="Rate"||$productQuantity==="Quantity"||$productBrand==="Brand"||$productCategory==="Category"||$status==="Status"){
                
//                echo $productCode.
//                  $productName.
//                  $productRate.
//                  $productQuantity.
//                  $productBrand.
//                  $productCategory.
//                  $status;
                
              }else{
                
                
                if(!empty($productCategory)||!empty($productBrand)){
                  
                  $productBrand="generic";
                  $productCategory="generic";
                }
                $sql = "SELECT * FROM product where product_name='$productName'";
                $brandSql = "SELECT * FROM brands where brand_name='$productBrand'";
                $categorySql = "SELECT * FROM categories where categories_name='$productCategory'";

                
                
                
                if(!$result = $connect->query($sql)){
                  echo("Error description: " . $connect -> error);
                }if(!$brandResult = $connect->query($brandSql)){
                  echo("Error description: " . $connect -> error);
                }if(!$categoryResult = $connect->query($categorySql)){
                  echo("Error description: " . $connect -> error);
                }
                echo $brandResult->num_rows."<br/>";
                
                if($brandResult->num_rows <= 0) {
                  $sql = "INSERT INTO `brands`( `brand_name`, `brand_active`, `brand_status`) VALUES('$productBrand',1,1)";
                 
                 if(!$brandResult = $connect->query($sql)){
                  echo("Error description: " . $connect -> error);
                  }
                  
                  $brand_id= $connect->insert_id;
                  
                }
                else{
                    
                    $row = $brandResult->fetch_array();
                    $brand_id=$row[0];

                    }
                if($categoryResult->num_rows <= 0) {
                    $sql = "INSERT INTO `categories`( `categories_name`, `categories_active`, `categories_status`) VALUES('$productCategory',1,1)";
                  
                   if(!$categoryResult = $connect->query($sql)){
                  echo("Error description: " . $connect -> error);
                  }
//                    $categoryResult = $connect->query($sql);
                    $category_id= $connect->insert_id;
                  

                }
                else{

                    $row = $categoryResult->fetch_array();
                    $category_id=$row[0];

                    }
                $output = array('data' => array());
                if($result->num_rows <= 0) { 


                                $sql = "INSERT INTO `product`( `product_name` ,`brand_id`, `categories_id`, `quantity`, `rate`, `active`, `status`, `product_code`) VALUES('$productName',$brand_id,$category_id,$productQuantity,$productRate,1,1,'$productCode')";

                //                $result = $connect->query($sql);
                              if($connect->query($sql) === TRUE) {
                                    $valid['success'] = true;
                                    $valid['messages'] = "Successfully Added";	
                                echo $connect->error;
                                } 
                              else {
                                    $valid['success'] = false;
                                    $valid['messages'] = "Error while adding the members";
                                echo $connect->error;
                                }
                  
                  

                              }else{
                                
                  echo $productName.$brand_id.$category_id.$productQuantity.$productRate.$productCode;
                              }

             
             
              
            }
        }
      
//      echo json_encode($valid);
//           echo $connect->error;
    } 
       
}
  
   else {
        $type = "error";
        $message = "Invalid File Type. Upload Excel File.";
      echo json_encode($valid);
    }
}else{
  $valid['success'] = false;
  $valid['messages'] = "Failed";	
  echo json_encode($valid);
}