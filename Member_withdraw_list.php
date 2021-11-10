<!DOCTYPE html>
<html lang="en">
    <?php include('h_member.php'); 
          include('condb.php');
          include('Add_session.php');
          include('Private_Member.php');
          ?>
    <body class="sb-nav-fixed">
    <script>    
$(document).ready(function() {
    $('#example1').DataTable( {
      "aaSorting" :[[0,'ASC']],
  });
});
  </script>
  <?php include('nav_Member.php');
    $query = "SELECT * FROM tbl_withdraw_sparepart WHERE withdraw_member_PIN = '$member_PIN' AND withdraw_Status = 'Withdraw' ORDER BY withdraw_ID ASC" or die("Error:" . mysqli_error());
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
                                Withdraw list 
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Item number</th>
                                            <th>Item name</th>
                                            <th>MFG</th>
                                            <th>Quantity</th>
                                            <th>WO</th>
                                            <th>Booking Date</th>
                                            <th>Using Date</th>
                                          <!--  <th>Cancel</th> -->
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Item number</th>
                                            <th>Item name</th>
                                            <th>MFG</th>
                                            <th>Quantity</th>
                                            <th>WO</th>
                                            <th>Booking Date</th>
                                            <th>Using Date</th> 
                                             <!--  <th>Cancel</th> -->
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php do { ?>
                                    <tr>
                                            <td><?php echo $row_am['withdraw_Item_number']; ?></td>
                                            <td ><?php echo $row_am['withdraw_Item_name']; ?></td>
                                            <td ><?php echo $row_am['withdraw_Mfg']; ?></td>
                                            <td ><?php echo $row_am['withdraw_Quantity']; ?></td>
                                            <td ><?php echo $row_am['withdraw_cause']; ?></td>
                                            <td ><?php echo $row_am['withdraw_date']; ?></td>
                                            <td ><?php echo $row_am['withdraw_date_use']; ?></td>
                                         <!--   <td><center><a href="Member_withdraw_cancel.php?act=edit&ID=<?php echo $row_am['withdraw_ID']; ?>" class="btn btn-danger btn-sm"> ยกเลิก </a></center> </td> -->
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
