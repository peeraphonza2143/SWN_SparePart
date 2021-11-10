<meta charset="UTF-8">
<?php 
$Time = date("d-m-Y");
$e = explode("-", $Time);
$month = "$e[1]";
$year = "$e[2]";
$day = "$e[0]";
$sql7 = "SELECT * FROM tbl_withdraw_sparepart WHERE withdraw_Status='Booking' AND withdraw_month = '$month' AND withdraw_year = '$year' ";
$result7 = mysqli_query($con, $sql7) or die ("Error in query: $sql7 " . mysqli_error());
$row_am7 = mysqli_fetch_assoc($result7);
if(mysqli_num_rows($result7)>=1){
    do {
     $day_late = 0;
     $withdraw_ID = $row_am7['withdraw_ID'];
     $day_late = $row_am7['withdraw_day'] + 3 ; 
   
     if($day >= $day_late){
       
        $sql7 = "SELECT * FROM tbl_withdraw_sparepart WHERE withdraw_ID='$withdraw_ID' ";
        $result7 = mysqli_query($con, $sql7) or die ("Error in query: $sql7 " . mysqli_error());
        $row_am7 = mysqli_fetch_array($result7);
        $Item_number = $row_am7['withdraw_Item_number'];
        $Item_Quantity_withdraw = $row_am7['withdraw_Quantity'];
        
        $sql8 = "SELECT * FROM tbl_spare_part WHERE Sp_number='$Item_number' ";
        $result8 = mysqli_query($con, $sql8) or die ("Error in query: $sql8 " . mysqli_error());
        $row_am8 = mysqli_fetch_array($result8);
        $Item_Quantity = $row_am8['Sp_Quantity'] + $Item_Quantity_withdraw;
    
        $sql9 = "UPDATE tbl_spare_part SET  
        Sp_Quantity ='$Item_Quantity'
        WHERE Sp_number='$Item_number' ";
        $result9 = mysqli_query($con, $sql9) or die ("Error in query: $sql9 " . mysqli_error()); 
        
        $sql1 = "DELETE FROM tbl_withdraw_sparepart WHERE withdraw_ID ='$withdraw_ID' ";
        $result = mysqli_query($con, $sql1) or die ("Error in query: $sql1 " . mysqli_error()); 

        $sql2 = "SELECT * FROM tbl_member
    WHERE member_Role LIKE 'Admin' OR member_Role LIKE 'Super' ORDER BY member_ID ASC";
    $result2 =mysqli_query($con,$sql2);
    $row_am =  mysqli_fetch_assoc($result2);
    do {
    $member_ID = $row_am['member_ID'];
    if($row_am['member_Alert_count'] == 0 ){$Alerts_Count=0;}
    else{$Alerts_Count=$row_am['member_Alert_count'] - 1;} 
     $sql3 = "UPDATE tbl_member SET  
    member_Alert_count ='$Alerts_Count'
    WHERE member_ID='$member_ID' ";
    $result3 = mysqli_query($con, $sql3) or die ("Error in query: $sql3 " . mysqli_error()); 
    } while ($row_am =  mysqli_fetch_assoc($result2));
     }
    } while ($row_am7 =  mysqli_fetch_assoc($result7));

    
}
else{
   
}
?>