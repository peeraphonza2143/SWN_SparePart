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
    $Time = date("d-m-Y");
    $e = explode("-", $Time);
    $year = "$e[2]";

    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    } else {
        $page = 1;
    }
    $record_show = 20;
    $offset = ($page - 1) * $record_show;
    $sql_total = "SELECT * FROM tbl_invertory_sparepart";
    $query_total = mysqli_query($con, $sql_total);
    $row_total = mysqli_num_rows($query_total);
    $page_total = ceil($row_total / $record_show);
    $query = "SELECT * FROM tbl_invertory_sparepart WHERE Iv_year = '$year' ORDER BY Iv_ID ASC LIMIT $offset,$record_show" or die("Error:" . mysqli_error());
    $result = mysqli_query($con, $query);
    $row_am = mysqli_fetch_assoc($result);
    ?>

    <div id="layoutSidenav_content">
        <main><br>
            <div class="container-fluid px-4">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        Inventory 
                    </div>
                    <div class="card-body">
                        <form action="Sparepart_Invertory_list_search.php" class="form-group" method="POST">
                        <?php $years = range(2000, strftime("%Y", time())); ?>
                  
                            <label for=""><b>Search</b></label>
                            
                            <select  class="form-select2" name = "year">
                            <option><?php echo $year; ?></option>
                            <?php foreach($years as $year) : ?>
                            <option value="<?php echo $year; ?>"><?php echo $year; ?></option>
                            <?php endforeach; ?>
                            </select>
                
                            <input type="submit" value="ค้นหา" class="btn btn-danger my">
                            <br><br>
                            
                            <table class="table table-bordered">
                                
                                <thead>
                                    <tr>
                                    <th rowspan="2" >Invertory/Momth</th>
                                        <th colspan="3">MFG1</th>
                                        <th colspan="3">MFG2</th>
                                        <th colspan="3">MFG3</th>
                                        <th colspan="3">MFG4</th>
                                        <th colspan="3">MFG5</th>
                                    </tr>
                                    <tr>
                                      
                                    <th>IN</th>
                                        <th>OUT</th>
                                        <th>Balance</th>
                                        <th>IN</th>
                                        <th>OUT</th>
                                        <th>Balance</th>
                                        <th>IN</th>
                                        <th>OUT</th>
                                        <th>Balance</th>
                                        <th>IN</th>
                                        <th>OUT</th>
                                        <th>Balance</th>
                                        <th>IN</th>
                                        <th>OUT</th>
                                        <th>Balance</th>

                                    </tr>

                                </thead>
                               
                                <tbody>
                                <?php $count_month = 0;
                                      do { $count_month = $count_month + 1; 
                                        $sql="SELECT * FROM tbl_invertory_sparepart
                                        WHERE  Iv_year='".$year."' 
                                        AND  Iv_month='".$count_month."' ";
                                        $result = mysqli_query($con,$sql);
                      
                                        if(mysqli_num_rows($result)>=1){ $count_Mfg = 0;?>
                                         <tr> <td><?php echo $count_month;?>/<?php echo $year;?></td>
                                        <?php do { $count_Mfg = $count_Mfg + 1;?>
                                       
                                
                                            <?php 
                                                 $sql2="SELECT * FROM tbl_invertory_sparepart
                                                 WHERE  Iv_year='".$year."' 
                                                 AND  Iv_month='".$count_month."'
                                                 AND  Iv_Mfg='".$count_Mfg."' ";
                                                 $result2 = mysqli_query($con,$sql2);
                                                 $row_am2 =  mysqli_fetch_assoc($result2);
                                                ?>
                                     
                                            <td><?php echo $row_am2['Iv_Num_Add'];?></td>
                                            <td><?php echo $row_am2['Iv_Num_reduce'];?></td>
                                            <td><?php echo $row_am2['Iv_Num_after'];?></td>
                                    
                                       
                                    <?php } while($count_Mfg <= 4); ?>
                                    </tr>
                                        <?php }else{?>
                                        </tr>
                                            <td><?php echo $count_month;?>/<?php echo $year;?></td>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>-</td>
                                          
                                          
                                            </tr>
                                     <?php   }
                                    } while ($count_month <= 11); 
                                    ?>
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