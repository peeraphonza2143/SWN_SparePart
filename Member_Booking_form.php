<!DOCTYPE html>
<html lang="en">
    <?php include('h_member.php'); 
          include('condb.php');
          include('Add_session.php');
          include('Private_Member.php');
   
          
          ?>
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
       $Sp_ID = $_REQUEST["ID"];
       $sql = "SELECT * FROM tbl_spare_part WHERE Sp_ID='$Sp_ID' ";
       $result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error());
       $row = mysqli_fetch_array($result);
       extract($row);
    ?>

    <body class="sb-nav-fixed">
  <?php include('nav_Member.php');?>
    <div id="layoutSidenav_content">
    <main>
                    <br>
                    <div class="container-fluid px-4">
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Sparepart Booking 
                            
                            </div>
                            <div class="card-body">
<form  name="sparepart" action="Member_Booking_form_db.php" method="POST" id="member" class="form-horizontal">
<input type="hidden" name="Sp_ID" value="<?php echo $Sp_ID; ?>">  
<input type="hidden" name="member_PIN" value="<?php echo $member_PIN; ?>"> 
<input type="hidden" name="member_nameF" value="<?php echo $member_nameF;?>">   
<input type="hidden" name="Sp_Quantity" value="<?php echo $Sp_Quantity;?>"> 
<input type="hidden" name="Sp_number" value="<?php echo $Sp_number;?>">     
<input type="hidden" name="Sp_Name" value="<?php echo $Sp_Name;?>">  
<input type="hidden" name="Sp_Mfg" value="<?php echo $Sp_Mfg;?>">  
 
                                <div class="container">
                                <label for="colFormLabelSm" class="col-sm-5 col-form-label "><h3>รายการจอง</h3></label>
                                <table class="table">
  <thead class="bg-warning">
    <tr>
      <th scope="col">No.</th>
      <th scope="col">Item number</th>
      <th scope="col">Item name</th>
      <th scope="col">MFG</th>
      <th scope="col">Quantity</th>
    </tr>
  </thead>
  <tbody>
  <tr>
      <th scope="row">1</th>
      <td><?=$Sp_number;?></td>
      <td><?=$Sp_Name;?></td>
      <td><?=$Sp_Mfg;?></td>
      <td> <input name="Sp_Quantity2" type="text" required class="form-control2" id="Sp_Quantity2"  value="<?=$Sp_Quantity;?>"  placeholder="Quantity"></td>
    </tr>
  </tbody>
</table>

  
<div class="form-group row">
    <label for="colFormLabelSm" class="col-sm-2 col-form-label "><h5>Booking Date</h5></label>
    <div class="col-sm-3 ">
    <div class="input-group-prepend">
          <div name="date_book" class="input-group-text" id="date_book" value="<?php echo date("m/d/Y");?>"><?php echo date("m/d/Y");?></div>
        </div>    
    </div> 
</div>
<br>
<div class="form-group row">
    <label for="colFormLabelSm" class="col-sm-2 col-form-label "><h5>WO</h5></label>
    <div class="col-sm-10">
    <input name="cause" type="text" required class="form-control" id="cause"   placeholder="cause">
    </div>
  </div>
  <br>

  <div class="form-group row">
    <label for="colFormLabelSm" class="col-sm-2 col-form-label "><h5>Using Date</h5></label>
    <div class="col-sm-3">
    <input type="date" id="date_use" name="date_use" >
    </div>
  </div>

  <br>

  <button type="submit" class="btn btn-primary">Submit</button>

</form>
</div>
                            </div>
                        </div>
                    </div>
                </main>            <?php include('footer.php');?>
            </div>
        </div>
    <?php include('scripts.php');?>
    </body>
</html>
