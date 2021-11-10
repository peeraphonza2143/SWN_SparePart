<?php 
if($_SESSION['member_username'] !=''){
    $member_ID = $_SESSION['member_ID'];
    $member_username = $_SESSION['member_username'];
    $member_nameF = $_SESSION["member_nameF"];
    $member_nameL = $_SESSION['member_nameL'];  
    $member_PIN = $_SESSION['member_PIN'];  
    $member_Role = $_SESSION['member_Role']; 

}
   if($member_ID==''){
      Header("Location: index.php");  
    } 
?>