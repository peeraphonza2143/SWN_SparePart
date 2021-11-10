<?php 
include('condb.php');
$RSp_ID = $_REQUEST["ID"];
$sql3="SELECT * FROM request_add_sparepart
WHERE  RSp_ID='".$RSp_ID."'";
    $result3 = mysqli_query($con, $sql3) or die ("Error in query: $sql3 " . mysqli_error());
    $row_am3 = mysqli_fetch_array($result3);
    

#-----------------------------------------------------------------------------------------------------------------------------------------

  $Sp_number = $row_am3['RSp_number'];
  $Sp_Name = $row_am3['RSp_Name'];
  $Sp_Itemgroup = $row_am3['RSp_Itemgroup'];
  $Sp_warehouse =$row_am3['RSp_warehouse'];
  $Sp_Quantity = $row_am3['RSp_Quantity'];
  $Sp_Unit = $row_am3['RSp_Unit'];
  $Sp_Mfg = $row_am3['RSp_Mfg'];
  $fileImage = $row_am3['RSp_Image'];
  $RSp_Status = $row_am3['RSp_Status'];
$Time = date("d-m-Y");
$e = explode("-", $Time);
$month = "$e[1]";
$year = "$e[2]";

if($RSp_Status == "New"){
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
}
if($RSp_Status == "Add"){

  $sql7 = "SELECT * FROM tbl_spare_part
  WHERE Sp_number = '$Sp_number' ORDER BY Sp_ID ASC";
  $result7 = mysqli_query($con, $sql7) or die ("Error in query: $sql7 " . mysqli_error()); 
  $row_am1 =  mysqli_fetch_assoc($result7);
  $RSp_number =$row_am1['Sp_number'];
  $RSp_Quantity =$row_am1['Sp_Quantity'];
  $Sp_Quantity = $Sp_Quantity + $RSp_Quantity;

  $sql8="SELECT * FROM tbl_invertory_sparepart
  WHERE  Iv_year='".$year."'
  AND    Iv_month='".$month."'
  AND    Iv_Mfg='".$Sp_Mfg."'";
  $result8 = mysqli_query($con, $sql8) or die ("Error in query: $sql8 " . mysqli_error()); 
  $row_am2 =  mysqli_fetch_assoc($result8);
  $Iv_ID=$row_am2['Iv_ID'];
  $Iv_Num_befor=$row_am2['Iv_Num_befor'];
  $Iv_Num_Add=$row_am2['Iv_Num_Add'];
  $Iv_Num_after=$row_am2['Iv_Num_after'];
  $Iv_Num_reduce = $row_am2['Iv_Num_reduce'];
  
  $Iv_Num_Add=$Iv_Num_Add + $RSp_Quantity;
  $Iv_Num_after =$Iv_Num_befor + $Iv_Num_Add - $Iv_Num_reduce  ;
  if(mysqli_num_rows($result8)==1){
  
    $sql9 = "UPDATE tbl_invertory_sparepart SET  
    Iv_Num_Add='$Iv_Num_Add', 
    Iv_Num_after = '$Iv_Num_after'
    WHERE Iv_ID='$Iv_ID' ";
  $result9 = mysqli_query($con, $sql9) or die ("Error in query: $sql9 " . mysqli_error());
  }
  else{
    echo "<script type='text/javascript'>";
    echo "alert('Error back to add Sparepart again');";
    echo "window.location = 'index.php; "; 
    echo "</script>";
  }
  $sql11 = "UPDATE tbl_spare_part SET  
  Sp_Quantity='$Sp_Quantity'
  WHERE  Sp_number = '$Sp_number' ";

$result11 = mysqli_query($con, $sql11) or die ("Error in query: $sql11 " . mysqli_error());
 
  }

$sql4 = "DELETE FROM request_add_sparepart WHERE RSp_ID ='$RSp_ID' ";
$result4 = mysqli_query($con, $sql4) or die ("Error in query: $sql4 " . mysqli_error()); 


  mysqli_close($con);
  
  if($result4){
  echo "<script type='text/javascript'>";
  echo "alert('Add Sparepart Succesfuly');";
  echo "window.location = 'Super_request_add_sparepart.php'; ";
  echo "</script>";
  }
  else{
  echo "<script type='text/javascript'>";
  echo "alert('Error back to add Sparepart again');";
  echo "window.location = 'Super_request_add_sparepart.php'; "; 
  echo "</script>";
}
?>