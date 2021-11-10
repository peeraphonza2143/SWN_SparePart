
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
    }
    else{
      Header("Location: index.php");  
    }
  ?>
  <?php     $sql = "SELECT * FROM tbl_member WHERE member_ID='$member_ID' ";
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
                               Line Notify
                            </div>
                            <div class="card-body">
<form  name="sparepart" action="Add_Line_notify_db.php?ID=<?php echo $member_ID;?>" method="POST" id="sparepart" class="form-horizontal"  enctype="multipart/form-data">
<div class="form-group row">
    <label for="colFormLabelSm" class="col-sm-1 col-form-label ">Access Token</label>
    <div class="col-sm-10">
    <input name="Token" type="text" required class="form-control " id="Token" value="<?php echo $row['member_Key_Line'];?>" placeholder="Access Token">
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


