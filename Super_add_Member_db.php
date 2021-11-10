<?php
include('condb.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
  //สร้างตัวแปรเก็บค่าที่รับมาจากฟอร์ม
  $member_username = $_REQUEST["member_username"];
  $member_pass = $_REQUEST["member_pass"];
  $member_pass_config = $_REQUEST["member_pass_config"];
  $member_PIN = $_REQUEST["member_PIN"];
  $member_nameF = $_REQUEST["member_nameF"];
  $member_nameL = $_REQUEST["member_nameL"];
  $member_department = $_REQUEST["member_department"];
  $member_Tel = $_REQUEST["member_Tel"];
  $role = 'Member';
  $member_key_Line = '0';
  $member_Alert_count = '0';
  //เพิ่มเข้าไปในฐานข้อมูล
  $sql="SELECT * FROM tbl_member
  WHERE  member_username='".$member_username."'";
  $result = mysqli_query($con,$sql);

 
if(mysqli_num_rows($result)!=1 ){
  if($member_pass != $member_pass_config){
		echo "<script type='text/javascript'>";
		echo "alert('password ไม่ตรงกัน กรุณาใส่่ใหม่อีกครั้ง ');";
		echo "window.location = 'Super_add_Member.php; ";   
		echo "</script>";
	}else{
  $sql2 = "INSERT INTO tbl_member(member_username, member_pass, member_PIN, member_nameF, member_nameL,member_department,member_Tel,member_Role,member_Key_Line,member_Alert_count)
       VALUES('$member_username', '$member_pass', '$member_PIN', '$member_nameF', '$member_nameL', '$member_department','$member_Tel','$role','$member_key_Line','$member_Alert_count')";

  $result2 = mysqli_query($con, $sql2) or die ("Error in query: $sql2 " . mysqli_error());
  mysqli_close($con);
  }
}
else{
     echo "<script type='text/javascript'>";
     echo "alert('Username ของท่านมีผู้ใช้ไปแล้ว');";
     echo "window.location = 'Super_add_Member.php'; ";
     echo "</script>";
}
  
  if($result){
  echo "<script type='text/javascript'>";
  echo "alert('Register Succesfuly');";
  echo "window.location = 'Super_member_table.php'; ";
  echo "</script>";
  }
  else{
  echo "<script type='text/javascript'>";
  echo "alert('Error back to register again');";
  echo "window.location = 'Super_add_Member.php; "; 
  echo "</script>";
}
?>