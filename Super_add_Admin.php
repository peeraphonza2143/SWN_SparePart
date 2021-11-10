<!DOCTYPE html>
<html lang="en">
    <?php include('h_admin.php'); ?>
    
    <body class="sb-nav-fixed">
    <?php include('condb.php'); 
    include('Add_session.php');
    include('Private_Super.php');
  ?>
  <?php include('nav_Super.php');?>
    <div id="layoutSidenav_content">
                <main>
                    <br>
                    <div class="container-fluid px-4">
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Add New Admin 
                            </div>
                            <div class="card-body">
<form  name="member" action="Super_add_Admin_db.php" method="POST" id="member" class="form-horizontal">
<div class="form-group row">
    <label for="colFormLabelSm" class="col-sm-1 col-form-label ">Username</label>
    <div class="col-sm-10">
    <input name="member_username" type="text" required class="form-control " id="member_username"   placeholder="username" pattern="^[a-zA-Z0-9]+$" title="ภาษาอังกฤษหรือตัวเลขเท่านั้น" minlength="2">
    </div>
  </div>
<br>
  <div class="form-group row">
    <label for="colFormLabelSm" class="col-sm-1 col-form-label ">Password</label>
    <div class="col-sm-10">
    <input name="member_pass" type="password" required class="form-control" id="member_pass"  placeholder="password" pattern="^[a-zA-Z0-9]+$" minlength="2">
    </div>
  </div>
  <br>
  <div class="form-group row">
    <label for="colFormLabelSm" class="col-sm-1 col-form-label ">Confirm Password</label>
    <div class="col-sm-10">
    <input name="member_pass_config" type="password" required class="form-control" id="member_pass_config"  placeholder="Confirm Password" pattern="^[a-zA-Z0-9]+$" minlength="2">
    </div>
  </div>
  <br>
  <div class="form-group row">
    <label for="colFormLabelSm" class="col-sm-1 col-form-label ">PIN</label>
    <div class="col-sm-10">
    <input name="member_PIN" type="text" required class="form-control" id="member_PIN"  placeholder="PIN" >
    </div>
  </div>
  <br>
  <div class="form-group row">
    <label for="colFormLabelSm" class="col-sm-1 col-form-label ">Firstname</label>
    <div class="col-sm-10">
    <input name="member_nameF" type="text" required class="form-control" id="member_nameF"   placeholder="Firstname">
    </div>
  </div>
  <br>
  <div class="form-group row">
    <label for="colFormLabelSm" class="col-sm-1 col-form-label ">Lastname</label>
    <div class="col-sm-10">
    <input name="member_nameL" type="text" required class="form-control" id="member_nameL"   placeholder="Lastname">
    </div>
  </div>
  <br>
  <div class="form-group row">
    <label for="colFormLabelSm" class="col-sm-1 col-form-label ">Section</label>
    <div class="col-sm-10">
    <input name="member_department" type="text" required class="form-control" id="member_department"   placeholder="Section">
    </div>
  </div>
  <br>
  <div class="form-group row">
    <label for="colFormLabelSm" class="col-sm-1 col-form-label ">Tel.</label>
    <div class="col-sm-10">
    <input name="member_Tel" type="text" required class="form-control" id="member_Tel"   placeholder="Tel.">
    </div>
  </div>

 <br>
  <button type="submit" class="btn btn-success">Add</button>

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
