<?php 
include('condb.php');
$RSp_ID = $_REQUEST["ID"];
$sql4 = "DELETE FROM request_add_sparepart WHERE RSp_ID ='$RSp_ID' ";
$result4 = mysqli_query($con, $sql4) or die ("Error in query: $sql4 " . mysqli_error()); 


  mysqli_close($con);
  

  
  if($result4){
  echo "<script type='text/javascript'>";
  echo "alert('delete Sparepart Succesfuly');";
  echo "window.location = 'Super_request_add_sparepart.php'; ";
  echo "</script>";
  }
  else{
  echo "<script type='text/javascript'>";
  echo "alert('Error back to delete Sparepart again');";
  echo "window.location = 'Super_request_add_sparepart.php'; "; 
  echo "</script>";
}
?>
