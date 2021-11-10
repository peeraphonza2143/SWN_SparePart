<?php 
include('condb.php');
include('Add_session.php');
$member_ID =  $_REQUEST["ID"];
$member_Key_Line =  $_REQUEST["Token"];
if($member_Key_Line == '0'){
	echo "<script type='text/javascript'>";
		echo "alert('Access Token ของท่านไม่ถูกต้อง');";
		echo "window.location = 'Add_Line_notify.php ";   
		echo "</script>";
}else{
    $sql = "UPDATE tbl_member SET  
    member_Key_Line='$member_Key_Line'
    WHERE member_ID='$member_ID' ";

$result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error());
$query = "SELECT * FROM tbl_member WHERE member_ID LIKE '%$member_ID%' ORDER BY member_ID ASC" or die("Error:" . mysqli_error());
$result3 = mysqli_query($con, $query);
$row_am = mysqli_fetch_assoc($result3);

$member_PIN1 = $member_PIN;
$msg_id_post = "เรียนผู้ใช้งาน $member_PIN1 ทางระบบได้ทำการเพิ่ม Line Notify ของท่านเรียบร้อยแล้ว";
include('Line_Notify_conect_member.php');
if($result){
    if($row_am['member_Role'] == "Admin"){
        echo "<script type='text/javascript'>";
        echo "alert('Add Succesfuly');";
        echo "window.location = 'Admin_page.php'; ";
        echo "</script>";
    }
    elseif($row_am['member_Role'] == "Super"){
        echo "<script type='text/javascript'>";
        echo "alert('Add Succesfuly');";
        echo "window.location = 'Super_page.php'; ";
        echo "</script>";
    }
    elseif($row_am['member_Role'] == "Member"){
        echo "<script type='text/javascript'>";
        echo "alert('Add Succesfuly');";
        echo "window.location = 'Member_page.php'; ";
        echo "</script>";
    }
  }
  else{
  echo "<script type='text/javascript'>";
  echo "alert('Error back to Add Line notify again');";
  echo "window.location = 'Add_Line_notify.php; "; 
  echo "</script>";
}
}
?>