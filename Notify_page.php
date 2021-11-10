<!DOCTYPE html>
<html lang="en">

<body class="sb-nav-fixed">
  <?php include('condb.php');
  include('Add_session.php');
  if ($member_Role == 'Super') {
    include('h_admin.php');
    include('Private_Super.php');
    include('nav_Super.php');
  } elseif ($member_Role == 'Admin') {
    include('h_admin.php');
    include('Private_Admin.php');
    include('nav_Admin.php');
  } elseif ($member_Role == 'Member') {
    include('h_member.php');
    include('Private_Member.php');
    include('nav_Member.php');
  } else {
    Header("Location: index.php");
  }
  ?>
  <?php $sql = "SELECT * FROM tbl_member WHERE member_ID='$member_ID' ";
  $result = mysqli_query($con, $sql) or die("Error in query: $sql " . mysqli_error());
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
            <div class="fontNotify1">
              <p>
                <br>
              <div class="fontY">Add LINE Notify</div>
              <br>
              <p>ขั้นแรกทำการ Add LINE Notify เข้ามาโดยการเพิ่มเพื่อนในโทรศัพท์พิมพ์ line notify แล้วทำการกดเพิ่มเพื่อน</p><br>
              <div><img src="images/notify images/1.png" class="imagesCenter"><img src="images/notify images/2.png" class="imagesCenter"></div>
              <br>
              <p>ต่อไปสร้างกลุ่มไลน์แล้วแอด LINE Notify เข้าในกลุ่ม ตั้งชื่อกลุ่มให้เรียบร้อยแล้วกด สร้าง</p><br>
              <div><img src="images/notify images/3.png" class="imagesCenter"><img src="images/notify images/4.png" class="imagesCenter">
                <br><br><img src="images/notify images/6.png" class="imagesCenter"><img src="images/notify images/7.png" class="imagesCenter">
              </div>
              <br>
              <p>ต่อไปเข้าเข้าเว็บ <a href="https://notify-bot.line.me/th/">LINE Notify</a> ทำการเข้าสู่ระบบ LINE</p><br>
              <img src="images/notify images/8.png" class="Center"><br><img src="images/notify images/9.png" class="Center">
              <br>
              <p>เมื่อเข้าสู่ระบบเสร็จเรียบร้อยแล้วให้กดปุ่มที่มุมขวาบนเลือก หน้าของฉัน</p><br><img src="images/notify images/10.png" class="Center">
              <br>
              <p>เข้าหน้าของฉันแล้วเลื่อนลงมาจะเจอปุ่ม ออก Token กดเข้าไปตั้งชื่อ Token และเลื่อกกลุ่มที่ได้สร้างไว้ในตอนต้น</p>
              <img src="images/notify images/11.png" class="Center"><br><img src="images/notify images/12.png" class="Center">
              <br>
              <p>ทำการคัดลอก Token ที่ได้ไปใส่ในหน้า LINE Notify ของ web application Spare Part Dead Stock แล้วทำการกด Submit</p>
              <br><img src="images/notify images/13.png" class="Center"><br><img src="images/notify images/14.png" class="Center">
              <br><br><br><br>
              <div class="fontY">VDO การสอน การติดตั้ง LINE Notify</div>
              <br>
              <iframe width="1280" height="720" src="https://www.youtube.com/embed/tgbNymZ7vqY" class="VDO">
            </iframe>
            </div>
            <a class="button78" href="Add_Line_notify.php"> </a>

          </div>
        </div>
      </div>
    </main>
    <?php include('footer.php'); ?>
  </div>
  </div>
  <?php include('scripts.php'); ?>
</body>

</html>