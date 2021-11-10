<?php 
   $Time = date("d-m-Y");
   $e = explode("-", $Time);
   $month = "$e[1]";
   $year = "$e[2]";
$sql1="SELECT * FROM tbl_invertory_sparepart
WHERE   Iv_year='".$year."'
AND     Iv_month='".$month."'";

$result1 = mysqli_query($con,$sql1);


if(mysqli_num_rows($result1)>=1){
 
}
else{
    $count = 0;
    $state = 'First';

    $Mfg = "1";
    while($Mfg < 5 ){
        $Iv_Num_befor[$Mfg] = 0;
        $query = "SELECT * FROM tbl_spare_part WHERE Sp_Mfg = '$Mfg' ORDER BY Sp_ID ASC" or die("Error:" . mysqli_error());
        $result3 = mysqli_query($con, $query);
        $row_am = mysqli_fetch_assoc($result3);
        do{
        $Iv_Num_befor[$Mfg] = $Iv_Num_befor[$Mfg] +  $row_am['Sp_Quantity'];
        } while ($row_am =  mysqli_fetch_assoc($result3)); 
        $Mfg = $Mfg + 1 ; 
    }

while($count < 5 ){
    $count = $count+1;
    $save_data = $Iv_Num_befor[$count];
    $sql = "INSERT INTO tbl_invertory_sparepart(Iv_year,Iv_month,Iv_Mfg,Iv_Num_befor,Iv_Num_Add,Iv_Num_reduce,Iv_Num_After,Iv_Status)
    VALUES('$year','$month','$count','$save_data','0','0','$save_data','$state')";
    $result = mysqli_query($con,$sql);}  
}



?>