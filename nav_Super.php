
<?php 
$sql10 = "SELECT * FROM tbl_member
WHERE member_ID LIKE '$member_ID' ORDER BY member_ID ASC";
 $result10 =mysqli_query($con,$sql10);
 $row_am10 =  mysqli_fetch_assoc($result10);
?>
  <nav class="sb-topnav navbar navbar-expand navbar-dark bg-colortoSup">
        <!-- Navbar Brand-->
        <a href="Super_page.php"><img src="images/logosup.png" alt="logo" class="logo"></a>
        <div class="grwh"></div>
        <button class="btn btn-link btn-sm order-1 order-lg-0  me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        <!-- Navbar KMITL-->
        <ul class="navbar-nav ms-auto me-3 me-lg-4">
            <li class="nav-item dropdown">
       
<!-- Nav Item - Alerts 
        <li class="nav-item dropdown no-arrow mx-1">
            <a href="#" class="notification">
                <span class="badge">10</span>
                <i class="fas fa-bell fa-fw"></i>
            </a>
        </li>-->
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i>&nbsp;<?php echo $member_nameF; ?>&nbsp;<?php echo $member_nameL; ?></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="Login_Setting.php">Setting</a></li>
                    <li><a class="dropdown-item" href="index.php">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <div class="bg-swan ">
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-colorsideSup" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav font">
                        <div class="sb-sidenav-menu-heading">Super admin </div>

                            <div class="card-navAdmin">
                            <a class="nav-link" href="Super_super_table.php">
                            <div class="sb-nav-link-icon"></div>
                            <i class="fas fa-angle-right"></i> &nbsp; Super admin  List
                            </a>
                            </div>
                            <div class="card-navAdmin">
                            <a class="nav-link" href="Super_add_Super.php">
                            <div class="sb-nav-link-icon"></div>
                            <i class="fas fa-angle-right"></i> &nbsp; Add New Super admin
                            </a>
                            </div>
                            <div class="sb-sidenav-menu-heading">Admin</div>

                            <div class="card-navAdmin">
                                <a class="nav-link " href="Super_admin_table.php" >
                            <div class="sb-nav-link-icon "></div>
                                <i class="fas fa-angle-right"></i> &nbsp; Admin List
                             </a>
                            </div>

                            <div class="card-navAdmin">
                            <a class="nav-link" href="Super_add_Admin.php">
                                <div class="sb-nav-link-icon"></div>
                                <i class="fas fa-angle-right"></i> &nbsp; Add New Admin
                            </a>
                            </div>

                            <div class="sb-sidenav-menu-heading">Members</div>

                            <div class="card-navAdmin">
                            <a class="nav-link" href="Super_member_table.php">
                                <div class="sb-nav-link-icon"></div>
                                <i class="fas fa-angle-right"></i> &nbsp; Members List
                            </a>
                            </div>

                            <div class="card-navAdmin">
                            <a class="nav-link" href="Super_add_Member.php">
                                <div class="sb-nav-link-icon"></div>
                                <i class="fas fa-angle-right"></i> &nbsp; Add New Members
                            </a>
                            </div>

                            <div class="sb-sidenav-menu-heading">Spare Part</div>

                            <div class="card-navAdmin">
                            <a class="nav-link" href="Sparepart_Invertory_list.php">
                                <div class="sb-nav-link-icon"></div>
                                <i class="fas fa-angle-right"></i> &nbsp; Invertory Spare Parts
                            </a>
                            </div>

                            <div class="card-navAdmin">
                            <a class="nav-link" href="Sparepart_table.php">
                                <div class="sb-nav-link-icon"></div>
                                <i class="fas fa-angle-right"></i> &nbsp; All Spare Parts
                            </a>
                            </div>

                            <div class="card-navAdmin">
                            <a class="nav-link" href="Add_sparepart.php">
                                <div class="sb-nav-link-icon"></div>
                                <i class="fas fa-angle-right"></i> &nbsp; Add New Spare Parts
                            </a>
                            </div>
                            
                            <div class="card-navAdmin">
                            <a class="nav-link" href="Super_request_add_sparepart.php">
                                <div class="sb-nav-link-icon"></div>
                                <i class="fas fa-angle-right"></i> &nbsp; Sparepart add Request
                            </a>
                            </div>

                            <div class="card-navAdmin">
                            <a class="nav-link" href="Sparepart_Booking_list.php">
                                <div class="sb-nav-link-icon"></div>
                                <i class="fas fa-angle-right"></i> &nbsp; Spare Parts booking
                                <?php if($row_am10['member_Alert_count'] > 0){?>
                                <div class="alert-request">
                                <p class="alert-number"><?php echo $row_am10['member_Alert_count']; ?></p>
                                </div> <?php }?>
                            </a>
                            </div>


                            <div class="card-navAdmin">
                            <a class="nav-link" href="Sparepart_request_list.php">
                                <div class="sb-nav-link-icon"></div>
                                <i class="fas fa-angle-right"></i> &nbsp; Spare Parts Request
                                <?php if($row_am10['member_Alert_count2'] > 0){?>
                                <div class="alert-request">
                                <p class="alert-number"><?php echo $row_am10['member_Alert_count2']; ?></p>
                                </div> <?php }?>
                            </a>
                            </div>
                      

                            <div class="card-navAdmin">
                            <a class="nav-link" href="Sparepart_History.php">
                                <div class="sb-nav-link-icon"></div>
                                <i class="fas fa-angle-right"></i> &nbsp; Spare Parts History
                            </a>
                            </div>

                            <div class="sb-sidenav-menu-heading">Alert</div>
                            
                            <div class="card-navAdmin">
                            <a class="nav-link" href="Notify_page.php">
                                <div class="sb-nav-link-icon"></div>
                                <i class="fas fa-angle-right"></i> &nbsp; Line Notify
                            </a>
                            </div>
                        </div>
                    </div>

                    <div class="sb-sidenav-footer">
                        <div class="small">By : IE.Tech</div>
                        KMITL
                    </div>
                </nav>
            </div>


            