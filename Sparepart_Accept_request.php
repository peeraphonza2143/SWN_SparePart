<meta charset="UTF-8">
<?php 
include('condb.php');
$withdraw_ID = $_REQUEST["ID"];
$Status = "Approve";
$Time = date("d-m-Y");
$e = explode("-", $Time);
$month = "$e[1]";
$year = "$e[2]";

#----------------------------------------------Update Inventory --------------------------------------------------------------
$sql7 = "SELECT * FROM tbl_withdraw_sparepart
WHERE withdraw_ID = '$withdraw_ID' AND withdraw_month = '$month' AND
      withdraw_year = '$year' ORDER BY withdraw_ID ASC";
$result7 = mysqli_query($con, $sql7) or die ("Error in query: $sql7 " . mysqli_error()); 
$row_am1 =  mysqli_fetch_assoc($result7);
#--------------------------------------------Line notify----------------------------------------------------------------------
$member_PIN1 = $row_am1['withdraw_member_PIN'];

$sql12 = "SELECT * FROM tbl_withdraw_sparepart
WHERE withdraw_ID LIKE '$withdraw_ID' ORDER BY withdraw_ID ASC";
 $result12 =mysqli_query($con,$sql12);
 $row_am12 =  mysqli_fetch_assoc($result12);
 
 $date_book1 =  date("d-m-Y");
 $Time = date("h:i:s a");
 $User_ID = $row_am12['withdraw_member_PIN'];
 $date_use1 = $row_am12['withdraw_date_use'];
 $Item_Number = $row_am12['withdraw_Item_number'];
 $Item_name = $row_am12['withdraw_Item_name'];
 $Mfg = $row_am12['withdraw_Mfg'];
 $Quantity = $row_am12['withdraw_Quantity'];
 $cause = $row_am12['withdraw_cause'];


$msg_id_post = "ผู้ดูแลระบบได้ทำการยืนยันการร้องขอเบิก "."\n".
               "\n".
               "Item Number : "."$Item_Number"."\n".
               "Item Name : "."$Item_name"."\n".
               "Store : "."$Mfg"."\n".
               "Quantity : "."$Quantity"."\n".
               "WO : "."$cause"."\n".
               "Using Date : "."$date_use1"."\n".
              "\n".
               "Confirm Date : "."$date_book1"."\n".
               "Confirm Time : "."$Time"."\n";
include('Line_Notify_conect_member.php');



#----------------------------------------------Update Inventory --------------------------------------------------------------
$MFG = $row_am1['withdraw_Mfg'];
$Quantity = $row_am1['withdraw_Quantity'];

$sql8="SELECT * FROM tbl_invertory_sparepart
WHERE  Iv_year='".$year."'
AND    Iv_month='".$month."'
AND    Iv_Mfg='".$MFG."'";
$result8 = mysqli_query($con, $sql8) or die ("Error in query: $sql8 " . mysqli_error()); 
$row_am2 =  mysqli_fetch_assoc($result8);
$Iv_ID=$row_am2['Iv_ID'];
$Iv_Num_befor=$row_am2['Iv_Num_befor'];
$Iv_Num_Add=$row_am2['Iv_Num_Add'];
$Iv_Num_after=$row_am2['Iv_Num_after'];
$Iv_Num_reduce = $row_am2['Iv_Num_reduce'];

$Iv_Num_reduce=$Iv_Num_reduce + $Quantity;
$Iv_Num_after =$Iv_Num_befor + $Iv_Num_Add - $Iv_Num_reduce  ;
if(mysqli_num_rows($result8)==1){

  $sql9 = "UPDATE tbl_invertory_sparepart SET  
  Iv_Num_after='$Iv_Num_after', 
  Iv_Num_reduce='$Iv_Num_reduce'
  WHERE Iv_ID='$Iv_ID' ";
$result9 = mysqli_query($con, $sql9) or die ("Error in query: $sql9 " . mysqli_error());
}
else{
  echo "<script type='text/javascript'>";
  echo "alert('Error back to add Sparepart again');";
  echo "window.location = 'index.php; "; 
  echo "</script>";
}
#--------------------------------------------- Update tbl withdraw------------------------------------------------------------
$sql = "UPDATE tbl_withdraw_sparepart SET  
withdraw_Status='$Status'
WHERE withdraw_ID='$withdraw_ID' ";
$result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error()); 
#---------------------------------------------Update Alert member ------------------------------------------------------------
$sql2 = "SELECT * FROM tbl_member
WHERE member_Role LIKE 'Admin' OR member_Role LIKE 'Super' ORDER BY member_ID ASC";
 $result2 =mysqli_query($con,$sql2);
 $row_am =  mysqli_fetch_assoc($result2);
 do {
    $member_ID = $row_am['member_ID'];
    if($row_am['member_Alert_count2'] == 0 ){$Alerts_Count2=0;}
    else{$Alerts_Count2=$row_am['member_Alert_count2'] - 1;} 
     $sql3 = "UPDATE tbl_member SET  
    member_Alert_count2 ='$Alerts_Count2'
    WHERE member_ID='$member_ID' ";
    $result3 = mysqli_query($con, $sql3) or die ("Error in query: $sql3 " . mysqli_error()); 
    } while ($row_am =  mysqli_fetch_assoc($result2));

#Update member

$sql4 = "SELECT * FROM tbl_withdraw_sparepart WHERE withdraw_ID='$withdraw_ID' ";
$result4 = mysqli_query($con, $sql4) or die ("Error in query: $sql4 " . mysqli_error());
$row_am2 = mysqli_fetch_array($result4);
$member_PIN = $row_am2['withdraw_member_PIN'];

$sql5 = "SELECT * FROM tbl_member
WHERE member_PIN LIKE '$member_PIN'  ORDER BY member_ID ASC";
     $result5 =mysqli_query($con,$sql5);
     $row_am5 =  mysqli_fetch_assoc($result5);

     $Alerts_Count=$row_am5['member_Alert_count'] + 1;

$sql6 = "UPDATE tbl_member SET  
member_Alert_count ='$Alerts_Count'
WHERE member_PIN='$member_PIN' ";
        $result6 = mysqli_query($con, $sql6) or die ("Error in query: $sql6 " . mysqli_error()); 
#------------------------------------------------------------------------------------------------------------------------------

if($result){
    echo "<script type='text/javascript'>";
    echo "alert('Confirm Succesfuly');";
    echo "window.location = 'Sparepart_request_list.php'; ";
    echo "</script>";
    }
    else{
    echo "<script type='text/javascript'>";
    echo "alert('Error back to Booking again');";
    echo "window.location = 'Sparepart_request_list.php'; "; 
    echo "</script>";
  }
?>