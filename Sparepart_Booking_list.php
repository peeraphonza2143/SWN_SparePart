
<!DOCTYPE html>
<html lang="en">
    <?php include('h_admin.php');?>
    <body class="sb-nav-fixed">
    <?php include('condb.php');
    $Sp_ID = $_REQUEST["ID"];
     include('Add_session.php');
    if($member_Role == 'Super'){
        include('Private_Super.php');
        include('nav_Super.php');
    }
    elseif($member_Role == 'Admin'){
        include('Private_Admin.php');
         include('nav_Admin.php');
    }
    else{
      Header("Location: index.php");  
    }
  ?>
  <?php    $Reset_Alerts = 0;
     $sql2 = "UPDATE tbl_member SET  
     member_Alert_count='$Reset_Alerts'
     WHERE member_ID='$member_ID' ";
     $result2 = mysqli_query($con, $sql2) or die ("Error in query: $sql2 " . mysqli_error()); 
  
  
  $sql = "SELECT * FROM tbl_withdraw_sparepart WHERE withdraw_Status='Booking' ";
    $result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error());
    $row_am = mysqli_fetch_array($result);
     
    ?>

    <div id="layoutSidenav_content">
    <main>
                    <br>
                    <div class="container-fluid px-4">
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Booking list 
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Personal ID</th>
                                            <th>Name</th>
                                            <th>Item number</th>
                                            <th>Item name</th>
                                            <th>MFG</th>
                                            <th>Quantity</th>
                                            <th>WO</th>
                                            <th>Booking Date</th>
                                            <th>Using Date</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Personal ID</th>
                                            <th>Name</th>
                                            <th>Item number</th>
                                            <th>Item name</th>
                                            <th>MFG</th>
                                            <th>Quantity</th>
                                            <th>WO</th>
                                            <th>Booking Date</th>
                                            <th>Using Date</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php do { ?>
                                    <tr>
                                            <td><?php echo $row_am['withdraw_member_PIN']; ?></td>
                                            <td ><?php echo $row_am['withdraw_member_name']; ?></td>
                                            <td ><?php echo $row_am['withdraw_Item_number']; ?></td>
                                            <td ><?php echo $row_am['withdraw_Item_name']; ?></td>
                                            <td ><?php echo $row_am['withdraw_Mfg']; ?></td>
                                            <td ><?php echo $row_am['withdraw_Quantity']; ?></td>
                                            <td ><?php echo $row_am['withdraw_cause']; ?></td>
                                            <td ><?php echo $row_am['withdraw_date']; ?></td>
                                            <td ><?php echo $row_am['withdraw_date_use']; ?></td>
                                    </tr>
                                    <?php } while ($row_am =  mysqli_fetch_assoc($result)); ?>
                                    </tbody>
                                </table>
                                
                            </div>
                        </div>
                    </div>
                </main>
              <?php include('footer.php');?>
            </div>
        </div>
    <?php include('scripts.php');?>
    </body>
</html>
