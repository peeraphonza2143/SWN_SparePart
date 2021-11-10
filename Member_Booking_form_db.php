<meta charset="UTF-8">
<?php 
include('condb.php');
$Sp_ID = $_REQUEST["Sp_ID"];
$Sp_Quantity = $_REQUEST["Sp_Quantity"];
$Sp_number = $_REQUEST["Sp_number"];
$Sp_Name = $_REQUEST["Sp_Name"];
$Sp_Mfg = $_REQUEST["Sp_Mfg"];
$Sp_Quantity2 = $_REQUEST["Sp_Quantity2"];
$date_book1 =  date("d-m-Y");
$cause = $_REQUEST["cause"];
$date_use1 = $_REQUEST["date_use"];
$member_nameF = $_REQUEST["member_nameF"];
$member_PIN = $_REQUEST["member_PIN"];
$withdraw_Status = "Booking";
$e = explode("-", $date_book1);
$date_book = "$e[0]-$e[1]-$e[2]";
$e2 = explode("-", $date_use1);
$date_use = "$e2[2]-$e2[1]-$e2[0]";
$month = "$e[1]";
$year = "$e[2]";
$day = "$e[0]";
$Time = date("h:i:s a");
#-------------------------------------data edit in table spare part------------------------------------------------------------------------------------------------------------------------------------------------
if($Sp_Quantity2 > $Sp_Quantity){
    echo "<script type='text/javascript'>";
    echo "alert('จำนวน Sparepart ไม่พอต่อการจองของท่าน');";
    echo "window.location = ' Member_Booking_form.php?act=edit&ID=$Sp_ID'; ";
    echo "</script>";
}else{
$Sp_Quantity = $Sp_Quantity - $Sp_Quantity2;
$sql = "UPDATE tbl_spare_part SET  
Sp_Quantity='$Sp_Quantity'
WHERE Sp_ID='$Sp_ID' ";
$result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error()); 
#-------------------------------------data save in table withdraw--------------------------------------------------------------------------------------------------------------------------------------------------
$sql1 = "INSERT INTO tbl_withdraw_sparepart(withdraw_Item_number,withdraw_Item_name, withdraw_Mfg, withdraw_Quantity, withdraw_cause,withdraw_date, withdraw_date_use,withdraw_member_PIN,withdraw_member_name,withdraw_Status,withdraw_year,withdraw_month,withdraw_day)
VALUES('$Sp_number','$Sp_Name','$Sp_Mfg','$Sp_Quantity2', '$cause','$date_book', '$date_use', '$member_PIN','$member_nameF','$withdraw_Status','$year','$month','$day')";
$result1 = mysqli_query($con, $sql1) or die ("Error in query: $sql1 " . mysqli_error());
#------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
#-------------------------------------data edit alert table member--------------------------------------------------------------------------------------------------------------------------------------------------
$sql2 = "SELECT * FROM tbl_member
WHERE member_Role LIKE 'Admin' OR member_Role LIKE 'Super' ORDER BY member_ID ASC";
 $result2 =mysqli_query($con,$sql2);
 $row_am =  mysqli_fetch_assoc($result2);
 do {
    $member_ID = $row_am['member_ID'];
    $Alerts_Count=$row_am['member_Alert_count'] + 1; 
  
     $sql3 = "UPDATE tbl_member SET  
    member_Alert_count ='$Alerts_Count'
    WHERE member_ID='$member_ID' ";
    $result3 = mysqli_query($con, $sql3) or die ("Error in query: $sql3 " . mysqli_error()); 
    } while ($row_am =  mysqli_fetch_assoc($result2));
#------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
#------------------------------------------------------Line notify-------------------------------------------------------------------------------------------------------------------------------------------------

$msg_id_post = "ผู้ใช้งาน ".$member_PIN." ได้ทำการจอง "."\n".
               "\n".
               "Item Number : "."$Sp_number"."\n".
               "Item Name : "."$Sp_Name"."\n".
               "Store : "."$Sp_Mfg"."\n".
               "Quantity : "."$Sp_Quantity2"."\n".
               "WO : "."$cause"."\n".
               "Using Date : "."$date_use"."\n".
              "\n".
               "Booking Date : "."$date_book1"."\n".
               "Booking Time : "."$Time"."\n";
include('Line_Notify_conect.php');

#------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
 mysqli_close($con);

 if($result1){
    echo "<script type='text/javascript'>";
    echo "alert('Booking Succesfuly');";
    echo "window.location = 'Member_Booking_list.php'; ";
    echo "</script>";
    }
    else{
    echo "<script type='text/javascript'>";
    echo "alert('Error back to Booking again');";
    echo "window.location = 'Member_Booking_form.php?act=edit&ID=$Sp_ID'; "; 
    echo "</script>";
  }
}
?>