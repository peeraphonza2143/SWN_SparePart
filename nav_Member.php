
<?php 
$sql10 = "SELECT * FROM tbl_member
WHERE member_ID LIKE '$member_ID' ORDER BY member_ID ASC";
 $result10 =mysqli_query($con,$sql10);
 $row_am10 =  mysqli_fetch_assoc($result10);
?>
<nav class="sb-topnav navbar navbar-expand navbar-dark bg-colortopUser">
        <!-- Navbar Brand-->
        <a href="member_Page.php"><img src="images/logo.png" alt="logo" class="logo"></a>
        <div class="grwh"></div>
        <button class="btn btn-link btn-sm order-1 order-lg-0  me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        <!-- Navbar KMITL-->
        <ul class="navbar-nav ms-auto me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i>&nbsp;<?php echo $member_nameF; ?>&nbsp;<?php echo $member_nameL; ?></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="Login_Setting.php">Setting</a></li>
                    <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <div class="bg-swan">
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-colorsideUser" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">MENU</div>

                            <div class="card-navUser">
                            <a class="nav-link button" href="Member_sparepart_list.php">
                                <div class="sb-nav-link-icon">
                                    </i>
                                </div>
                                <i class="fas fa-angle-right"></i> &nbsp; Sparepart list 
                            </a>
                            </div>
                            
                            <div class="card-navUser">
                            <a class="nav-link button" href="Member_Booking_list.php">
                                <div class="sb-nav-link-icon">
                                    </i>
                                </div>
                                <i class="fas fa-angle-right"></i> &nbsp; Booking list
                            </a>
                            </div>

                            <div class="card-navUser">
                            <a class="nav-link button" href="Member_withdraw_list.php">
                                <div class="sb-nav-link-icon">
                                    </i>
                                </div>
                                <i class="fas fa-angle-right"></i> &nbsp; Withdraw list
                            </a>
                            </div>
                            
                            
                            
                            <div class="card-navUser">
                            <a class="nav-link button" href="Member_sparepart_history.php">
                                <div class="sb-nav-link-icon"></div>
                                <i class="fas fa-angle-right"></i> &nbsp; Sparepart History      
                            <?php if($row_am10['member_Alert_count'] > 0){?>
                                <div class="alert-request2">
                                <p class="alert-number"><?php echo $row_am10['member_Alert_count']; ?></p>
                                </div> 
                                <?php }?>
                            </a>
                            </div>

                            <div class="sb-sidenav-menu-heading">Alert</div>
                            
                            
                            <div class="card-navUser">
                            <a class="nav-link button" href="Notify_page.php">
                                <div class="sb-nav-link-icon">
                                    </i>
                                </div>
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