
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
    else{
      Header("Location: index.php");  
    }
  ?>
  <?php    
  
  $sql = "SELECT * FROM request_add_sparepart ";
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
                                Request Add Sparepart 
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr><th>Member PIN</th>
                                            <th>Member Name</th>
                                            <th>Item number</th>
                                            <th>Item name</th>
                                            <th>ItemGrop</th>
                                            <th>Store</th>
                                            <th>Quantity</th>
                                            <th>Unit</th>
                                            <<th>MFG</th>
                                            <th>IMAGE</th>
                                   
                                            <th>Confirm</th>
                                            <th>Cancel</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr><th>Item number</th>
                                            <th>Item name</th>
                                            <th>Item number</th>
                                            <th>Item name</th>
                                            <th>ItemGrop</th>
                                            <th>Store</th>
                                            <th>Quantity</th>
                                            <th>Unit</th>
                                            <<th>MFG</th>
                                            <th>IMAGE</th>
                                            <th>Confirm</th>
                                            <th>Cancel</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php  if(mysqli_num_rows($result)>=1){ ?>
                                    <?php do { ?>
                                    <tr>    
                                             <td><?php echo $row_am['RSp_member_PIN']; ?></td>
                                            <td ><?php echo $row_am['RSp_member_name']; ?></td>
                                            <td><?php echo $row_am['RSp_number']; ?></td>
                                            <td ><?php echo $row_am['RSp_Name']; ?></td>
                                            <td ><?php echo $row_am['RSp_Itemgroup']; ?></td>
                                            <td ><?php echo $row_am['RSp_warehouse']; ?></td>
                                            <td ><?php echo $row_am['RSp_Quantity']; ?></td>
                                            <td ><?php echo $row_am['RSp_Unit']; ?></td>
                                            <td ><?php echo $row_am['RSp_Mfg']; ?></td>
                                            <td><a href="Sparepart_image_full.php?ID=<?php echo $row_am['RSp_Image']; ?>"><img src='<?php echo $row_am['RSp_Image']; ?>' width='100'></a></td>
                                     
                                            
                                            <td><center><a href="Super_accept_sparepart_add.php?act=edit&ID=<?php echo $row_am['RSp_ID']; ?>" class="btn btn-warning btn-sm"> ยืนยัน </a></center> </td>
                                            <td><center><a href="Super_accept_sparepard_add_del.php?act=edit&ID=<?php echo $row_am['RSp_ID']; ?>" class="btn btn-danger btn-sm"> ยกเลิก </a></center> </td>
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
