<!DOCTYPE html>
<html lang="en">
<?php include('h.php');?>
<header>
    <img src="images/swan.png" alt="logo" class="logo">
    <div class="grwh">
        <div class=gr></div>
        <div class=wh></div>
        <div class=or>  </div>
    </div>
</header>
<body>
    <div class="bg-swan">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header">
                                        <h3 class="text-center font-weight-light my-4">Login</h3>
                                    </div>
                                    <div class="card-body">
                                         <form  name="formlogin" action="check_login.php" method="POST" id="login" class="form-horizontal">
                                            <div class="form-floating mb-3">
                                            <input type="text"  name="username" class="form-control" required placeholder="Username" />
                                                <label for="inputEmail">ID</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                            <input type="password" name="password" class="form-control" required placeholder="Password" />
                                                <label for="inputPassword">Password</label>
                                            </div>
                                            <div class="form-check mb-3">
                                                <input class="form-check-input" id="inputRememberPassword"  checked="checked" type="checkbox" value="" >
                                                <label class="form-check-label" for="inputRememberPassword">Remember
                                                    Password</label>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <a></a>
                                                <button type="submit" class="btn btn-primary" id="btn">
                                                <span class="glyphicon glyphicon-log-in"> </span> Login </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-swanGR mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div>Copyright &copy; Swan Industries Thailand co. ltd </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <?php include('scripts.php');?>
    </div>
</body>

</html>