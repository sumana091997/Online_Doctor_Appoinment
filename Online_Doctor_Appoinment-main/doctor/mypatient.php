<?php 
    require_once('connection.php');

    //<sql for my patient update>
    $query = "SELECT patient_details.pat_photo,patient_details.pat_fname,patient_details.pat_lname,patient_details.pat_mobile,patient_details.pat_email,patient_appoint.clinic_name,patient_appoint.app_date,patient_appoint.app_time,patient_appoint.booking_date FROM patient_appoint INNER JOIN patient_details ON patient_appoint.pat_email=patient_details.pat_email WHERE patient_appoint.doc_email='".$_SESSION['docemail']."'";
    //<check for my patient>
    $result = mysqli_query($con, $query);

?>
<!--************************My Patient*****************************-->
<div class="tab-pane" id="mypatients">
                    <div class="card card-table mb-0">
                      <div class="card-body">
                        <div class="table-responsive">
                          <table class="table table-hover table-center mb-0">
                            <thead>
                              <tr>
                                <th>Patient Name</th>
                                <th>Phone No.</th>
                                <th>Email ID</th>
                                <th>Clinic Name</th>
                                <th>Appointment Date</th>
                                <th>Appointment Time</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php 
                                    while($rows = mysqli_fetch_array($result)) {
                              ?>
                              <tr>
                                <td>
                                  <h4 class="table-avatar">
                                    <a href="patient12-profile.html" class="avatar avatar-sm mr-2">
                                      <img class="avatar-img rounded-circle" src="./img/patient/<?php echo $rows['pat_photo'];?>">
                                    </a>
                                    <a href="patient12-profile.html"><?php echo $rows['pat_fname']," " ,$rows['pat_lname'] ; ?></a>
                                  </h4>
                                </td>
                                <td><?php echo $rows['pat_mobile']; ?></td>
                                <td><?php echo $rows['pat_email']; ?></td>
                                <td><?php echo $rows['clinic_name']; ?></td>
                                <td><?php echo $rows['app_date']; ?></td>
                                <td><?php echo $rows['app_time']; ?></td>
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
                <!--****************************End My Patient************************-->