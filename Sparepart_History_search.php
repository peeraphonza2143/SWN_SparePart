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
  
<?php

    if(isset($_GET['page'])){
        $page = $_GET['page'];
    }else{
        $page = 1;  
    }
    $record_show = 20;
    $offset = ($page - 1) * $record_show;
    $sql_total = "SELECT * FROM tbl_withdraw_sparepart";
    $query_total = mysqli_query($con,$sql_total);
    $row_total = mysqli_num_rows($query_total);
    $page_total = ceil($row_total/$record_show);

    $State = 0;
      $val = $_POST["empname"];
      $Mfg_val = $_POST["MFG"];
      $STATUS = $_POST["Status"];

      if($val =='' AND $Mfg_val =='MFG' AND $STATUS =='STATUS'){
        $sql = "SELECT * FROM tbl_withdraw_sparepart ORDER BY withdraw_ID ASC LIMIT $offset,$record_show" or die("Error:" . mysqli_error());
       
      }
      else if($val =='' AND $Mfg_val =='MFG' AND $STATUS =='Approve'){
        $sql = "SELECT * FROM tbl_withdraw_sparepart WHERE withdraw_Status = 'Approve' ORDER BY withdraw_ID ASC LIMIT $offset,$record_show" or die("Error:" . mysqli_error());
      }
      else if($val =='' AND $Mfg_val =='MFG' AND $STATUS =='Refuse'){
        $sql = "SELECT * FROM tbl_withdraw_sparepart WHERE withdraw_Status = 'Refuse' ORDER BY withdraw_ID ASC LIMIT $offset,$record_show" or die("Error:" . mysqli_error());
      }
      else if($val =='' AND $Mfg_val !='MFG' AND $STATUS =='STATUS'){
        $sql = "SELECT * FROM tbl_withdraw_sparepart WHERE withdraw_Mfg = '$Mfg_val' ORDER BY withdraw_ID ASC LIMIT $offset,$record_show" or die("Error:" . mysqli_error());
      }
      else if($val =='' AND $Mfg_val !='MFG' AND $STATUS =='Approve'){
        $sql = "SELECT * FROM tbl_withdraw_sparepart WHERE withdraw_Mfg = '$Mfg_val' AND withdraw_Status = 'Approve' ORDER BY withdraw_ID ASC LIMIT $offset,$record_show" or die("Error:" . mysqli_error());
      }
      else if($val =='' AND $Mfg_val !='MFG' AND $STATUS =='Refuse'){
        $sql = "SELECT * FROM tbl_withdraw_sparepart WHERE withdraw_Mfg = '$Mfg_val' AND withdraw_Status = 'Refuse' ORDER BY withdraw_ID ASC LIMIT $offset,$record_show" or die("Error:" . mysqli_error());
      }
      else if($val !='' AND $Mfg_val =='MFG' AND $STATUS =='STATUS'){
        $sql = "SELECT * FROM tbl_withdraw_sparepart WHERE withdraw_member_PIN LIKE '%$val%' OR  withdraw_member_name LIKE '%$val%' OR  withdraw_Item_number LIKE '%$val%' OR  withdraw_Item_name LIKE '%$val%' 
        OR  withdraw_date LIKE '%$val%' OR  withdraw_date_use LIKE '%$val%' ORDER BY withdraw_ID ASC LIMIT $offset,$record_show" or die("Error:" . mysqli_error());
        }
      else if($val !='' AND $Mfg_val =='MFG' AND $STATUS =='Approve'){
        $sql = "SELECT * FROM tbl_withdraw_sparepart WHERE withdraw_Status = 'Approve' AND ( withdraw_member_PIN LIKE '%$val%' OR  withdraw_member_name LIKE '%$val%' OR  withdraw_Item_number LIKE '%$val%' OR  withdraw_Item_name LIKE '%$val%' 
        OR  withdraw_date LIKE '%$val%' OR  withdraw_date_use LIKE '%$val%' ) ORDER BY withdraw_ID ASC LIMIT $offset,$record_show" or die("Error:" . mysqli_error());
        }
    else if($val !='' AND $Mfg_val =='MFG' AND $STATUS =='Refuse'){
        $sql = "SELECT * FROM tbl_withdraw_sparepart WHERE withdraw_Status = 'Refuse' AND ( withdraw_member_PIN LIKE '%$val%' OR  withdraw_member_name LIKE '%$val%' OR  withdraw_Item_number LIKE '%$val%' OR  withdraw_Item_name LIKE '%$val%' 
        OR  withdraw_date LIKE '%$val%' OR  withdraw_date_use LIKE '%$val%' ) ORDER BY withdraw_ID ASC LIMIT $offset,$record_show" or die("Error:" . mysqli_error());
        }
            else if($val !='' AND $Mfg_val !='MFG' AND $STATUS =='STATUS'){
                $sql = "SELECT * FROM tbl_withdraw_sparepart WHERE withdraw_Mfg = '$Mfg_val' AND ( withdraw_member_PIN LIKE '%$val%' OR  withdraw_member_name LIKE '%$val%' OR  withdraw_Item_number LIKE '%$val%' OR  withdraw_Item_name LIKE '%$val%' 
                OR  withdraw_date LIKE '%$val%' OR  withdraw_date_use LIKE '%$val%' ) ORDER BY withdraw_ID ASC LIMIT $offset,$record_show" or die("Error:" . mysqli_error());
                }
                else if($val !='' AND $Mfg_val !='MFG' AND $STATUS =='Approve'){
                    $sql = "SELECT * FROM tbl_withdraw_sparepart WHERE withdraw_Mfg = '$Mfg_val'AND  withdraw_Status = 'Approve' AND ( withdraw_member_PIN LIKE '%$val%' OR  withdraw_member_name LIKE '%$val%' OR  withdraw_Item_number LIKE '%$val%' OR  withdraw_Item_name LIKE '%$val%' 
                    OR  withdraw_date LIKE '%$val%' OR  withdraw_date_use LIKE '%$val%' ) ORDER BY withdraw_ID ASC LIMIT $offset,$record_show" or die("Error:" . mysqli_error());
                    }
                    else if($val !='' AND $Mfg_val !='MFG' AND $STATUS =='Refuse'){
                        $sql = "SELECT * FROM tbl_withdraw_sparepart WHERE withdraw_Mfg = '$Mfg_val' AND  withdraw_Status = 'Refuse' AND ( withdraw_member_PIN LIKE '%$val%' OR  withdraw_member_name LIKE '%$val%' OR  withdraw_Item_number LIKE '%$val%' OR  withdraw_Item_name LIKE '%$val%' 
                        OR  withdraw_date LIKE '%$val%' OR  withdraw_date_use LIKE '%$val%') ORDER BY withdraw_ID ASC LIMIT $offset,$record_show" or die("Error:" . mysqli_error());
                        
                        }
      $result = mysqli_query($con,$sql);
      $row_am =  mysqli_fetch_assoc($result);?>
       <div id="layoutSidenav_content">
    <main><br>
            <div class="container-fluid px-4">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        Sparepart History 
                    </div>
                    <div class="card-body">
                        <form action="Sparepart_History_search.php" class="form-group" method="POST">
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
                                <option value="Approve">Approve</option>
                                <option value="Refuse">Refuse</option>
                            </select>
                            <input type="text" placeholder="Search" name="empname" class="form-control2">
                            <input type="submit" value="ค้นหา" class="btn btn-danger my">
                            <br><br>
                            <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Personal ID</th>
                                            <th>Name</th>
                                            <th>Item Number</th>
                                            <th>Item Name</th>
                                            <th>MFG</th>
                                            <th>Quantity</th>
                                            <th>WO</th>
                                            <th>Status</th>
                                            <th>Withdraw Date</th>
                                            <th>Using Date</th>
                                        </tr>
                                    </thead>
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
                                            <td>
                                            <div class="alert alert-<?= $row_am['withdraw_Status'] == 'Approve' ? 'success' : 'danger' ?>" role="alert">
                                            <?php echo $row_am['withdraw_Status']; ?>
                                            </div>
                                            </td>
                                            <td ><?php echo $row_am['withdraw_date']; ?></td>
                                            <td ><?php echo $row_am['withdraw_date_use'];?></td>
                                    </tr>
                                    <?php } while ($row_am =  mysqli_fetch_assoc($result)); ?>
                                    </tbody>
                                </table>
                               
 <nav aria-label="Page navigation example">
  <ul class="pagination justify-content-center">
    <li class="page-item <?=$page > 1 ? '' : 'disabled' ?>">
                                <a class="page-link" href="?page=<?=$page-1?>" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                                </a>
                                </li>
    <li class="page-item active"><a class="page-link" href="?page=<?=$page?>"><?=$page?></a></li>
    <li class="page-item <?=$page < $page_total ? '' : 'disabled'?>">
                                <a class="page-link" href="?page=<?=$page+1?>" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                                </a>
                                </li>

  </ul>
</nav>
                            </div>
                        </div>
                    </div>
                </main>
        <?php include('footer.php'); ?>
    </div>
    <?php include('scripts.php'); ?>
</body>

</html>
