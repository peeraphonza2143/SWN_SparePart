<?php
include('condb.php');  
include('Add_session.php');

$RSp_member_PIN = $member_PIN;
$RSp_member_name = $member_nameF;
$Sp_ID =  $_REQUEST["ID"];
$Quantity = $_REQUEST["Sp_Quantity"];

$sql7 = "SELECT * FROM tbl_spare_part
WHERE Sp_ID = '$Sp_ID' ORDER BY Sp_ID ASC";
$result7 = mysqli_query($con, $sql7) or die ("Error in query: $sql7 " . mysqli_error()); 
$row_am1 =  mysqli_fetch_assoc($result7);
$RSp_number =$row_am1['Sp_number'];
$RSp_Name = $row_am1['Sp_Name'];
$RSp_Itemgroup = $row_am1['Sp_Itemgroup'];
$RSp_warehouse	= $row_am1['Sp_warehouse'];
$RSp_Quantity = $Quantity;
$RSp_Mfg = $row_am1['Sp_Mfg'];
$RSp_Image = $row_am1['Sp_Image'];
$RSp_Unit =$row_am1['Sp_Unit'];
$RSp_Status = "Add";

$sql = "INSERT INTO Request_add_sparepart(RSp_member_name,RSp_member_PIN,RSp_number, RSp_Name, RSp_Itemgroup, RSp_warehouse, RSp_Quantity,RSp_Mfg,RSp_Image,RSp_Unit,RSp_Status)
VALUES('$RSp_member_name','$RSp_member_PIN','$RSp_number', '$RSp_Name', '$RSp_Itemgroup', '$RSp_warehouse', '$RSp_Quantity', '$RSp_Mfg','$RSp_Image','$RSp_Unit','$RSp_Status')";

$result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error());
mysqli_close($con);

  
  
if($result){
        echo "<script type='text/javascript'>";
        echo "alert('Add Succesfuly');";
        echo "window.location = 'Sparepart_table.php'; ";
        echo "</script>";
  
  }
  else{
  echo "<script type='text/javascript'>";
  echo "alert('Error back to register again');";
  echo "window.location = 'Sparepart_edit.php; "; 
  echo "</script>";
}
?>