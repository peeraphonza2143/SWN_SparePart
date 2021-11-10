<?php
include('condb.php');  
  $Sp_ID =  $_REQUEST["ID"];
  $Sp_Quantity = $_REQUEST["Sp_Quantity"];
  $Time = date("d-m-Y");
  $e = explode("-", $Time);
  $month = "$e[1]";
  $year = "$e[2]";
  #----------------------------------------------Update Inventory --------------------------------------------------------------
  $sql7 = "SELECT * FROM tbl_spare_part
  WHERE Sp_ID = '$Sp_ID' ORDER BY Sp_ID ASC";
  $result7 = mysqli_query($con, $sql7) or die ("Error in query: $sql7 " . mysqli_error()); 
  $row_am1 =  mysqli_fetch_assoc($result7);
  $MFG = $row_am1['Sp_Mfg'];
  $Sp_Quantity_add = $row_am1['Sp_Quantity'];
  $Sp_Quantity_add = $Sp_Quantity_add + $Sp_Quantity;
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
  
  $Iv_Num_Add=$Iv_Num_Add + $Sp_Quantity;
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
#-------------------------------------------------------Update_sparepart table ----------------------------------------
    

    $sql = "UPDATE tbl_spare_part SET  
    Sp_Quantity='$Sp_Quantity_add'
    WHERE Sp_ID='$Sp_ID' ";

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