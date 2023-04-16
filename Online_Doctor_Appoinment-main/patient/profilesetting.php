<?php
require_once('connection.php');
 // For fetching data in dashboard
 $query1 = "SELECT * FROM patient_details WHERE pat_email = '".$_SESSION['patemail']."' ";
 $result1 = mysqli_query($con, $query1);
 $patfetch = mysqli_fetch_assoc($result1);
?>                     
                        
                        <div class="tab-pane" id="profile">
                            <h2>Your Profile Information</h2>
                            <hr>
                            <form method="post" enctype="multipart/form-data" action="./patient.php">
                                <div class="row form-row">
                                  <div class="col-7 d-block">
                                    <div class="form-group">
                                      <img src="img/patient/<?php echo $patfetch['pat_photo']; ?>" height="200px" width="200px" id="profileDisplay" onclick="triggerClick()"/>
                                      <small class="form-text text-muted">Allowed JPG, GIF or PNG. Max size of 2MB</small>
                                      <input type="file" class="form-control profileImage" onchange="display(this)" name="profileImage" id="profileImage" style="display: none">
                                    </div>
                                    <label for="profileImage">Change Photo</label>
                                  </div>
                                   <div class="col-12 col-md-6">
                                    <div class="form-group">
                                      <label>First Name</label>
                                      <input type="text" class="form-control" placeholder="First Name" name="first" value="<?php echo $patfetch['pat_fname']; ?>">
                                    </div>
                                  </div>
                                  <div class="col-12 col-md-6">
                                    <div class="form-group">
                                      <label>Last Name</label>
                                      <input type="text" class="form-control" name="last" value="<?php echo $patfetch['pat_lname']; ?>">
                                    </div>
                                  </div>
                                  <div class="col-12 col-md-6">
                                    <div class="form-group">
                                      <label>Date of Birth</label>
                                      <div class="cal-icon">
                                        <input type="Date" class="form-control datetimepicker" name="date" value="<?php echo $patfetch['pat_dob']; ?>">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-12 col-md-6">
                                    <div class="form-group">
                                      <label>Select Gender</label>
                                      <div class="cal-icon">
                                        <select class="form-control" id="gender" name="gender">
                                            <option selected="true" value="<?php echo $patfetch['pat_gender']; ?>"><?php echo $patfetch['pat_gender']; ?></option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                            <option value="Others">Others</option>
                                          </select>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-12 col-md-6">
                                    <div class="form-group">
                                      <label>Blood Groop</label>
                                      <select class="form-control select" id="blood" name="blood">
                                        <option selected="true" value="<?php echo $patfetch['pat_blood']; ?>"><?php echo $patfetch['pat_blood']; ?></option>
                                        <option value="A-">A-</option>
                                        <option value="A+">A+</option>
                                        <option value="B-">B-</option>
                                        <option value="B+">B+</option>
                                        <option value="AB-">AB-</option>
                                        <option value="AB+">AB+</option>
                                        <option value="O-">O-</option>
                                        <option value="O+">O+</option>
                                      </select>
                                    </div>
                                  </div>
                                  <div class="col-12 col-md-6">
                                    <div class="form-group">
                                      <label>Email ID</label>
                                      <input type="email" disabled class="form-control" name="email" value="<?php echo $patfetch['pat_email']; ?>">
                                    </div>
                                  </div>
                                  <div class="col-12 col-md-6">
                                    <div class="form-group">
                                      <label>Mobile</label>
                                      <input type="text" class="form-control" name="mobile" value="<?php echo $patfetch['pat_mobile']; ?>">
                                    </div>
                                  </div>
                                  <div class="col-12">
                                    <div class="form-group">
                                    <label>Address</label>
                                      <input type="text" class="form-control" name="address" value="<?php echo $patfetch['pat_address']; ?>">
                                    </div>
                                  </div>
                                  <div class="col-12 col-md-6">
                                    <div class="form-group">
                                      <label>City</label>
                                      <input type="text" class="form-control" name="city" value="<?php echo $patfetch['pat_city']; ?>">
                                    </div>
                                  </div>
                                  <div class="col-12 col-md-6">
                                    <div class="form-group">
                                      <label>State</label>
                                      <input type="text" class="form-control" name="state" value="<?php echo $patfetch['pat_state']; ?>">
                                    </div>
                                  </div>
                                  <div class="col-12 col-md-6">
                                    <div class="form-group">
                                      <label>Zip Code</label>
                                      <input type="text" class="form-control" name="zip" value="<?php echo $patfetch['pat_zip']; ?>">
                                    </div>
                                  </div>
                                </div>
                                <div class="submit-section">
                                  <input type="submit" name="profilesubmit" class="btn btn-primary submit-btn">
                                </div>
                            </form>
                        </div>
                           <!--profile information ends-->
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