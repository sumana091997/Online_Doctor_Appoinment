<?php
require_once('connection.php');
//<sql for today fetch update>
$query = "select patient_details.pat_photo,doctor_clinic.clinic_fee,patient_appoint.clinic_name,patient_appoint.app_date,patient_appoint.app_time,patient_appoint.booking_date,patient_details.pat_fname,patient_details.pat_lname FROM patient_appoint INNER JOIN patient_details ON patient_appoint.pat_email=patient_details.pat_email INNER JOIN doctor_details ON doctor_details.doc_email=patient_appoint.doc_email INNER JOIN doctor_clinic ON doctor_details.regis_id=doctor_clinic.regis_id WHERE patient_appoint.app_date= CURRENT_DATE AND patient_appoint.clinic_name=doctor_clinic.clinic_name AND patient_appoint.doc_email='".$_SESSION['docemail']."'";
$result = mysqli_query($con, $query);
$query1 = "select patient_details.pat_photo,doctor_clinic.clinic_fee,patient_appoint.clinic_name,patient_appoint.app_date,patient_appoint.app_time,patient_appoint.booking_date,patient_details.pat_fname,patient_details.pat_lname FROM patient_appoint INNER JOIN patient_details ON patient_appoint.pat_email=patient_details.pat_email INNER JOIN doctor_details ON doctor_details.doc_email=patient_appoint.doc_email INNER JOIN doctor_clinic ON doctor_details.regis_id=doctor_clinic.regis_id WHERE patient_appoint.app_date> CURRENT_DATE AND patient_appoint.clinic_name=doctor_clinic.clinic_name AND patient_appoint.doc_email='".$_SESSION['docemail']."'";
$result1 = mysqli_query($con, $query1);
?>
              <!--************************Today table content********************-->
                    <nav class="user-tabs mb-4">
                      <ul class="nav nav-tabs nav-tabs-bottom nav-justified nav fill">
                        <li class="nav-item">
                          <a class="nav-link active" aria-current="page" href="#today_appoint" data-toggle="tab">Today</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#upcoming_appoint" data-toggle="tab">Upcoming</a>
                        </li>
                      </ul>
                    </nav>
                <!--*********************Today table content*********************-->
                    <div class="tab-content pt-2">

                  <!--************************Today Table Tab********************-->
                      <div id="today_appoint" class="tab-pane fade show active">
                        <div class="card card-table mb-0">
                          <div class="card-body">
                            <div class="table-responsive">
                              <table class="table table-hover table-center mb-2">
                                <thead>
                                  <tr>
                                    <th>Patient Name</th>
                                    <th>Appointment Time</th>
                                    <th>Booking Date</th>
                                    <th>Amount(INR)</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php
                                    while($rows = mysqli_fetch_array($result)) {
                                  ?>
                                  <tr>
                                    <td>
                                      <h4 class="table-avatar">
                                        <a href="patient1-profile.html" class="avatar avatar-sm mr-2">
                                          <img class="avatar-img rounded-circle" src="./img/patient/<?php echo $rows['pat_photo'];?>">
                                        </a>
                                        <a href="patient1-profile.html"><?php echo $rows['pat_fname']; echo " "; echo $rows['pat_lname'];?></a>
                                      </h4>
                                    </td>
                                    <td><?php echo $rows['app_time'];?></td>
                                    <td><?php echo $rows['booking_date'];?></td>
                                    <td><?php echo $rows['clinic_fee'];?></td>
                                  </tr>
                                  <?php
                                    } 
                                  ?>
                                </tbody>
                              </table>
                            </div>
                          </div>
                        </div>
                      </div>
                  <!--**********************End Today Table Tab*******************-->
                  <!--**********************Upcoming Table Tab*******************-->
                      <div id="upcoming_appoint" class="tab-pane fade show">
                        <div class="card card-table mb-0">
                          <div class="card-body">
                            <div class="table-responsive">
                              <table class="table table-hover table-center mb-0">
                                <thead>
                                  <tr>
                                    <th>Patient Name</th>
                                    <th>Appointment Date</th>
                                    <th>Appointment Time</th>
                                    <th>Amount(INR)</th>
                                  </tr>
                                </thead>
                                <tbody>
                                <?php
                                    while($rows1 = mysqli_fetch_array($result1)) {
                                  ?>
                                  <tr>
                                    <td>
                                      <h4 class="table-avatar">
                                        <a href="patient1-profile.html" class="avatar avatar-sm mr-2">
                                          <img class="avatar-img rounded-circle" src="./img/patient/<?php echo $rows1['pat_photo'];?>">
                                        </a>
                                        <a href="patient1-profile.html"><?php echo $rows1['pat_fname']; echo " "; echo $rows1['pat_lname'];?></a>
                                      </h4>
                                    </td>
                                    <td><?php echo $rows1['app_date'];?></td>
                                    <td><?php echo $rows1['app_time'];?></td>
                                    <td><?php echo $rows1['clinic_fee'];?></td>
                                  </tr>
                                  <?php
                                    } 
                                  ?>      
                                </tbody>
                              </table>
                            </div>
                          </div>
                        </div>
                      </div>
                  <!--********************End Upcoming Table Tab*****************-->
                    </div>
                <!--********************End Today table content********************-->