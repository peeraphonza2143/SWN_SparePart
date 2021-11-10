
<!DOCTYPE html>
<html lang="en">
    <?php include('h_admin.php'); ?>
    
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
  <?php     $sql = "SELECT * FROM tbl_spare_part WHERE Sp_ID='$Sp_ID' ";
    $result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error());
    $row = mysqli_fetch_array($result);
        extract($row);
    ?>

    <div id="layoutSidenav_content">
                <main>
                    <br>
                    <div class="container-fluid px-4">
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                               Add Quantity Sparepart
                            </div>
                            <div class="card-body">
  <?php if($member_Role == "Super"){ ?>
<form  name="sparepart" action="Sparepart_edit_add_db.php?ID=<?php echo $Sp_ID;?>" method="POST" id="sparepart" class="form-horizontal"  enctype="multipart/form-data">
<?php } else {?>
  <form  name="sparepart" action="Sparepart_request_add_member.php?ID=<?php echo $Sp_ID;?>" method="POST" id="sparepart" class="form-horizontal"  enctype="multipart/form-data">
  <?php }?>
  <div class="form-group row">
    <label for="colFormLabelSm" class="col-sm-1 col-form-label ">Quantity</label>
    <div class="col-sm-10">
    <input name="Sp_Quantity" type="text" required class="form-control" id="Sp_Quantity" value="<?php echo $row['Sp_Quantity'];?>"   placeholder="Quantity">
    </div>
  </div>
  <br>
  <button type="submit" class="btn btn-primary">Submit</button>

</form>
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
