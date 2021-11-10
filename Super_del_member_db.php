<meta charset="UTF-8">
<?php
include('condb.php');  
$member_ID = $_REQUEST["ID"];

$sql = "DELETE FROM tbl_member WHERE member_ID ='$member_ID' ";
$result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error()); 

  if($result){
  echo "<script type='text/javascript'>";
  echo "alert('Delete Succesfuly');";
  echo "window.location = 'Super_member_table.php'; ";
  echo "</script>";
  }
  else{
  echo "<script type='text/javascript'>";
  echo "alert('Error back to delete again');";
  echo "</script>";
}
?>