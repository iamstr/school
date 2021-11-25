<?php 
require_once("core.php");

//
//$sql="select
//girls.girl_id,
//girl_fullname,
//girl_IDnumber,
//girl_phone,
//girl_dob,
//girl_religion,
//girl_county,
//girl_passport,
//passport_date_issue,
//passport_date_expiry,
//girl_passport_place,
//girl_goodConduct,
//girl_birth,
//girl_firstMedical,
//dateCreated,
//next_of_kin_fullname,
//next_of_kin_IDnumber,
//next_of_kin_relationship,
//next_of_kin_phone,
//next_of_kin_fullname2,
//next_of_kin_IDnumber2,
//next_of_kin_relationship2,
//next_of_kin_phone2,
//school_name,
//school_start,
//school_end,
//school_cert,
//musaned_status,
//musaned_sponsporName,
//musaned_sponsporNumber,
//musaned_sponsporID,
//musaned_sponsporAddress,
//musaned_contractNumber,
//musaned_visaNumber,
//agency_id,
//nea_date,
//nea_status,
//enjaz_status,
//enjaz_date,
//enjaz_medical,
//medical_id,
//enjaz_medicalDate,
//enjaz_wakala,
//embassy_status,
//embassy_date,
//embassy_visaForm,
//embassy_medical,
//enjaz_number,
//clearance_attestationList,
//clearance_CertificateOfIncorporation,
//clearance_status,
//clearance_FullMedical,
//clearance_GoodConduct,
//clearance_PassportCopy,
//clearance_GirlContract,
//clearance_NextOfKinIDCopy,
//clearance_VisaForm,
//travel_date,
//travel_arrival,
//travel_pregnancy,
//travel_pcrStatus,
//travel_pcrCode,
//travel_pcrDate,
//travel_tshirt,
//travel_stampedClearanceForm,
//travel_ticket,
//travel_yellowFever
//
//
//from girls 
// 
//
//
//
//left join next_of_kin on girls.girl_id=next_of_kin.girl_id
//left join on (schools inner join school_names on ) on girls.girl_id=schools.girl_id
//
//
//left join ( musaned inner join agencies on musaned.agency_id=agencies.agency_id)on girls.girl_id=musaned.girl_id
//
//left join nea on girls.girl_id=nea.girl_id
//
//
//left join enjaz on girls.girl_id=enjaz.girl_id
//
//left join  embassy on girls.girl_id=embassy.girl_id
//
//left join clearance on girls.girl_id=clearance.girl_id
//
//left join travel on girls.girl_id=travel.girl_id
//
//
//  ";





$sql="select * from report";
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
   <?php echo strlen($row[$count])>0?$row[$count]:"No data";
              
    
    
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




<script>
//        $(document).ready(function(e) {
//          const row = $(".table-agent");
//
//          const selectColumnActive = $(".btn.btn-outline-str-secondary.active"),
//            selectColumn = $(".btn.btn-outline-str-secondary");
//
//          selectColumn.each(function() {
//            let th = document.createElement("th"),
//              text = $(this).text().trim();
//
//            th.setAttribute("scope", "col");
//            th.setAttribute("class", "sort ");
//            th.setAttribute("data-sort", $(this).text().trim());
//            th.setAttribute("data-toggle-table", $(this).text().trim());
//            th.innerText = text.replace(/\s\s+/g, " ");
//
//            // row.append(th);
//            $(th).insertBefore("th:last-child");
//          });
//          selectColumn.click(function(e) {
//            // console.log(
//            //   $(`[data-toggle-table='${$(this).text().trim()}']`).index()
//            // );
//            const INDEX = $(
//              `[data-toggle-table='${$(this).text().trim()}']`
//            ).index();
//
//            if ($(this).hasClass("active")) {
//              $(`[data-toggle-table='${$(this).text().trim()}']`).hide();
//              $(".table-agent-row").each(function() {
//                // console.log();
//                $(this).children().eq(INDEX).hide();
//              });
//            } else {
//              $(`[data-toggle-table='${$(this).text().trim()}']`).show();
//              $(".table-agent-row").each(function() {
//                // console.log();
//                $(this).children().eq(INDEX).show();
//              });
//            }
//          });
//        });

      </script>