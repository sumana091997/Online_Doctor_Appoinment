<?php
require_once('connection.php');
//<sql for my patient update>
    $proquery = "SELECT * FROM `doctor_details` INNER JOIN doctor_qualification ON doctor_details.regis_id=doctor_qualification.regis_id WHERE doctor_details.doc_email='".$_SESSION['docemail']."'";
    //<check for my patient>
    $proresult = mysqli_query($con, $proquery);
    $profetch = mysqli_fetch_assoc($proresult);
?>
      <!------------------------Profile Settings --------------------------->
			<div class="container">		
        <div class="tab-pane" id="profile">
            <h2 class="mb-0 font-weight-bold">Personal Details</h2>
            <hr>
            <form name="myform" class="form-group" action="./doctor.php" method="POST" enctype="multipart/form-data">
                <!-- photo upload start-->
                <div class="col-7 d-block">
                  <div class="form-group">
                    <img src="img/doctor/<?php echo $profetch['doc_photos']; ?>" height="200px" width="200px" id="profileDisplay" onclick="triggerClick()"/>
                    <small class="form-text text-muted">Allowed JPG, GIF or PNG. Max size of 2MB</small>
                    <input type="file" class="form-control profileImage" onchange="display(this)" name="profileImage" id="profileImage" style="display: none">
                  </div>
                  <label for="profileImage">Change Photo</label>
                </div>
                <!-- photo upload end -->
                <!--**************************First row***********************-->
              <div class="row">
                <div class="col-sm-4">
                  <label for="inputname"></label>
                  <input type="text" class="form-control" placeholder="First Name*" name="first" value="<?php echo $profetch['doc_fname']; ?>">
                </div>
                <div class="col-sm-4">
                  <label for="inputname"></label>
                  <input type="text" class="form-control" placeholder="Middle Name" name="middle" value="<?php echo $profetch['doc_mname']; ?>">
                </div>
                <div class="col-sm-4">
                  <label for="inputname"></label>
                  <input type="text" class="form-control" placeholder="Last Name*" name="last" value="<?php echo $profetch['doc_lname']; ?>">
                </div>
              </div>
                <!--**************************Second row***********************-->
              <div class="row">
                <div class="col-sm-4">
                  <label for="inputname"></label>
                  <input type="text" maxlength="10" minlength="10" class="form-control" placeholder="Phone*" name="phone" value="<?php echo $profetch['doc_phone']; ?>">
                </div>
                <div class="col-sm-4">
                  <label for="inputname"></label>
                  <input type="text" class="form-control" name="email" disabled value="<?php echo $profetch['doc_email']; ?>">
                </div>
                <div class="col-sm-4">
                  <label for="inputname"></label>
                  <input type="text" class="form-control" placeholder="Preferred Language (English,.....etc)" name="lang" value="<?php echo $profetch['prefer_language']; ?>">
                </div>
              </div>
                <!--**************************Third row***********************-->
              <div class="row">

                <div class="col-sm-4">
                  <div class="form-group mt-3">
                    <label for="inputname">Select Gender</label>
                    <select class="form-control" id="gender" name="gender">
                      <option selected=true value="<?php echo $profetch['doc_gender']; ?>"><?php echo $profetch['doc_gender']; ?></option>
                      <option value="Male">Male</option>
                      <option value="Female">Female</option>
                      <option value="Others">Others</option>
                    </select>
                  </div>
                </div>

                <div class="col-sm-4">
                  <div class ="form-group mt-3 mx-auto">
                    <label for="birthday">Date Of Birth</label>
                    <input type="date" class="form-control" id="birthday" name="dob" value="<?php echo $profetch['doc_dob']; ?>">
                  </div>
                </div>
              </div>
                <!--**************************forth row***********************-->
              
              <div class="row">
                <div class="form-floating px-3 col-sm-8">
                  <textarea class="form-control" row="4" cols="25" onkeypress="auto_grow(this);" onkeyup="auto_grow(this);" placeholder="Address[House No,Street Name,Locality]*" name="address" style="margin-top: 20px; resize: none; overflow: hidden;"><?php echo $profetch['doc_address']; ?></textarea> 
                </div>
                <div class="col-sm-4">
                  <div class="form-group mt-3">
                    <label for="inputname"></label>
                    <input type="text" class="form-control" placeholder="City*" name="city" value="<?php echo $profetch['doc_city']; ?>">
                  </div>
                </div>
              </div>
                <!--**************************fifth row***********************-->              
              
              <div class="row">
                <div class="col-sm-4">
                  <label for="inputname"></label>
                  <input type="text" class="form-control" placeholder="State*" name="state" value="<?php echo $profetch['doc_state']; ?>">
                </div>
                <div class="col-sm-4">
                  <label for="inputname"></label>
                  <input type="text" class="form-control" placeholder="Country*" name="country" value="<?php echo $profetch['doc_country']; ?>">
                </div>
                <div class="col-sm-4">
                  <label for="inputname"></label>
                  <input type="text" class="form-control" placeholder="Postal Code*" name="postal" value="<?php echo $profetch['doc_postal']; ?>">
                </div>
              </div>
              <hr><hr>
              <h4 class="mb-0 font-weight-bold">Achievements & Experiences</h4>
              <hr>
                <!--**************************sixth row***********************-->
              <div class="row">
                <div class="col-sm-4">
                  <label for="inputname"></label>
                  <input type="text" class="form-control mt-4" placeholder="Registration Number*" name="regno" disabled value="<?php echo $profetch['regis_id']; ?>">
                </div>
                <div class="col-sm-4">
                  <label for="inputname"></label>
                  <input type="text" class="form-control mt-4" placeholder="Practise Speciality*" name="speciality" value="<?php echo $profetch['doc_specialization']; ?>">
                </div>
                <div class="col-sm-4">
                  <label for="inputname mt-2">Date Of Registration</label>
                  <input type="date" class="form-control" name="regyear" value="<?php echo $profetch['reg_year']; ?>">
                </div>
              </div>
                <!--**************************seventh row***********************-->
              <div class="row">
                <div class="form-floating px-3 col-sm-4">
                  <textarea class="form-control" row="4" cols="25" onkeypress="auto_grow(this);" onkeyup="auto_grow(this);" placeholder="Educational Qualifications*" name="eduqualification"  style="margin-top: 20px; resize: none; overflow: hidden;"><?php echo $profetch['education_detail']; ?></textarea> 
                </div>
                <div class="form-floating px-3 col-sm-4">
                  <textarea class="form-control" row="4" cols="25" onkeypress="auto_grow(this);" onkeyup="auto_grow(this);" placeholder="Experience Details*" name="expdetails" style="margin-top: 20px; resize: none; overflow: hidden;"><?php echo $profetch['experience_details']; ?></textarea> 
                </div>
                <div class="form-floating px-3 col-sm-4">
                  <textarea class="form-control" row="4" cols="25" onkeypress="auto_grow(this);" onkeyup="auto_grow(this);" placeholder="Tell us something about yourself(within 100 words)*" name="bio" style="margin-top: 20px; resize: none; overflow: hidden;"><?php echo $profetch['doc_bio']; ?></textarea> 
                </div>
              </div>
              <hr>
              <div class="row justify-content-center">
                <div class="form-group mt-4 px-5">
                  <input type="submit" class="btn btn-primary btn-lg float-right" name="docdetail">
                </div>
              </div>                 
            </form>                
          </div>
      </div>

  <script>
    function triggerClick(e) {
      document.querySelector('#profileImage').click();
    }
    function display(e) {
      if (e.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e){
          document.querySelector('#profileDisplay').setAttribute('src', e.target.result);
        }
        reader.readAsDataURL(e.files[0]);
      }
    }
  </script>