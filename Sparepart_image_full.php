
<!DOCTYPE html>
<html lang="en">
    <body class="sb-nav-fixed">
    <?php include('condb.php');
    $Sp_ID = $_REQUEST["ID"];
    include('Add_session.php');
    if($member_Role == 'Super'){
         include('h_admin.php');
        include('Private_Super.php');
        include('nav_Super.php');
    }
    elseif($member_Role == 'Admin'){
         include('h_admin.php');
        include('Private_Admin.php');
         include('nav_Admin.php');
    }
    elseif($member_Role == 'Member'){
         include('h_member.php');
        include('Private_Member.php');
         include('nav_Member.php');
    }?>
 
                   

    <script>    
$(document).ready(function() {
    $('#example1').DataTable( {
      "aaSorting" :[[0,'ASC']],
  });
});
  </script>
  
  <?php
  $query = "SELECT * FROM tbl_spare_part WHERE Sp_ID ='$Sp_ID' ORDER BY Sp_ID ASC" or die("Error:" . mysqli_error());
  $result = mysqli_query($con, $query);
  $row_am = mysqli_fetch_assoc($result);
 
?>

    <div id="layoutSidenav_content">
                <main>
                    <br>
                 
                    <div class="container-fluid px-4">
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Full Image 
                            </div>
                            <div class="card-body">
                 <center><img src='<?php echo $row_am['Sp_Image']; ?>'></center>
                 
                </main>
              <?php include('footer.php');?>
            </div>
        </div>
    <?php include('scripts.php');?>
    </body>
</html>
