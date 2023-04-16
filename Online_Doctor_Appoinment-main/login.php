<?php
require_once('connection.php');
?>
<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

        <link rel="stylesheet" href="css/style.css">

        <title>Online Doctor Appoinment</title>
    </head>
    <body>
        <nav class="navbar navbar-expand-md bg-light border-bottom">
            <div class="container">
                    <a href="#" class="navbar-brand font-weight-bold" style="font-size: 1.6rem;color: #15558d;">DocOnAppoint</a>
                    <button type="button" class="navbar-toggler navbar-light" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse ml-5" id="navbarCollapse">
                        <ul class="navbar-nav">
                            <li class="nav-item mx-2">
                                <a class="nav-link" href="index.php #hom">HOME</a>
                            </li>
                            <li class="nav-item mx-2">
                                <a class="nav-link" href="index.php #about">About Us</a>
                            </li>
                            <li class="nav-item mx-2">
                                <a class="nav-link" href="index.php #contact">Contact Us</a>
                            </li>
                            <!-- <li class="nav-item mx-2">
                                <a class="nav-link" href="index.php #other">Others</a>
                            </li> -->
                        </ul>
                        <a href="login.php" class="btn ml-auto logbtn">
                            LOGIN
                        </a>
                    </div>
            </div>
        </nav>
<!-- *********************************end Navbar******************************* -->
        <div id="login" class="py-5 bgimg">
            <div class="container">
                <div id="login-row" class="row justify-content-center align-items-center">
                
                    <div id="login-column" class="col-md-6 ml-auto p-4 bg-light shadow-lg rounded">
                        <div id="login-box" class="col-md-12">
                            <form id="login-form" class="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" autocomplete="off">
                                <h2 class="text-center" style="line-height: 1.5;">Login</h2>
                                <div class="form-group" style="display: flex;justify-content: center;">
                                    <span id="span-notice" style="color: red;"></span>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="userid" id="userid" class="form-control" placeholder="Email" required="">
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" id="password" class="form-control" placeholder="Password" required="">
                                </div>
                                <div class="form-group">
                                    <input type="submit" name="login" class="btn btn-md form-control signbtn" value="Login">
                                </div>
                                <div>
                                    <span class="or-line"></span>
                                </div>
                                <div id="register-link" class="text-center">
                                    Don’t have an account? 
                                    <a href="registration.php" type="submit" name="register" class="regis" value="Sign Up"><u>Register</u></a>
                                    here
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<!-- *************************************Footer*********************************** -->
        <footer class="footer pt-2">
        <main class="container-fluid text-light">
            <div class="row px-3 py-5">
                <div class="col-md-5 col-12">
                    <div class="col-sm">
                        <a href="#" class="navbar-brand font-weight-bold text-light" style="font-size: 30px">DocOnAppoint</a>
                    </div>

                    <div>
                        <ul style="display: inline-flex;list-style: none;">
                            <li>
                                <a class="nav-link text-light fa-lg" href="">
                                    <i class="fab fa-facebook-square"></i>
                                </a>
                            </li>
                            <li>
                                <a class="nav-link text-light fa-lg" href="">
                                    <i class="fab fa-instagram"></i>
                                </a>
                            </li>
                            <li>
                                <a class="nav-link text-light fa-lg" href="">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>
                            </li>
                            <li>
                                <a class="nav-link text-light fa-lg" href="">
                                    <i class="fas fa-at"></i>
                                </a>
                            </li>
                        </ul>
                    </div>

                </div>

                <div class="col-md-5 col-12">
                    <ul style="list-style: none;">
                        <li>
                            <a class="nav-link text-light" href="#search">
                                <i class="bi bi-chevron-double-right"> Search</i>
                            </a>
                        </li>
                        <li>
                            <a class="nav-link text-light" href="#about">
                                <i class="bi bi-chevron-double-right"> About</i>
                            </a>
                        </li>
                        <li>
                            <a class="nav-link text-light" href="#contact">
                                <i class="bi bi-chevron-double-right"> Contact</i>
                            </a>
                        </li>
                        <!-- <li>
                            <a class="nav-link text-light" href="#">
                                <i class="bi bi-chevron-double-right"> Admin</i>
                            </a>
                        </li> -->
                    </ul>
                </div>
                <div class="col-md-2 col-12">
                    <p class="navbar-brand font-weight-bold disabled" style="font-size: 20px">Contact</p>
                    <dl>
                        <i class="bi bi-geo-alt-fill"> Kolkata, West Bengal</i>
                    </dl>
                    <dl>
                        <i class="bi bi-envelope-fill"> abc@gmail.com</i>
                    </dl>
                    <dl>
                        <i class="bi bi-telephone-fill"> 9281746367</i>
                    </dl>
                </div>
            </div>
                <div class="copyrights">
                    <div class="row px-1 pt-1 border-top">
                        <div class="col-md-6 col-lg-6"></div>
                            <div class="col-md-6 col-lg-6 text-right">
                                <ul class="policymenu" style="display: inline-flex;list-style: none;">
                                    <li class="pr-2 border-right">
                                        <a href="#" class="text-light">Terms and Conditions</a>
                                    </li>

                                    <li class="pl-2">
                                        <a href="#" class="text-light">Policy</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
        </main>
    </footer>
<!-- ************************************End Footer********************************* -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
        <script>
            function preventBack() { window.history.forward(); }
                setTimeout("preventBack()", 0);
                window.onunload = function () { null };
        </script>
    </body>
<!-- **********************************<?Php ?>*********************************** -->    
    <?php
    if(isset($_POST['login']))
    {
        $pat_email="select * from patient_reg where pat_email ='".$_POST['userid']."'";
        $query=mysqli_query($con,$pat_email);
        $pat_email_count= mysqli_num_rows($query);

        if($pat_email_count){
            $patemail_pass= mysqli_fetch_assoc($query);
            $db_pass = $patemail_pass['pat_password'];
            $pass_decode = password_verify($_POST['password'], $db_pass);
            if($pass_decode){
                $_SESSION['patemail']=$patemail_pass['pat_email'];
    ?>
                <script type="text/javascript">
                    alert("Login Successful");
                    location.replace("patient.php");
                </script>
    <?php
            }
        }
        else{
            $doc_email="select * from doctor_reg where doc_email='".$_POST['userid']."'";
            $docquery=mysqli_query($con,$doc_email);
            $doc_email_count=mysqli_num_rows($docquery);
            if($doc_email_count){
                $docemail_pass=mysqli_fetch_assoc($docquery);
                $docdb_pass=$docemail_pass['doc_password'];
                $docpass_decode=password_verify($_POST['password'],$docdb_pass);
                if($docpass_decode){
                    $_SESSION['docemail']=$docemail_pass['doc_email'];
    ?>
                    <script type="text/javascript">
                        alert("Login Successful");
                        location.replace("doctor.php");
                    </script>
    <?php
                }
            }
            else{
    ?>
                    <script type="text/javascript">
                        alert("Hello! I am an alert box!!");
                    </script>
    <?php
            }
        }
    }
    ?>
</html>