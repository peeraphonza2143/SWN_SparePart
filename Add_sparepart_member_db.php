<?php 
include('condb.php');
include('Add_session.php');
#-----------------------------------------------------------------------------------------------------------------------------------------
$dir = "uploads/";
$fileImage = $dir . basename($_FILES["file"]["name"]);
if(move_uploaded_file($_FILES["file"]["tmp_name"],$fileImage)){}
$Sp_member_PIN = $member_PIN;
$Sp_member_name = $member_nameF;
  $Sp_number = $_REQUEST["Sp_number"];
  $Sp_Name = $_REQUEST["Sp_Name"];
  $Sp_Itemgroup = $_REQUEST["Sp_Itemgroup"];
  $Sp_warehouse = $_REQUEST["Sp_warehouse"];
  $Sp_Quantity = $_REQUEST["Sp_Quantity"];
  $Sp_Unit = $_REQUEST["Sp_Unit"];
  $Sp_Mfg = $_REQUEST["Sp_Mfg"];

$RSp_Status = "New";
#----------------------------------------Add tbl_sparepart -------------------------------------------------------------------------------
  $sql = "INSERT INTO Request_add_sparepart(RSp_member_name,RSp_member_PIN,RSp_number, RSp_Name, RSp_Itemgroup, RSp_warehouse, RSp_Quantity,RSp_Mfg,RSp_Image,RSp_Unit,RSp_Status)
       VALUES('$Sp_member_name','$Sp_member_PIN','$Sp_number', '$Sp_Name', '$Sp_Itemgroup', '$Sp_warehouse', '$Sp_Quantity', '$Sp_Mfg','$fileImage','$Sp_Unit','$RSp_Status')";

  $result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error());
#---------------------------------------Invertory sparepart Deadstock----------------------------------------------------------------------
 
  mysqli_close($con);
  

  
  if($result){
  echo "<script type='text/javascript'>";
  echo "alert('Add Sparepart Succesfuly');";
  echo "window.location = 'Sparepart_table.php'; ";
  echo "</script>";
  }
  else{
  echo "<script type='text/javascript'>";
  echo "alert('Error back to add Sparepart again');";
  echo "window.location = 'Add_sparepart.php; "; 
  echo "</script>";
}
?>
