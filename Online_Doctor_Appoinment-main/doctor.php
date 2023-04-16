<?php 
    require_once('connection.php');
    $schedule_id="select regis_id FROM doctor_details where doc_email = '".$_SESSION['docemail']."'";
    $schequery=mysqli_query($con,$schedule_id);
    $schefetch=mysqli_fetch_assoc($schequery);
    $_SESSION['docreisid']=$schefetch['regis_id'];
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="css/doctor.css">
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
  <body class="bg-right">
    <div class="container-fluid mt-4">
      <div class="row">
        <div class="col-md-12 col-18 mx-auto">
                  <!--*************************** Nav bar***************************-->     
          <nav class="mb-3 bg-common">
            <div class="container">
              <a href="#" class="navbar-brand font-weight-bold" style="font-size: 1.6rem;color: #ffffff;">DocOnAppoint</a>
            </div>
          </nav>
                  <!--**************************End Nav bar**************************-->
                  <!--************************content row starts*********************-->
          <div class="row">
                  <!--*******************vertical navbar***********************-->            
            <div class="col-lg-3 col-md-4 d-md-block">
              <div class="card bg-common card-left">
                <div class="card-body">
                  <nav class="nav d-md-block d-none">
                      <!--*************End change profile picture*********-->
                    <a data-toggle='tab' class="nav-link" href="javascript:void(0);" id="docdash"><i class="fas fa-user-md mr-3"></i>Dashboard</a>
                    <a data-toggle='tab' class="nav-link" href="javascript:void(0);" id="docpatient"><i class="fas fa-user-injured mr-3"></i> My Patients</a>
                    <a data-toggle='tab' class="nav-link" href="javascript:void(0);" id="docschedule"><i class="fas fa-business-time mr-2"></i> Scheduling</a>
                    <a data-toggle='tab' class="nav-link" href="javascript:void(0);" id="docprofile"><i class="far fa-id-card mr-2"></i> Profile Settings</a>
                    <a data-toggle="tab" class="nav-link" href="javascript:void(0);" id="docclinic"><i class="fas fa-clinic-medical"></i>  Clinic Details</a>
                    <a data-toggle='tab' class="nav-link" href="javascript:void(0);" id="docsecurity"><i class="fas fa-user-lock mr-2"></i> Security</a>
                    <a data-toggle='tab' class="nav-link" href="javascript:void(0);" id="doclogout"><i class="fas fa-power-off mr-3"></i> Log Out</a>
                  </nav>
                </div>
              </div>
            </div>
                    <!--*****************End vertical navbar*********************-->
                    <!--*****************Right side division*********************-->
            <div class="col-lg-9 col-md-8">
              <div class="card">
                <div class="card-header border-bottom mb-3 d-md-none">
                  <ul class="nav nav-tabs card-header-tabs nav-fill">
                    <li class="nav-item">
                      <a data-toggle='tab' class="nav-link" href="javascript:void(0);" id="docdashicon"><i class="fas fa-user-md mr-2"></i></a>
                    </li>
                    <li class="nav-item">
                      <a data-toggle='tab' class="nav-link" href="javascript:void(0);" id="docpatienticon"><i class="fas fa-user-injured mr-2"></i></a>
                    </li>
                    <li class="nav-item">
                      <a data-toggle='tab' class="nav-link" href="javascript:void(0);" id="docscheduleicon"><i class="fas fa-business-time mr-2"></i></a>
                    </li>
                    <li class="nav-item">
                      <a data-toggle='tab' class="nav-link" href="javascript:void(0);" id="docprofileicon"><i class="far fa-id-card mr-2"></i></a>
                    </li>
                    <li class="nav-item">
                      <a data-toggle='tab' class="nav-link" href="javascript:void(0);" id="docclinicicon"><i class="fas fa-clinic-medical"></i></a>
                    </li>
                    <li class="nav-item">
                      <a data-toggle='tab' class="nav-link" href="javascript:void(0);" id="docsecurityicon"><i class="fas fa-user-lock mr-2"></i></a>
                    </li>
                    <li class="nav-item">
                      <a data-toggle='tab' class="nav-link" href="javascript:void(0);" id="doclogouticon"><i class="fas fa-power-off"></i></a>
                    </li>
                  </ul>
                </div>

                  <!--********************ANCHOR TAG*************************-->
                <div class="card-body tab-content border-0">

                    <!--**********************maindiv*************************-->
                  <div class="tab-pane active" id="maindiv">
                  </div>
                  <!--**********************End maindiv*************************-->
                </div>
              </div>            
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    
  </body>
  <script>
    function preventBack() { window.history.forward(); }
      setTimeout("preventBack()", 0);
      window.onunload = function () { null };
    function auto_grow(element){
      element.style.height = "5px";
      element.style.height = (element.scrollHeight)+"px";
    }
    $(function(){
        $("#maindiv").load('doctor/dashboard.php');
    });
      $(document).ready(function(){
        // ------------Dashboard----------
        $('#docdash').click(function(){
          $('#maindiv').load('doctor/dashboard.php');
        });
        $('#docdashicon').click(function(){
          $('#maindiv').load('doctor/dashboard.php');
        });
        // -------------Patient-----------
        $('#docpatient').click(function(){
          $('#maindiv').load('doctor/mypatient.php');
        });
        $('#docpatienticon').click(function(){
          $('#maindiv').load('doctor/mypatient.php');
        });
        // -------------Schedule-----------
        $('#docschedule').click(function(){
          $('#maindiv').load('doctor/schedule.php');
        });
        $('#docscheduleicon').click(function(){
          $('#maindiv').load('doctor/schedule.php');
        });
        // -------------Profile------------
        $('#docprofile').click(function(){
          $('#maindiv').load('doctor/profile.php');
        });
        $('#docprofileicon').click(function(){
          $('#maindiv').load('doctor/profile.php');
        });
        // -------------Clinic-----------
        $('#docclinic').click(function(){
          $('#maindiv').load('doctor/clinic.php');
        });
        $('#docclinicicon').click(function(){
          $('#maindiv').load('doctor/clinic.php');
        });
        // -------------Security-----------
        $('#docsecurity').click(function(){
          $('#maindiv').load('doctor/security.php');
        });
        $('#docsecurityicon').click(function(){
          $('#maindiv').load('doctor/security.php');
        });
        // -------------logout-----------
        $('#doclogout').click(function(){
          $('#maindiv').load('doctor/logout.php');
        });
        $('#doclogouticon').click(function(){
          $('#maindiv').load('doctor/logout.php');
        });
      });
    </script>
</html>
<!-- =====================Schedule Submit Php======================= -->
  <?php
    if(isset($_POST['save']))
    {
      $schedule_insert="INSERT INTO doctor_scheduling (regis_id,schedule_date,clinic_name,visit_time) VALUES('{$_SESSION['docreisid']}','".$_POST['scheduledate']."','".$_POST['clinicname']."','".$_POST['visittime']."')";
      $schedulesubmit=mysqli_query($con,$schedule_insert);
  ?>
      <script type="text/javascript">
      alert("Schedule Submited.");
        if ( window.history.replaceState ) {
          window.history.replaceState( null, null, window.location.href );
        }
          $(document).ready(function(){
            $('#maindiv').load('doctor/schedule.php');
          });
      </script>
  <?php
      
    }
  ?>
<!-- ====================End Schedule Submit Php===================== -->

<!-- =====================Schedule Delete Php========================= -->
  <?php
    if(isset($_GET['id'])){
      $id = $_GET['id'];
      $q = "DELETE FROM `doctor_scheduling` WHERE id = $id";
      mysqli_query($con, $q);
  ?>
      <script type="text/javascript">
        $(document).ready(function(){
          $('#maindiv').load('doctor/schedule.php');
        });
      </script>
  <?php
    }
  ?>
<!-- ====================End Schedule Delete Php======================= -->
<!-- ============================Profile Php=========================== -->
<?php
    if(isset($_POST['docdetail'])){
      $profileImageName = time() . '_' . $_FILES['profileImage']['name'];
      $target = 'img/doctor/' . $profileImageName;
      $pat="UPDATE doctor_details det INNER JOIN doctor_qualification qua ON det.regis_id=qua.regis_id SET det.doc_fname='".$_POST['first']."',det.doc_mname='".$_POST['middle']."',det.doc_lname='".$_POST['last']."',det.doc_phone='".$_POST['phone']."',det.prefer_language='".$_POST['lang']."',det.doc_gender='".$_POST['gender']."',det.doc_dob='".$_POST['dob']."',det.doc_address='".$_POST['address']."',det.doc_city='".$_POST['city']."',det.doc_state='".$_POST['state']."',det.doc_country='".$_POST['country']."',det.doc_postal='".$_POST['postal']."', det.doc_photos='$profileImageName', qua.doc_specialization='".$_POST['speciality']."',qua.reg_year='".$_POST['regyear']."',qua.doc_specialization='".$_POST['speciality']."',qua.education_detail='".$_POST['eduqualification']."',qua.experience_details='".$_POST['expdetails']."',qua.doc_bio='".$_POST['bio']."' WHERE det.doc_email='".$_SESSION['docemail']."'";
    
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
              $('#maindiv').load('doctor/profile.php');
            });
          </script>
      <?php
        }
?>
<!-- ==========================End Profile Php========================= -->
<!-- =======================Clinic detail Php========================== -->
<?php
    if(isset($_POST['clinicsubmit'])){
      $c = "SELECT COUNT(doctor_clinic.clinic_name) as total  FROM doctor_clinic INNER JOIN doctor_details ON doctor_clinic.regis_id=doctor_details.regis_id WHERE doctor_details.doc_email='".$_SESSION['docemail']."'";
      $countquery=mysqli_query($con, $c);
      $clicount=mysqli_fetch_assoc($countquery);
      $count=$clicount['total'];

      if($count<3){
        $cliinsert="INSERT INTO `doctor_clinic`(`regis_id`, `clinic_name`, `clinic_type`, `clinic_opening_time`, `clinic_closing_time`, `clinic_fee`, `clinic_address`) VALUES ('{$_SESSION['docreisid']}','".$_POST['cliname']."','".$_POST['clinictype']."','".$_POST['clioptime']."','".$_POST['clcltime']."','".$_POST['clifee']."','".$_POST['cliadd']."')";
        $clinicsubmit=mysqli_query($con,$cliinsert);
    ?>
      <script type="text/javascript">
        alert("Clinic detail submited.");
        if ( window.history.replaceState ) {
          window.history.replaceState( null, null, window.location.href );
        }
      </script>
    <?php 
      }
      else{
    ?>
      <script type="text/javascript">
        alert("More than three Clinic detail already submited.");
        if ( window.history.replaceState ) {
          window.history.replaceState( null, null, window.location.href );
        }
      </script>
    <?php
      }
  ?>
      <script type="text/javascript">
        $(document).ready(function(){
          $('#maindiv').load('doctor/clinic.php');
        });
      </script>
  <?php
    }
  ?>
<!-- =====================End Clinic detail Php========================= -->
<!-- ====================Delete clinic detail Php======================= -->
<?php
    if(isset($_GET['clinic_id'])){
      $clinic_id = $_GET['clinic_id'];
      $c1= "DELETE doctor_scheduling FROM doctor_scheduling INNER JOIN doctor_clinic ON doctor_scheduling.regis_id=doctor_clinic.regis_id WHERE doctor_clinic.clinic_id='".$_GET['clinic_id']."' AND doctor_scheduling.clinic_name=doctor_clinic.clinic_name";
      $c = "DELETE FROM `doctor_clinic` WHERE clinic_id = $clinic_id";

      mysqli_query($con, $c1);
      mysqli_query($con, $c);
      
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
          $('#maindiv').load('doctor/clinic.php');
        });
      </script>
  <?php
    }
?>
<!-- ===================End Delete Clinic detail Php===================== -->
<!-- =========================Security Update========================== -->
<?php
if (isset($_POST['docpasschange'])) {
  $doc_pass="select * from doctor_reg where doc_email ='".$_SESSION['docemail']."'";
  $query=mysqli_query($con,$doc_pass);
  $docemail_pass= mysqli_fetch_assoc($query);
  $db_pass = $docemail_pass['doc_password'];
  $pass_decode = password_verify($_POST['old_password'], $db_pass);
  if($pass_decode){
    if($_POST['doc_password']===$_POST['doc_confirmpassword']){
      $pass=password_hash($_POST['doc_password'], PASSWORD_BCRYPT);
      $updatepass="UPDATE `doctor_reg` SET `doc_password`='$pass' WHERE `doc_email`='".$_SESSION['docemail']."'";
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
          $('#maindiv').load('doctor/security.php');
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
  if (isset($_POST['doclogout'])) {
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