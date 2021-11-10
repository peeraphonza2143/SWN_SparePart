<?php 
include('condb.php');
#-----------------------------------------------------------------------------------------------------------------------------------------
$dir = "uploads/";
$fileImage = $dir . basename($_FILES["file"]["name"]);
if(move_uploaded_file($_FILES["file"]["tmp_name"],$fileImage)){}
  $Sp_number = $_REQUEST["Sp_number"];
  $Sp_Name = $_REQUEST["Sp_Name"];
  $Sp_Itemgroup = $_REQUEST["Sp_Itemgroup"];
  $Sp_warehouse = $_REQUEST["Sp_warehouse"];
  $Sp_Quantity = $_REQUEST["Sp_Quantity"];
  $Sp_Unit = $_REQUEST["Sp_Unit"];
  $Sp_Mfg = $_REQUEST["Sp_Mfg"];

$Time = date("d-m-Y");
$e = explode("-", $Time);
$month = "$e[1]";
$year = "$e[2]";
#----------------------------------------------------------------------------------------------------------------------------------------

$sql1="SELECT * FROM tbl_invertory_sparepart
WHERE  Iv_year='".$year."'
AND    Iv_month='".$month."'
AND    Iv_Mfg='".$Sp_Mfg."'";
$result1 = mysqli_query($con,$sql1);
$row_am =  mysqli_fetch_assoc($result1);
$Iv_ID=$row_am['Iv_ID'];
$Iv_Num_befor=$row_am['Iv_Num_befor'];
$Iv_Num_Add=$row_am['Iv_Num_Add'];
$Iv_Num_after=$row_am['Iv_Num_after'];
$Iv_Num_reduce = $row_am['Iv_Num_reduce'];
$Iv_Num_Add=$Iv_Num_Add + $Sp_Quantity;

$Iv_Num_after =$Iv_Num_befor + $Iv_Num_Add - $Iv_Num_reduce  ;
if(mysqli_num_rows($result1)==1){

  $sql2 = "UPDATE tbl_invertory_sparepart SET  
  Iv_Num_Add='$Iv_Num_Add', 
  Iv_Num_after='$Iv_Num_after'
  WHERE Iv_ID='$Iv_ID' ";
$result2 = mysqli_query($con, $sql2) or die ("Error in query: $sql2 " . mysqli_error());
}
else{
  echo "<script type='text/javascript'>";
  echo "alert('Error back to add Sparepart again');";
  echo "window.location = 'index.php; "; 
  echo "</script>";
}

#----------------------------------------Add tbl_sparepart -------------------------------------------------------------------------------
  $sql = "INSERT INTO tbl_spare_part(Sp_number, Sp_Name, Sp_Itemgroup, Sp_warehouse, Sp_Quantity,Sp_Mfg,Sp_Image,Sp_Unit)
       VALUES('$Sp_number', '$Sp_Name', '$Sp_Itemgroup', '$Sp_warehouse', '$Sp_Quantity', '$Sp_Mfg','$fileImage','$Sp_Unit')";

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
