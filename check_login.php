<?php 
        if(isset($_POST['username'])){
                  include("condb.php");
                 include('Inventory_save_data.php');
                 include('Booking_late.php');
                  $Username = $_POST['username'];
                  $password = $_POST['password'];

                  $sql="SELECT * FROM tbl_member
                  WHERE  member_username='".$Username."' 
                  AND  member_pass='".$password."' ";
                  $result = mysqli_query($con,$sql);

                  if(mysqli_num_rows($result)==1){
                      $row = mysqli_fetch_array($result);
                      $_SESSION["member_ID"] = $row["member_ID"];
                      $_SESSION["member_username"] = $row["member_username"];
                      $_SESSION["member_nameF"] = $row["member_nameF"];
                      $_SESSION["member_nameL"] = $row["member_nameL"];
                      $_SESSION["member_Role"] = $row["member_Role"];
                      $_SESSION["member_PIN"] = $row["member_PIN"];
                    
                      
                      if($_SESSION["member_ID"]!=''){ 
                          # Header("Location: admin_Page.php");
                        if($_SESSION["member_Role"] == 'Super'){
                            Header("Location: Super_page.php");        
                        }
                        elseif($_SESSION["member_Role"] == 'Admin'){
                            Header("Location: Admin_page.php");        
                        }
                        elseif($_SESSION["member_Role"] == 'Member'){
                            Header("Location: Member_page.php");        
                        }
                    }

                }


                
                else{
                    echo "<script>";
                        echo "alert(\" user หรือ  password ไม่ถูกต้อง\");"; 
                        echo "window.history.back()";
                    echo "</script>";
 
                  }}else{

             Header("Location: swn_login_form.php"); //user & password incorrect back to login again
 
        }
?>