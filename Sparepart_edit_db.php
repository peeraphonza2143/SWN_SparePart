<?php
include('condb.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
  //สร้างตัวแปรเก็บค่าที่รับมาจากฟอร์ม
  $Sp_ID =  $_REQUEST["ID"];
  $Sp_number = $_REQUEST["Sp_number"];
  $Sp_Name = $_REQUEST["Sp_Name"];
  $Sp_Itemgroup = $_REQUEST["Sp_Itemgroup"];
  $Sp_warehouse = $_REQUEST["Sp_warehouse"];
  $Sp_Unit = $_REQUEST["Sp_Unit"];
  $Sp_Mfg = $_REQUEST["Sp_Mfg"];
  $Time = date("d-m-Y");
$e = explode("-", $Time);
$month = "$e[1]";
$year = "$e[2]";

  $sql4 = "SELECT * FROM tbl_spare_part
  WHERE Sp_ID ='$Sp_ID'  ORDER BY Sp_ID ASC";
   $result4 =mysqli_query($con,$sql4);
   $row_am4 =  mysqli_fetch_assoc($result4);
   $Mfg_befor =  $row_am4 ['Sp_Mfg'];
   $Quantity =  $row_am4 ['Sp_Quantity'];
 

if($_FILES["file"]["name"]==''){
  if($Mfg_befor == $Sp_Mfg){
    $sql2 = "UPDATE tbl_spare_part SET  
    Sp_number='$Sp_number', 
    Sp_Name='$Sp_Name', 
    Sp_Itemgroup='$Sp_Itemgroup',
    Sp_warehouse='$Sp_warehouse',
    Sp_Unit='$Sp_Unit',
    Sp_Mfg='$Sp_Mfg'
    WHERE Sp_ID='$Sp_ID' ";
    $result2 = mysqli_query($con, $sql2) or die ("Error in query: $sql2 " . mysqli_error());
    mysqli_close($con);
    }
  else{
      $sql5 ="SELECT * FROM tbl_invertory_sparepart
      WHERE  Iv_year='".$year."'
      AND    Iv_month='".$month."'
      AND    Iv_Mfg='".$Mfg_befor."'";
      $result5 = mysqli_query($con,$sql5);
      $row_am5 =  mysqli_fetch_assoc($result5);
      $Iv_ID = $row_am5['Iv_ID'];
      $Iv_Num_befor = $row_am5['Iv_Num_befor'];
      $Iv_Num_reduce =  $row_am5['Iv_Num_reduce'];
      $Iv_Num_Add = $row_am5['Iv_Num_Add'];
      $Iv_Num_reduce = $Iv_Num_reduce + $Quantity;
      $Iv_Num_after = $Iv_Num_befor + $Iv_Num_Add - $Iv_Num_reduce;
      $sql7 = "UPDATE tbl_invertory_sparepart SET  
      Iv_Num_after='$Iv_Num_after', 
      Iv_Num_reduce='$Iv_Num_reduce'
      WHERE Iv_ID='$Iv_ID' ";
      $result7 = mysqli_query($con, $sql7) or die ("Error in query: $sql7 " . mysqli_error());
    
      $sql6 ="SELECT * FROM tbl_invertory_sparepart
      WHERE  Iv_year='".$year."'
      AND    Iv_month='".$month."'
      AND    Iv_Mfg='".$Sp_Mfg."'";
      $result6 = mysqli_query($con,$sql6);
      $row_am6 =  mysqli_fetch_assoc($result6);
      $Iv_ID2 = $row_am6['Iv_ID'];
      $Iv_Num_befor2 = $row_am6['Iv_Num_befor'];
      $Iv_Num_reduce2 =  $row_am6['Iv_Num_reduce'];
      $Iv_Num_Add2 = $row_am6['Iv_Num_Add'];
      $Iv_Num_Add2 = $Iv_Num_Add2 + $Quantity;
      $Iv_Num_after2 = $Iv_Num_befor2 + $Iv_Num_Add2 - $Iv_Num_reduce2;
      $sql8 = "UPDATE tbl_invertory_sparepart SET  
      Iv_Num_after='$Iv_Num_after2', 
      Iv_Num_reduce='$Iv_Num_reduce2'
      WHERE Iv_ID='$Iv_ID2' ";
      $result8 = mysqli_query($con, $sql8) or die ("Error in query: $sql8 " . mysqli_error());
      
      $sql2 = "UPDATE tbl_spare_part SET  
      Sp_number='$Sp_number', 
      Sp_Name='$Sp_Name', 
      Sp_Itemgroup='$Sp_Itemgroup',
      Sp_warehouse='$Sp_warehouse',
      Sp_Unit='$Sp_Unit',
      Sp_Mfg='$Sp_Mfg'
      WHERE Sp_ID='$Sp_ID' ";
      $result2 = mysqli_query($con, $sql2) or die ("Error in query: $sql2 " . mysqli_error());
      mysqli_close($con);
    }
  }
  else{
      if($Mfg_befor == $Sp_Mfg){
      $dir = "uploads/";
      $fileImage = $dir . basename($_FILES["file"]["name"]);
      //echo $fileImage;
      if(move_uploaded_file($_FILES["file"]["tmp_name"],$fileImage)){}
      $sql2 = "UPDATE tbl_spare_part SET  
      Sp_number='$Sp_number', 
      Sp_Name='$Sp_Name', 
      Sp_Itemgroup='$Sp_Itemgroup',
      Sp_warehouse='$Sp_warehouse',
      Sp_Unit='$Sp_Unit',
      Sp_Mfg='$Sp_Mfg',
      Sp_Image='$fileImage'
      WHERE Sp_ID='$Sp_ID' "; 
      $result2 = mysqli_query($con, $sql2) or die ("Error in query: $sql2 " . mysqli_error());
      mysqli_close($con);
}
else{
  $sql5 ="SELECT * FROM tbl_invertory_sparepart
  WHERE  Iv_year='".$year."'
  AND    Iv_month='".$month."'
  AND    Iv_Mfg='".$Mfg_befor."'";
  $result5 = mysqli_query($con,$sql5);
  $row_am5 =  mysqli_fetch_assoc($result5);
  $Iv_ID = $row_am5['Iv_ID'];
  $Iv_Num_befor = $row_am5['Iv_Num_befor'];
  $Iv_Num_reduce =  $row_am5['Iv_Num_reduce'];
  $Iv_Num_Add = $row_am5['Iv_Num_Add'];
  $Iv_Num_reduce = $Iv_Num_reduce + $Quantity;
  $Iv_Num_after = $Iv_Num_befor + $Iv_Num_Add - $Iv_Num_reduce;
  $sql7 = "UPDATE tbl_invertory_sparepart SET  
  Iv_Num_after='$Iv_Num_after', 
  Iv_Num_reduce='$Iv_Num_reduce'
  WHERE Iv_ID='$Iv_ID' ";
  $result7 = mysqli_query($con, $sql7) or die ("Error in query: $sql7 " . mysqli_error());

  $sql6 ="SELECT * FROM tbl_invertory_sparepart
  WHERE  Iv_year='".$year."'
  AND    Iv_month='".$month."'
  AND    Iv_Mfg='".$Sp_Mfg."'";
  $result6 = mysqli_query($con,$sql6);
  $row_am6 =  mysqli_fetch_assoc($result6);
  $Iv_ID2 = $row_am6['Iv_ID'];
  $Iv_Num_befor2 = $row_am6['Iv_Num_befor'];
  $Iv_Num_reduce2 =  $row_am6['Iv_Num_reduce'];
  $Iv_Num_Add2 = $row_am6['Iv_Num_Add'];
  $Iv_Num_Add2 = $Iv_Num_Add2 + $Quantity;
  $Iv_Num_after2 = $Iv_Num_befor2 + $Iv_Num_Add2 - $Iv_Num_reduce2;
  
  $sql8 = "UPDATE tbl_invertory_sparepart SET  
  Iv_Num_after='$Iv_Num_after2', 
  Iv_Num_reduce='$Iv_Num_reduce2'
  WHERE Iv_ID='$Iv_ID2' ";
  $result8 = mysqli_query($con, $sql8) or die ("Error in query: $sql8 " . mysqli_error());
  

    $dir = "uploads/";
    $fileImage = $dir . basename($_FILES["file"]["name"]);
    //echo $fileImage;
    if(move_uploaded_file($_FILES["file"]["tmp_name"],$fileImage)){}
    $sql2 = "UPDATE tbl_spare_part SET  
    Sp_number='$Sp_number', 
    Sp_Name='$Sp_Name', 
    Sp_Itemgroup='$Sp_Itemgroup',
    Sp_warehouse='$Sp_warehouse',
    Sp_Unit='$Sp_Unit',
    Sp_Mfg='$Sp_Mfg',
    Sp_Image='$fileImage'
    WHERE Sp_ID='$Sp_ID' "; 
    $result2 = mysqli_query($con, $sql2) or die ("Error in query: $sql2 " . mysqli_error());
    mysqli_close($con);

  }
}

  //เพิ่มเข้าไปในฐานข้อมูล
  
  
if($result2){
        echo "<script type='text/javascript'>";
        echo "alert('Edit Succesfuly');";
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