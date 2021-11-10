<meta charset="UTF-8">
<?php
include('condb.php');  
$Sp_ID = $_REQUEST["ID"];

$sql = "DELETE FROM tbl_spare_part WHERE Sp_ID ='$Sp_ID' ";
$result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error()); 

  if($result){
  echo "<script type='text/javascript'>";
  echo "alert('Delete Succesfuly');";
  echo "window.location = 'Sparepart_table.php'; ";
  echo "</script>";
  }
  else{
  echo "<script type='text/javascript'>";
  echo "alert('Error back to delete again');";
  echo "</script>";
}
?>