<!DOCTYPE html>
<html lang="en">
<?php include('h_admin.php'); ?>

<body class="sb-nav-fixed">
<?php include('condb.php');
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
      }?>
  

    <script>
        $(document).ready(function() {
            $('#example1').DataTable({
                "aaSorting": [
                    [0, 'ASC']
                ],
            });
        });
    </script>
    <?php


    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    } else {
        $page = 1;
    }
    $record_show = 20;
    $offset = ($page - 1) * $record_show;
    $sql_total = "SELECT * FROM tbl_spare_part";
    $query_total = mysqli_query($con, $sql_total);
    $row_total = mysqli_num_rows($query_total);
    $page_total = ceil($row_total / $record_show);
    $query = "SELECT * FROM tbl_spare_part ORDER BY Sp_ID ASC LIMIT $offset,$record_show" or die("Error:" . mysqli_error());
    $result = mysqli_query($con, $query);
    $row_am = mysqli_fetch_assoc($result);
    ?>

    <div id="layoutSidenav_content">
        <main><br>
            <div class="container-fluid px-4">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        Sparepart list
                    </div>
                    <div class="card-body">
                        <form action="Sparepart_table_search.php" class="form-group" method="POST">
                            <label for=""><b>Search</b></label>
                            <select class="form-select2" aria-label="MFG" name="MFG">
                                <option selected>MFG</option>
                                <option value="1">MFG1</option>
                                <option value="2">MFG2</option>
                                <option value="3">MFG3</option>
                                <option value="4">MFG4</option>
                                <option value="5">MFG5</option>
                            </select>
                            <select class="form-select2" aria-label="STATUS" name="Status">
                                <option selected>STATUS</option>
                                <option value="Available">Available</option>
                                <option value="Suptrack">Suptrack</option>
                            </select>
                            <input type="text" placeholder="Search" name="empname" class="form-control2">
                            <input type="submit" value="ค้นหา" class="btn btn-danger my">

                            <a href="Sparepart_Export.php?act=excel" class="btn btn-outline-success"> Export->Excel </a>
                           
                            <br><br>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Item number</th>
                                        <th>Item name</th>
                                        <th>ItemGrop</th>
                                        <th>Store</th>
                                        <th>Quantity</th>
                                        <th>Unit</th>
                                        <th>MFG</th>
                                        <th>IMAGE</th>
                                        <th>Status</th>
                                        <th>Edit</th>
                                        <th>Add</th>
                                        <?= $member_Role == "Super" ? ' <th>Delete</th>' : '' ?>
                                    
                                    </tr>
                                </thead>
                                <tbody>
                                <?php  if(mysqli_num_rows($result)>=1){ ?>
                                    <?php do { ?>
                                        <tr>
                                            <td><?php echo $row_am['Sp_number']; ?></td>
                                            <td><?php echo $row_am['Sp_Name']; ?></td>
                                            <td><?php echo $row_am['Sp_Itemgroup']; ?></td>
                                            <td><?php echo $row_am['Sp_warehouse']; ?></td>
                                            <td><?php echo $row_am['Sp_Quantity']; ?></td>
                                            <td><?php echo $row_am['Sp_Unit']; ?></td>
                                            <td><?php echo $row_am['Sp_Mfg']; ?></td>
                                            <td><a href="Sparepart_image_full.php?ID=<?php echo $row_am['Sp_ID']; ?>"><img src='<?php echo $row_am['Sp_Image']; ?>' width='100'></a></td>
                                            <td>
                                            <div class="alert alert-<?= $row_am['Sp_Quantity'] <= 0 ? 'danger' : 'success' ?>" role="alert">
                                            <?= $row_am['Sp_Quantity'] <= 0 ? 'Nonavailable' : 'Available' ?>
                                            </div>
                                            </td>
                                            <td><a href="Sparepart_edit.php?act=edit&ID=<?php echo $row_am['Sp_ID']; ?>" class="btn btn-warning btn-sm"> แก้ไข </a> </td>
                                            <?php if($member_Role == "Super"){?>
                                            <td><a href="Sparepart_edit_add.php?act=edit&ID=<?php echo $row_am['Sp_ID']; ?>" class="btn btn-warning btn-sm"> เพิ่ม </a> </td>
                                            <td><a href="Sparepart_del.php?ID=<?php echo $row_am['Sp_ID']; ?>" class='btn btn-danger btn-sm' onclick="return confirm('ยันยันการลบ')">ลบ</a> </td>
                                            <?php }else{ ?>
                                            <td><a href="Sparepart_edit_add.php?act=edit&ID=<?php echo $row_am['Sp_ID']; ?>" class="btn btn-warning btn-sm"> เพิ่ม </a> </td>
                                            <?php }?>
                                        </tr>
                                    <?php } while ($row_am =  mysqli_fetch_assoc($result)); ?>
                                <?php }else{?>
                                    <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                    </tr>
                                    <?php }?>
                                </tbody>

                            </table>

                            <nav aria-label="Page navigation example">
                                <ul class="pagination justify-content-center">
                                    <li class="page-item <?= $page > 1 ? '' : 'disabled' ?>">
                                        <a class="page-link" href="?page=<?= $page - 1 ?>" aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                        </a>
                                    </li>
                                    <li class="page-item active"><a class="page-link" href="?page=<?= $page ?>"><?= $page ?></a></li>
                                    <li class="page-item <?= $page < $page_total ? '' : 'disabled' ?>">
                                        <a class="page-link" href="?page=<?= $page + 1 ?>" aria-label="Next">
                                            <span aria-hidden="true">&raquo;</span>
                                        </a>
                                    </li>

                                </ul>
                            </nav>
                        </form>
                    </div>
                </div>
            </div>
        </main>
        <?php include('footer.php'); ?>
    </div>
    <?php include('scripts.php'); ?>
</body>

</html>