<!DOCTYPE html>
<html lang="en">
    <?php include('h_admin.php'); ?>
    <body class="sb-nav-fixed">
    <?php include('condb.php');
        include('Add_session.php');
        include('Private_Super.php');
     
  ?>
  <?php include('nav_Super.php');?>
    
    <script>    
$(document).ready(function() {
    $('#example1').DataTable( {
      "aaSorting" :[[0,'ASC']],
  });
});
  </script>
  <?php
  $query = "SELECT * FROM tbl_member WHERE member_Role LIKE 'Admin' ORDER BY member_ID ASC" or die("Error:" . mysqli_error());
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
                                Super admin list 
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Username</th>
                                            <th>Firstname</th>
                                            <th>Lastname</th>
                                            <th>PIN</th>
                                            <th>Section</th>
                                            <th>Tel.</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Username</th>
                                            <th>Firstname</th>
                                            <th>Lastname</th>
                                            <th>PIN</th>
                                            <th>Section</th>
                                            <th>Tel.</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php do { ?>
                                    <tr>
                                            <td><?php echo $row_am['member_username']; ?></td>
                                            <td ><?php echo $row_am['member_nameF']; ?></td>
                                            <td ><?php echo $row_am['member_nameL']; ?></td>
                                            <td ><?php echo $row_am['member_PIN']; ?></td>
                                            <td ><?php echo $row_am['member_department']; ?></td>
                                            <td ><?php echo $row_am['member_Tel']; ?></td>
                                            <td><center><a href="Super_edit_all.php?act=edit&ID=<?php echo $row_am['member_ID']; ?>" class="btn btn-warning btn-sm"> แก้ไข </a></center> </td>
                                            <td><center><a href="Super_del_member_db.php?ID=<?php echo $row_am['member_ID']; ?>" class='btn btn-danger btn-sm'  onclick="return confirm('ยันยันการลบ')">ลบ</a></center> </td>
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
