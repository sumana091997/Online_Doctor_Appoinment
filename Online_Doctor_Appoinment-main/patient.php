<?php 
    include('connection.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="css/doctor.css">
    <link rel="stylesheet" href="css/search.css">
    <!-- Bootstrap CSS -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

  </head>
  <body class="bg-right" >
    <div class="container-fluid mt-4" >
      <div class="row" >
        <div class="col-md-12 col-12 mx-auto">
          <nav class="navbar navbar-expand-md mb-3 bg-common">
            <div class="container">
              <a href="#" class="navbar-brand font-weight-bold" style="font-size: 2rem; color: #ffffff;">DocOnAppoint</a>
            </div>
          </nav>
          <div class="row">
                    <!-------rightside navbar-------->
            <div class="col-lg-3 col-md-6 d-md-block">
              <div class="card card-left">
                <div class="card-body">
                  <nav class="nav d-md-block d-none">
                    <a data-toggle='tab' class="nav-link" href="javascript:void(0);" id="dashboard"><i class="fas fa-columns"></i> Dashboard</a>
                    <a data-toggle='tab' class="nav-link" href="javascript:void(0);" id="profile"><i class="far fa-id-card mr-1"></i> Profile Settings</a>
                    <a data-toggle='tab' class="nav-link" href="javascript:void(0);" id="search"><i class="fas fa-search mr-1"></i> Search Doctor</a>
                    <a data-toggle='tab' class="nav-link" href="javascript:void(0);" id="security"><i class="fas fa-user-lock mr-1"></i> Security</a>
                    <a data-toggle='tab' class="nav-link" href="javascript:void(0);" id="logout"><i class="fas fa-power-off mr-1"></i> Logout</a>
                  </nav>
                </div>
              </div>
            </div>
                    <!-- right side div -->
            <div class="col-lg-9 col-md-8">
              <div class="card">
                <div class="card-header border-bottom mb-3 d-md-none">
                  <ul class="nav nav-tabs card-header-tabs nav-fill">
                    <li class="nav-item">
                      <a data-toggle='tab' class="nav-link" href="javascript:void(0);" id="dashboardicon"><i class="fas fa-columns"></i></a>
                    </li>
                    <li class="nav-item">
                      <a data-toggle='tab' class="nav-link" href="javascript:void(0);" id="profileicon"><i class="far fa-id-card mr-1"></i></a>
                    </li>
                    <li class="nav-item">
                      <a data-toggle='tab' class="nav-link" href="javascript:void(0);" id="searchicon"><i class="fas fa-search mr-1"></i></a>
                    </li>
                    <li class="nav-item">
                      <a data-toggle='tab' class="nav-link" href="javascript:void(0);" id="securityicon"><i class="fas fa-user-lock mr-1"></i></a>
                    </li>
                    <li class="nav-item">
                      <a data-toggle='tab' class="nav-link" href="javascript:void(0);" id="logouticon"><i class="fas fa-power-off mr-1"></i></a>
                    </li>
                  </ul>                                
                </div>

                <div class="card-body tab-content border-0">
                  <div class="tab-pane active" id="maindiv">
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>

  <script>
    function preventBack() { window.history.forward(); }
      setTimeout("preventBack()", 0);
      window.onunload = function () { null };
    $(function () {
        $("#maindiv").load('patient/dashboard.php');
    });
    
     $(document).ready(function(){
        // ------------Dashboard start----------
        $('#dashboard').click(function(){
          $('#maindiv').load('patient/dashboard.php');
        });
        $('#dashboardicon').click(function(){
          $('#maindiv').load('patient/dashboard.php');
        });
        // -------------Patient-----------
        $('#profile').click(function(){
          $('#maindiv').load('patient/profilesetting.php');
        });
        $('#profileicon').click(function(){
          $('#maindiv').load('patient/profilesetting.php');
        });
        // -------------Search-----------
        $('#search').click(function(){
          $('#maindiv').load('patient/search.php');
        });
        $('#searchicon').click(function(){
          $('#maindiv').load('patient/search.php');
        });
        // -------------Security-----------
        $('#security').click(function(){
          $('#maindiv').load('patient/security.php');
        });
        $('#securityicon').click(function(){
          $('#maindiv').load('patient/security.php');
        });
        // -------------logout-----------
        $('#logout').click(function(){
          $('#maindiv').load('patient/logout.php');
        });
        $('#logouticon').click(function(){
          $('#maindiv').load('patient/logout.php');
        });
    });
  </script>
</html>

<!-- =========================Profile Setting========================== -->
<?php
if (isset($_POST['profilesubmit'])) {
  
  $profileImageName = time() . '_' . $_FILES['profileImage']['name'];
  $target = 'img/patient/' . $profileImageName;
  $pat="UPDATE patient_details SET pat_fname='".$_POST['first']."', pat_lname='".$_POST['last']."',pat_dob='".$_POST['date']."',pat_gender='".$_POST['gender']."',pat_blood='".$_POST['blood']."',pat_mobile='".$_POST['mobile']."',pat_address='".$_POST['address']."',pat_city='".$_POST['city']."',pat_state='".$_POST['state']."',pat_zip='".$_POST['zip']."',pat_photo='$profileImageName' WHERE pat_email='".$_SESSION['patemail']."'";

  $pro=mysqli_query($con,$pat);
  move_uploaded_file($_FILES['profileImage']['tmp_name'], $target); 
    ?>
      <script type="text/javascript">
        alert("Profile details updated.");
        if ( window.history.replaceState ) {
          window.history.replaceState( null, null, window.location.href );
        }
      </script>
    <?php
  ?>
      <script type="text/javascript">
        $(document).ready(function(){
          $('#maindiv').load('patient/profilesetting.php');
        });
      </script>
  <?php
    }
?>
<!-- =======================Profile Setting End======================== -->
<!-- ==============================Appoint============================== -->
<?php
if(isset($_POST['sche'])){
  // =========Select==========
  $sel="SELECT doctor_details.doc_email,doctor_scheduling.schedule_date,doctor_scheduling.visit_time,doctor_scheduling.clinic_name FROM doctor_scheduling INNER JOIN doctor_details ON doctor_scheduling.regis_id=doctor_details.regis_id WHERE doctor_scheduling.id='".$_SESSION['bookid']."'";
  $qu=mysqli_query($con,$sel);
  $sed= mysqli_fetch_assoc($qu);

  $todate= date('Y-m-d');
  // ============INSERT==========
  $book="INSERT INTO patient_appoint(`pat_email`, `doc_email`, `app_date`, `app_time`, `booking_date`, `clinic_name`) VALUES ('".$_SESSION['patemail']."','".$sed['doc_email']."','".$sed['schedule_date']."','".$sed['visit_time']."','$todate','".$sed['clinic_name']."')";
  $qu2=mysqli_query($con,$book);
  // ============DELETE==========
  $delete="DELETE FROM doctor_scheduling WHERE id='".$_SESSION['bookid']."'";
  $qu3=mysqli_query($con,$delete);
  unset($_SESSION["bookid"]);
  ?>
      <script type="text/javascript">
        alert("Your booking is confirm.");
        if ( window.history.replaceState ) {
          window.history.replaceState( null, null, window.location.href );
        }
        $(document).ready(function(){
          $('#maindiv').load('patient/search.php');
        });
      </script>
  <?php
}
?>
<!-- ===========================Appoint  End============================ -->
<!-- =========================Security Update========================== -->
<?php
if (isset($_POST['patregister'])) {
  $pat_pass="select * from patient_reg where pat_email ='".$_SESSION['patemail']."'";
  $query=mysqli_query($con,$pat_pass);
  $patemail_pass= mysqli_fetch_assoc($query);
  $db_pass = $patemail_pass['pat_password'];
  $pass_decode = password_verify($_POST['old_password'], $db_pass);
  if($pass_decode){
    if($_POST['pat_password']===$_POST['pat_confirmpassword']){
      $pass=password_hash($_POST['pat_password'], PASSWORD_BCRYPT);
      $updatepass="UPDATE `patient_reg` SET `pat_password`='$pass' WHERE `pat_email`='".$_SESSION['patemail']."'";
      $pquery=mysqli_query($con, $updatepass);
  ?>
    <script type="text/javascript">
        alert("Password change succesfully.");
        if ( window.history.replaceState ) {
          window.history.replaceState( null, null, window.location.href );
        }
    </script>
  <?php
  ?>
      <script type="text/javascript">
        $(document).ready(function(){
          $('#maindiv').load('patient/security.php');
        });
    </script>
  <?php
    }
  }
}
?>
<!-- =======================End Security Update========================= -->
<!-- =============================Logout================================ -->
<?php
  if (isset($_POST['patlogout'])) {
  ?>
    <script type="text/javascript">
      if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
      }
    </script>
  <?php
  session_destroy();
  ?>
    <script type="text/javascript">
      window.location = "welcome.php";
    </script>
  <?php
}
?>
<!-- ===========================End Logout============================== -->