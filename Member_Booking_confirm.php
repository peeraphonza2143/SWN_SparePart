<meta charset="UTF-8">
<?php 
include('condb.php');
$withdraw_ID = $_REQUEST["ID"];
$Status = "Withdraw";

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
    if($row_am['member_Alert_count'] == 0 ){$Alerts_Count=0;}
    else{$Alerts_Count=$row_am['member_Alert_count'] - 1;} 
    $Alerts_Count2=$row_am['member_Alert_count2'] + 1;
     $sql3 = "UPDATE tbl_member SET  
    member_Alert_count ='$Alerts_Count',
    member_Alert_count2 ='$Alerts_Count2'
    WHERE member_ID='$member_ID' ";
    $result3 = mysqli_query($con, $sql3) or die ("Error in query: $sql3 " . mysqli_error()); 
    } while ($row_am =  mysqli_fetch_assoc($result2));
#------------------------------------------------------------------------------------------------------------------------------
#------------------------------------------------------Line notify-------------------------------------------------------------------------------------------------------------------------------------------------
$sql4 = "SELECT * FROM tbl_withdraw_sparepart
WHERE withdraw_ID LIKE '$withdraw_ID' ORDER BY withdraw_ID ASC";
 $result4 =mysqli_query($con,$sql4);
 $row_am4 =  mysqli_fetch_assoc($result4);
 
 $date_book1 =  date("d-m-Y");
 $Time = date("h:i:s a");
 $User_ID = $row_am4['withdraw_member_PIN'];
 $date_use1 = $row_am4['withdraw_date_use'];
 $Item_Number = $row_am4['withdraw_Item_number'];
 $Item_name = $row_am4['withdraw_Item_name'];
 $Mfg = $row_am4['withdraw_Mfg'];
 $Quantity = $row_am4['withdraw_Quantity'];
 $cause = $row_am4['withdraw_cause'];


$msg_id_post = "ผู้ใช้งาน ".$User_ID." ได้ทำการยืนยันการเบิก "."\n".
               "\n".
               "Item Number : "."$Item_Number"."\n".
               "Item Name : "."$Item_name"."\n".
               "Store : "."$Mfg"."\n".
               "Quantity : "."$Quantity"."\n".
               "WO : "."$cause"."\n".
               "Using Date : "."$date_use1"."\n".
              "\n".
               "Withdraw Date : "."$date_book1"."\n".
               "Withdraw Time : "."$Time"."\n";
include('Line_Notify_conect.php');
#------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

if($result){
    echo "<script type='text/javascript'>";
    echo "alert('Confirm Succesfuly');";
    echo "window.location = 'Member_Booking_list.php'; ";
    echo "</script>";
    }
    else{
    echo "<script type='text/javascript'>";
    echo "alert('Error back to Booking again');";
    echo "window.location = 'Member_Booking_list.php'; "; 
    echo "</script>";
  }
?>