<?php
include('condb.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
  //สร้างตัวแปรเก็บค่าที่รับมาจากฟอร์ม
  $member_ID =  $_REQUEST["ID"];
  $member_username = $_REQUEST["member_username"];
  $member_pass = $_REQUEST["member_pass"];
  $member_pass_config = $_REQUEST["member_pass_config"];
  $member_PIN = $_REQUEST["member_PIN"];
  $member_nameF = $_REQUEST["member_nameF"];
  $member_nameL = $_REQUEST["member_nameL"];
  $member_department = $_REQUEST["member_department"];
  $member_Tel = $_REQUEST["member_Tel"];

  //เพิ่มเข้าไปในฐานข้อมูล
  
  $query = "SELECT * FROM tbl_member WHERE member_ID LIKE '%$member_ID%' ORDER BY member_ID ASC" or die("Error:" . mysqli_error());
  $result3 = mysqli_query($con, $query);
  $row_am = mysqli_fetch_assoc($result3);

  $sql="SELECT * FROM tbl_member
  WHERE  member_username='".$member_username."'";
  $result = mysqli_query($con,$sql);

if($row_am['member_username'] == $member_username){
    $sql2 = "UPDATE tbl_member SET  
    member_username='$member_username', 
    member_pass='$member_pass', 
    member_PIN='$member_PIN',
    member_nameF='$member_nameF',
    member_nameL='$member_nameL',
    member_department='$member_department',
    member_Tel='$member_Tel'
    WHERE member_ID='$member_ID' ";
    $result2 = mysqli_query($con, $sql2) or die ("Error in query: $sql2 " . mysqli_error());
  }
else{
if(mysqli_num_rows($result)!=1 ){
  if($member_pass != $member_pass_config){
		echo "<script type='text/javascript'>";
		echo "alert('password ไม่ตรงกัน กรุณาใส่่ใหม่อีกครั้ง ');";
		echo "window.location = 'Login_Setting.php; ";   
		echo "</script>";
	}else{
        $sql2 = "UPDATE tbl_member SET  
        member_username='$member_username', 
        member_pass='$member_pass', 
        member_PIN='$member_PIN',
        member_nameF='$member_nameF',
        member_nameL='$member_nameL',
        member_department='$member_department',
        member_Tel='$member_Tel'
        WHERE member_ID='$member_ID' ";

  $result2 = mysqli_query($con, $sql2) or die ("Error in query: $sql2 " . mysqli_error());
  mysqli_close($con);
  }
}
else{
  echo "<script type='text/javascript'>";
  echo "alert('Username ของท่านมีผู้ใช้ไปแล้ว');";
  echo "window.location = 'Login_Setting.php'; ";
  echo "</script>";
}
}
  
  if($result){
    if($row_am['member_Role'] == "Admin"){
        echo "<script type='text/javascript'>";
        echo "alert('Edit Succesfuly');";
        echo "window.location = 'Admin_page.php'; ";
        echo "</script>";
    }
    elseif($row_am['member_Role'] == "Member"){
        echo "<script type='text/javascript'>";
        echo "alert('Edit Succesfuly');";
        echo "window.location = 'Member_page.php'; ";
        echo "</script>";
    }
    elseif($row_am['member_Role'] == "Super"){
      echo "<script type='text/javascript'>";
      echo "alert('Edit Succesfuly');";
      echo "window.location = 'Super_page.php'; ";
      echo "</script>";
  }
  }
  else{
  echo "<script type='text/javascript'>";
  echo "alert('Error back to register again');";
  echo "window.location = 'Super_edit_all.php; "; 
  echo "</script>";
}
?>