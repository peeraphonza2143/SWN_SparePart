
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
                               Edit Sparepart
                            </div>
                            <div class="card-body">
<form  name="sparepart" action="Sparepart_edit_db.php?ID=<?php echo $Sp_ID;?>" method="POST" id="sparepart" class="form-horizontal"  enctype="multipart/form-data">
<div class="form-group row">
    <label for="colFormLabelSm" class="col-sm-1 col-form-label ">Item number</label>
    <div class="col-sm-10">
    <input name="Sp_number" type="text" required class="form-control " id="Sp_number" >
    </div>
  </div>
<br>
  <div class="form-group row">
    <label for="colFormLabelSm" class="col-sm-1 col-form-label ">Item name</label>
    <div class="col-sm-10">
    <input name="Sp_Name" type="text" required class="form-control" id="Sp_Name"   >
    </div>
  </div>
  <br>

  <div class="form-group row">
    <label for="colFormLabelSm" class="col-sm-1 col-form-label ">Item grop</label>
    <div class="col-sm-10">
    <select name="Sp_Itemgroup" type="text" required class="form-control" id="Sp_Itemgroup"   >
    <option></option>
      <option>TOOL</option>
      <option>PART</option>
    </select>
    </div>
  </div>
  <br>

  <div class="form-group row">
    <label for="colFormLabelSm" class="col-sm-1 col-form-label ">Warehouse</label>
    <div class="col-sm-10">
    <select name="Sp_warehouse" type="text" required class="form-control" id="Sp_warehouse"    >
    <option></option>
      <option>WriteOff-MFG1</option>
      <option>WriteOff-MFG2</option>
      <option>WriteOff-MFG3</option>
      <option>WriteOff-MFG4</option>
      <option>WriteOff-MFG5</option>
    </select>
    </div>
  </div>
  <br>



  <div class="form-group row">
    <label for="colFormLabelSm" class="col-sm-1 col-form-label ">Unit</label>
    <div class="col-sm-10">
    <select name="Sp_Unit" type="text" required class="form-control" id="Sp_Unit" >
    <option></option>
      <option>Pcs.</option>
      <option>m.</option>
    </select>
    </div>
  </div>
  <br>

  <div class="form-group row">
    <label for="colFormLabelSm" class="col-sm-1 col-form-label ">Mfg</label>
    <div class="col-sm-10">
    <select  name="Sp_Mfg" type="text" required class="form-control" id="Sp_Mfg"   placeholder="Mfg">
      <option></option>
      <option>1</option>
      <option>2</option>
      <option>3</option>
      <option>4</option>
      <option>5</option>
    </select>
    </div>
  </div>
  <br>


  <div class="form-group row">
    <label for="colFormLabelSm" class="col-sm-1 col-form-label ">Image Add</label>
    <div class="col-sm-10">
    <input type="file" name="file"  >
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
