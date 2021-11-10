<?php 

$checkData = "";
$msg_id_post = str_replace("%", "%25", $msg_id_post);
$checkData.= $msg_id_post;

$sMessage ="\r\n";
$sMessage.= $checkData;


    send_2Pcs_MFG4_alert_line($sMessage);

    #$count[0] = "rtzH5cDlIwPEIRQFiAh6PYi3fJ8nEJb8YXnIYys9mYt";
#$count[1] = "pFsGJkEMyoJCfoGBVMfTVlhHh6dkXXjOoJ8GDs10iH3";


function send_2Pcs_MFG4_alert_line($sMessage){
    $con= mysqli_connect("localhost","root","","swn_project1.1") or die("Error: " . mysqli_error($con));
mysqli_query($con, "SET NAMES 'utf8' ");
date_default_timezone_set('Asia/Bangkok');
    $sql4 = "SELECT * FROM tbl_member
    WHERE member_Key_Line !='0' AND  member_Role LIKE 'Admin' OR member_Role LIKE 'Super'  ORDER BY member_ID ASC";
     $result4 =mysqli_query($con,$sql4);
     $row_am4 =  mysqli_fetch_assoc($result4);
 $num = 0;
 do{
   $Key[$num]= $row_am4['member_Key_Line'];
 	$accToken = "$Key[$num]";  
	$chOne = curl_init(); 
	curl_setopt( $chOne, CURLOPT_URL, "https://notify-api.line.me/api/notify"); 
	curl_setopt( $chOne, CURLOPT_SSL_VERIFYHOST, 0); 
	curl_setopt( $chOne, CURLOPT_SSL_VERIFYPEER, 0); 
	curl_setopt( $chOne, CURLOPT_POST, 1); 
	curl_setopt( $chOne, CURLOPT_POSTFIELDS, "message=".$sMessage); 
	$headers = array( 'Content-type: application/x-www-form-urlencoded', 'Authorization: Bearer '.$accToken.'', );
	curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers); 
	curl_setopt( $chOne, CURLOPT_RETURNTRANSFER, 1); 
	$result = curl_exec( $chOne ); 

	if(curl_error($chOne)) 
	{ 
		echo 'error:' . curl_error($chOne); 
	} 
	else { 
		echo "meassage ok.";
	}  
	curl_close( $chOne ); 
    $num = $num + 1;
}while ($row_am4 =  mysqli_fetch_assoc($result4));
}


?>