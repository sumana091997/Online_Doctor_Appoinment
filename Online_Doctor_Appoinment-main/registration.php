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
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.css"/>
        <!--  ************************************************************** -->
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/register.css">
        <script src="js/register.js"></script>
        <title>DocOnAppoint</title>
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
<!-- *******************************registration form************************** -->
        <div id="register" class="py-5 bgimg">
            <div class="container">
                <div id="login-row" class="row justify-content-center align-items-center">
                
                    <div id="login-column" class="col-md-6 ml-auto p-4 bg-light shadow-lg rounded">
                        <div id="login-box" class="col-md-12">
                            <div class="slide-control my-3">
                                <button id="myPatient" class="slide btn_pat">Patient</button>
                                <button id="myDoctor" class="slide btn_doc">Doctor</button>
                            </div>
            <!-- **************************Patient form********************** -->                       
                            <form id="frm-pat" class="frm-pat" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" onsubmit="return mypat()">
                                <h2 id="patient-formheader" class="text-center pat-head">Patient Form</h2>
                                <div class="form-group text-center">
                                    <span id="patemailvalidation" style="color: red;"></span>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="pat_fname" id="pat-fname" class="form-control" placeholder="First Name" required="" onchange="mypat()">
                                    <span id="span-patfname" style="color: red;"></span>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="pat_lname" id="pat-lname" class="form-control" placeholder="Last Name" required="" onchange="mypat()">
                                    <span id="span-patlname" style="color: red;"></span>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="pat_email" id="pat-email" class="form-control" placeholder="Email" required="" onchange="mypat()">
                                    <span id="span-patemail" style="color: red;"></span>
                                </div>
                                <div class="form-group">
                                    <input type="password" name="pat_password" id="pat-password" class="form-control" placeholder="Password" required="" onchange="mypat()">
                                    <span id='span-patpass' style="color: red;"></span>
                                </div>
                                <div class="form-group">
                                    <input type="password" name="pat_confirmpassword" id="pat-confirmpassword" class="form-control" placeholder="Confirm Password" required="" onchange="mypat()">
                                    <span id='span-patconfirm' style="color: red;"></span>
                                </div>
                                <div class="form-group">
                                    <label for="remember-me"><span><input id="pat-showpass" name="pat_showpass" onclick="pat_showpassword()" type="checkbox"></span> <span>Show Password</span></label><br>
                                    <input type="submit" name="pat_register" id="pat-register" class="btn btn-md form-control signbtn" value="Sign Up">
                                </div>
                            </form>

                <!-- **************************Doctor form********************** -->
                            <form id="frm-doc" class="frm-doc" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post"  onsubmit="return mydoc()">
                                <h2 id="doctor-formheader" class="text-center doc-head">Doctor Form</h2>
                                <div class="form-group text-center">
                                    <span id="docemailvalidation" style="color: red;"></span>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="doc_fname" id="doc-fname" class="form-control" placeholder="First Name" required="" onchange="mydoc()">
                                    <span id="span-docfname" style="color: red;"></span>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="doc_lname" id="doc-lname" class="form-control" placeholder="Last Name" required="" onchange="mydoc()">
                                    <span id="span-doclname" style="color: red;"></span>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="doc_regisid" id="doc-regisid" class="form-control" placeholder="Your Registration Id" required="" onchange="mydoc()">
                                    <span id="span-docemail" style="color: red;"></span>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="doc_email" id="doc-email" class="form-control" placeholder="Email" required="" onchange="mydoc()">
                                    <span id="span-docemail" style="color: red;"></span>
                                </div>
                                <div class="form-group">
                                    <input type="password" name="doc_password" id="doc-password" class="form-control" placeholder="Password" required="" onchange="mydoc()">
                                    <span id="span-docpassword" style="color: red;"></span>
                                </div>
                                <div class="form-group">
                                    <input type="password" name="doc_confirmpassword" id="doc-confirmpassword" class="form-control" placeholder="Confirm Password" required="" onchange="mydoc()">
                                    <span id="span-docconfirm" style="color: red;"></span>
                                </div>
                                <div class="form-group">
                                    <label for="remember-me"><span><input id="doc-showpass" name="doc_showpass" onclick="doc_showpassword()" type="checkbox"></span> <span>Show Password</span></label><br>
                                    <input type="submit" name="doc_register" class="btn btn-md form-control signbtn" value="Sign Up">
                                </div>
                            </form>

                            <div>
                                <span class="or-line"></span>
                            </div>
                            <div id="register-link" class="text-center">
                                <a href="login.php" type="submit" name="register" class="regis" value="Sign Up">Already have an account?</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<!-- *****************************End registration form************************ -->
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
<!-- **********************************<script>*********************************** -->
        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <!-- Popper JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js" crossorigin="anonymous"></script>
        <script>
            function preventBack() { window.history.forward(); }
            setTimeout("preventBack()", 0);
            window.onunload = function () { null };

    // *******************Toogle Button for patient and doctor******************

            document.getElementById("myDoctor").onclick = function() {
                document.getElementById("patient-formheader").setAttribute("style", "display: none;");
                document.getElementById("doctor-formheader").setAttribute("style", "display: block;");
                document.getElementById("frm-pat").setAttribute("style", "display: none;");
                document.getElementById("frm-doc").setAttribute("style", "display: block;");   
                document.getElementById("myPatient").setAttribute("style", "background-color: white;color: black;");
                document.getElementById("myDoctor").setAttribute("style", "background-color: #09dca4;color: white;");     
            }
            document.getElementById("myPatient").onclick = function() {
                document.getElementById("doctor-formheader").setAttribute("style", "display: none;");
                document.getElementById("patient-formheader").setAttribute("style", "display: block;");
                document.getElementById("frm-doc").setAttribute("style", "display: none;");
                document.getElementById("frm-pat").setAttribute("style", "display: block;");
                document.getElementById("myDoctor").setAttribute("style", "background-color: white;color: black;");
                document.getElementById("myPatient").setAttribute("style", "background-color: #09dca4;color: white;");         
            }

    // ************************patient Form Validation**************************

            var namechar=/^[A-Za-z]+$/;
            function mypat(){
                
                // ************First Name**************
                var pf= document.getElementById("pat-fname").value;
                if(pf==""){
                    document.getElementById("span-patfname").innerHTML="Please enter your first name";
                    return false;
                }
                else if(pf.length<3 || pf.length>20){
                    document.getElementById("span-patfname").innerHTML="Please check the length of First Name between 3-20";
                    return false;
                }
                else if(pf.match(namechar)){
                    document.getElementById("span-patfname").innerHTML="";
                    true;
                }
                else{
                    document.getElementById("span-patfname").innerHTML="Only alphabets are allowed";
                    return false;
                }
                // ************Last Name**************
                var pl= document.getElementById("pat-lname").value;
                if(pl==""){
                    document.getElementById("span-patlname").innerHTML="Please enter your last name";
                    return false;
                }
                else if(pl.length<3 || pl.length>20){
                    document.getElementById("span-patlname").innerHTML="Please check the length of First Name between 3-20";
                    return false;
                }
                else if(pl.match(namechar)){
                    document.getElementById("span-patlname").innerHTML="";
                    true;
                }
                else{
                    document.getElementById("span-patlname").innerHTML="Only alphabets are allowed";
                    return false;
                }

                // ************Email**************

                var pe = document.getElementById("pat-email").value
                if(pe==""){
                    document.getElementById("span-patemail").innerHTML="Please enter your Email Id";
                    return false;
                }
                else if(pe.indexOf('@')<=0){
                    document.getElementById("span-patemail").innerHTML="Invalid @ position";
                    return false;
                }
                else if((pe.charAt(pe.length-4) != '.') && (pe.charAt(pe.length-3) != '.')){
                    document.getElementById("span-patemail").innerHTML="Invalid email";
                    return false;
                }
                else{
                    document.getElementById("span-patemail").innerHTML="";
                    true;
                }

                // ************Password**************

                var pp = document.getElementById("pat-password").value;

                if(pp.length < 8) {
                    document.getElementById("span-patpass").innerHTML="Password length must be 8 char";
                    return false;
                }
                else if(pp.search(/[0-9]/)==-1){
                    document.getElementById("span-patpass").innerHTML="Atleast 1 number must be enter";
                    return false;
                }
                else if(pp.search(/[a-z]/)==-1){
                    document.getElementById("span-patpass").innerHTML="Atleast 1 lowwer letter must be enter";
                    return false;
                }
                else if(pp.search(/[A-Z]/)==-1){
                    document.getElementById("span-patpass").innerHTML="Atleast 1 Upper letter must be enter";
                    return false;
                }
                else if(pp.search(/[!\@\#\$\%\^\&\*\(\)\:\;\.\<\>\_\-\+\=\?\~\`]/)==-1){
                    document.getElementById("span-patpass").innerHTML="Atleast 1 special letter must be enter";
                    return false;
                }
                else{
                    document.getElementById("span-patpass").innerHTML="";
                    true;
                }

                // ************Confirm Password**************
                $('#pat-password, #pat-confirmpassword').on('keyup', function() {
                    if ($('#pat-password').val() != $('#pat-confirmpassword').val()) {
                        $('#span-patconfirm').html('Not Matching').css('color', 'red');
                    }
                    else{
                        $('#span-patconfirm').html('').css('color', 'red');
                    }
                });
                var pc = document.getElementById("pat-confirmpassword").value;
                if(pp == pc)
                {
                    true;
                }
                else{
                    return false;
                }
            }
    // *************************Doctor Form Validation**************************

            function mydoc(){
                
                // ************First Name**************
                var df= document.getElementById("doc-fname").value;
                if(df==""){
                    document.getElementById("span-docfname").innerHTML="Please enter your firstname";
                    return false;
                }
                else if(df.length<3 || df.length>20){
                    document.getElementById("span-docfname").innerHTML="Please check the length of First Name between 3-20";
                    return false;
                }
                else if(df.match(namechar)){
                    document.getElementById("span-docfname").innerHTML="";
                    true;
                }
                else{
                    document.getElementById("span-docfname").innerHTML="Only alphabets are allowed";
                    return false;
                }
                // ************Last Name**************
                var dl= document.getElementById("doc-lname").value;
                if(dl==""){
                    document.getElementById("span-doclname").innerHTML="Please enter your last name";
                    return false;
                }
                else if(dl.length<3 || dl.length>20){
                    document.getElementById("span-doclname").innerHTML="Please check the length of First Name between 3-20";
                    return false;
                }
                else if(dl.match(namechar)){
                    document.getElementById("span-doclname").innerHTML="";
                    true;
                }
                else{
                    document.getElementById("span-doclname").innerHTML="Only alphabets are allowed";
                    return false;
                }

                // ************Email**************

                var de = document.getElementById("doc-email").value;
                if(de==""){
                    document.getElementById("span-docemail").innerHTML="Please enter your Email Id";
                    return false;
                }
                else if(de.indexOf('@')<=0){
                    document.getElementById("span-docemail").innerHTML="Invalid @ position";
                    return false;
                }
                else if((de.charAt(de.length-4) != '.') && (de.charAt(de.length-3) != '.')){
                    document.getElementById("span-docemail").innerHTML="Invalid email";
                    return false;
                }
                else{
                    document.getElementById("span-docemail").innerHTML="";
                    true;
                }

                // ************Password**************

                var dp = document.getElementById("doc-password").value;
                if(dp.length < 8) {
                    document.getElementById("span-docpassword").innerHTML="Password length must be 8 char";
                    return false;
                }
                else if(dp.search(/[0-9]/)==-1){
                    document.getElementById("span-docpassword").innerHTML="Atleast 1 number must be enter";
                    return false;
                }
                else if(dp.search(/[a-z]/)==-1){
                    document.getElementById("span-docpassword").innerHTML="Atleast 1 lowwer letter must be enter";
                    return false;
                }
                else if(dp.search(/[A-Z]/)==-1){
                    document.getElementById("span-docpassword").innerHTML="Atleast 1 Upper letter must be enter";
                    return false;
                }
                else if(dp.search(/[!\@\#\$\%\^\&\*\(\)\:\;\.\<\>\_\-\+\=\?\~\`]/)==-1){
                    document.getElementById("span-docpassword").innerHTML="Atleast 1 special letter must be enter";
                    return false;
                }
                else{
                    document.getElementById("span-docpassword").innerHTML="";
                    true;
                }

                // ************Confirm Password**************
                $('#doc-password, #doc-confirmpassword').on('keyup', function() {
                    if ($('#doc-password').val() != $('#doc-confirmpassword').val()) {
                        $('#span-docconfirm').html('Not Matching').css('color', 'red');
                    }
                    else{
                        $('#span-docconfirm').html('').css('color', 'red');
                    }
                });
                var dc = document.getElementById("doc-confirmpassword").value;
                if(dp == dc)
                {
                    true;
                }
                else{
                    return false;
                }
            }
        </script>
    </body>
<!-- **********************************<?Php ?>*********************************** -->
    <?php
    // ***********************patient registration************************
        if(isset($_POST['pat_register']))
        {
            $pass=password_hash($_POST['pat_password'], PASSWORD_BCRYPT);

            $everify="select regemail.pat_email from patient_reg regemail,patient_details detemail where regemail.pat_email = '".$_POST['pat_email']."' and detemail.pat_email='".$_POST['pat_email']."'";
            $query=mysqli_query($con,$everify);
            $emailcount=mysqli_num_rows($query);
            $everify2="select doc_email from doctor_reg where doc_email= '".$_POST['pat_email']."'";
            $query2=mysqli_query($con,$everify2);
            $emailcount2=mysqli_num_rows($query2);
            if($emailcount>0)
            {
        ?>
                <script type="text/javascript">
                    document.getElementById("patemailvalidation").innerHTML="Email Id already exists.";
                    if ( window.history.replaceState ) {
                        window.history.replaceState( null, null, window.location.href );
                    }
                </script>
        <?php
            }
            elseif($emailcount2>0)
            {
        ?>
                <script type="text/javascript">
                    document.getElementById("patemailvalidation").innerHTML="Email Id already Used.";
                    if ( window.history.replaceState ) {
                        window.history.replaceState( null, null, window.location.href );
                    }
                </script>
        <?php
            }
            else{
                if($_POST['pat_password']===$_POST['pat_confirmpassword'])
                {
                    $insertquery="insert into patient_reg(pat_email,pat_password) values('".$_POST['pat_email']."','$pass')";
                    $insertquery2="insert into patient_details(pat_email,pat_fname,pat_lname) values('".$_POST['pat_email']."','".$_POST['pat_fname']."','".$_POST['pat_lname']."')";
                    $pquery=mysqli_query($con, $insertquery);
                    $pquery2=mysqli_query($con, $insertquery2);
        ?>
                    <script type="text/javascript">
                        alert("Your registration is complete.");
                        if ( window.history.replaceState ) {
                        window.history.replaceState( null, null, window.location.href );
                    }
                    </script>
        <?php
                    unset ($_SESSION['email']);
                    unset ($_SESSION['password']);
                }
                else{
        ?>
                    <script type="text/javascript">
                        document.getElementById("span-patconfirm").innerHTML="Password Does not match.";
                    </script>
        <?php
                }
                
            }

        }
        // ***********************Doctor registration************************
        if(isset($_POST['doc_register']))
        {
            $docpass=password_hash($_POST['doc_password'], PASSWORD_BCRYPT);

            $doceverify="select docregemail.doc_email from doctor_reg docregemail,doctor_details docdetemail where docregemail.doc_email =  '".$_POST['doc_email']."' and docdetemail.doc_email='".$_POST['doc_email']."'";

            $docquery=mysqli_query($con,$doceverify);

            $docemailcount=mysqli_num_rows($docquery);
            if($docemailcount>0)
            {
        ?>
                <script type="text/javascript">
                    document.getElementById("patient-formheader").setAttribute("style", "display: none;");
                    document.getElementById("doctor-formheader").setAttribute("style", "display: block;");
                    document.getElementById("frm-pat").setAttribute("style", "display: none;");
                    document.getElementById("frm-doc").setAttribute("style", "display: block;");   
                    document.getElementById("myPatient").setAttribute("style", "background-color: white;color: black;");
                    document.getElementById("myDoctor").setAttribute("style", "background-color: #09dca4;color: white;");
                    document.getElementById("docemailvalidation").innerHTML="Email Id already exists.";
                    if ( window.history.replaceState ) {
                        window.history.replaceState( null, null, window.location.href );
                    }

                </script>
        <?php
            }
            $doceverify2="select pat_email from patient_reg where pat_email= '".$_POST['doc_email']."'";
            $docquery2=mysqli_query($con,$doceverify2);
            $docemailcount2=mysqli_num_rows($docquery2);
            if($docemailcount2>0)
            {
        ?>
                <script type="text/javascript">
                    document.getElementById("patient-formheader").setAttribute("style", "display: none;");
                    document.getElementById("doctor-formheader").setAttribute("style", "display: block;");
                    document.getElementById("frm-pat").setAttribute("style", "display: none;");
                    document.getElementById("frm-doc").setAttribute("style", "display: block;");   
                    document.getElementById("myPatient").setAttribute("style", "background-color: white;color: black;");
                    document.getElementById("myDoctor").setAttribute("style", "background-color: #09dca4;color: white;");
                    document.getElementById("docemailvalidation").innerHTML="Email Id already used.";
                    if ( window.history.replaceState ) {
                        window.history.replaceState( null, null, window.location.href );
                    }
                </script>
        <?php
            }
            else{
                if($_POST['doc_password']===$_POST['doc_confirmpassword'])
                {
                    $docinsertquery="insert into doctor_reg(doc_email,doc_password) values('".$_POST['doc_email']."','$docpass')";
                    $docinsertquery2="insert into doctor_details(regis_id,doc_email,doc_fname,doc_lname) values('".$_POST['doc_regisid']."','".$_POST['doc_email']."','".$_POST['doc_fname']."','".$_POST['doc_lname']."')";
                    $docinsertquery3="insert into doctor_qualification(regis_id) values('".$_POST['doc_regisid']."')";
                    $docquery=mysqli_query($con, $docinsertquery);
                    $docquery2=mysqli_query($con, $docinsertquery2);
                    $docquery3=mysqli_query($con, $docinsertquery3);
            ?>
                    <script type="text/javascript">
                        alert("Your registration is complete.");
                        if ( window.history.replaceState ) {
                        window.history.replaceState( null, null, window.location.href );
                    }
                    </script>
            <?php
                }
                else{
            ?>
                    <script type="text/javascript">
                        document.getElementById("span-docconfirm").innerHTML="Password Does not match.";
                    </script>
            <?php
                }
            }
        }

        session_destroy();
    ?>
</html>

