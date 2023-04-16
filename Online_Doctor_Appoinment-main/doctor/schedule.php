<?php
require_once('connection.php');

//<sql for clinic list dropdown in slot scheduling inserting form>
$query = "SELECT clinic_name FROM doctor_clinic cli INNER JOIN doctor_details det ON cli.regis_id = det.regis_id WHERE det.doc_email = '".$_SESSION['docemail']."'";
//<sql for clinic list menu in slot scheduling inserting form>
$query2 = "SELECT cli.regis_id,cli.clinic_name FROM doctor_clinic cli INNER JOIN doctor_details det ON cli.regis_id = det.regis_id WHERE det.doc_email = '".$_SESSION['docemail']."'";
//<sql for show schedule table>
$query3 = "SELECT cli.regis_id,cli.clinic_name FROM doctor_clinic cli INNER JOIN doctor_details det ON cli.regis_id = det.regis_id WHERE det.doc_email = '".$_SESSION['docemail']."'";

//<check for clinic list dropdown in slot scheduling inserting form>
$result = mysqli_query($con, $query);
//<check for clinic list menu in slot scheduling inserting form>
$result2 = mysqli_query($con, $query2);
//<check for show schedule table>
$result3 = mysqli_query($con, $query3);
?>

        <!--*****************************Scheduling***************************-->
                <div class="tab-pane" id="scheduling">
                    <h2 class="font-weight-bold">This is Scheduling</h2>
                    <form id="frm-pat" class="form-group" action="./doctor.php" method="post">
                        <div class="row">
                            <div class ="form-group col-sm-3 mt-1 px-3">
                                <label for="appointdate">Date*</label>
                                <input type="date" id="appointdate" name="scheduledate">
                            </div>
                            <div class="form-group col-sm-5">
                                <div class="form-group mt-0 mx-auto">
                                    <select class="form-control" id="clinicname" name="clinicname" require>
                                        <option selected=true disabled="disabled">Select Clinic/Chamber</option>
                                            <?php
                                            while($rows = mysqli_fetch_array($result)) {
                                            ?>
                                        <option value="<?php echo $rows['clinic_name']; ?>"><?php echo $rows['clinic_name']; ?></option>
                                        <?php
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-sm-4">
                                <label for="inputname">Visiting time starts</label>
                                <input type="time" id="time" name="visittime">
                            </div>
                        </div>
                        <div class="form-group mt-4">
                            <input type="submit" class="btn btn-primary btn-sm px-5" name="save" id="schedulerefresh" value="Submit">
                        </div>
                    </form>
                    <!------------------------------form ends------------------------------>
                    <hr>
                        <!------------------------Navbar For Clinic------------------------->
                    <nav class="user-tabs mb-4">
                      <ul class="nav nav-tabs nav-tabs-bottom nav-justified nav fill">
                    <?php 
                        $i=1;
                        while($rows2 = mysqli_fetch_array($result2)) {
                            if($i==1){
                    ?>
                        <li class="nav-item">
                          <a class="nav-link active" aria-current="page" href="#clinic<?php echo $i;?>" data-toggle="tab"><?php echo $rows2['clinic_name'];?></a>
                        </li>
                    <?php
                            }
                            else{
                    ?>
                        <li class="nav-item">
                          <a class="nav-link" aria-current="page" href="#clinic<?php echo $i;?>" data-toggle="tab"><?php echo $rows2['clinic_name'];?></a>
                        </li>
                    <?php
                            }
                        $i=$i+1;
                        }
                    ?>
                      </ul>
                    </nav>
                        <!----------------------End Navbar For Clinic----------------------->
                    <div class="tab-content pt-2">
                    <?php
                        $i=1;
                        while($rows3 = mysqli_fetch_array($result3)) {
                            if($i==1){
                    ?>
                        <!------------------------table clinic name 1 content------------------------>
                        <div id="clinic<?php echo $i;?>" class="tab-pane fade show active">
                            <div class="card card-table mb-0">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-hover table-center mb-2">
                                            <thead>
                                                <tr>
                                                    <th>DATE</th>
                                                    <th>Visiting times</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    $query4 ="SELECT doctor_scheduling.id,doctor_scheduling.schedule_date,doctor_scheduling.visit_time,doctor_scheduling.clinic_name FROM doctor_scheduling INNER JOIN doctor_clinic ON doctor_scheduling.regis_id = doctor_clinic.regis_id AND doctor_scheduling.clinic_name = doctor_clinic.clinic_name INNER JOIN doctor_details ON doctor_details.regis_id = doctor_clinic.regis_id WHERE doctor_details.doc_email = '".$_SESSION['docemail']."' AND doctor_scheduling.clinic_name= '".$rows3['clinic_name']."' ORDER BY doctor_scheduling.schedule_date";
                                                    $result4 = mysqli_query($con, $query4);
                                                    while($rows4=mysqli_fetch_array($result4)){
                                                ?>
                                                <tr>
                                                    <td><?php echo $rows4['schedule_date']; ?></td>
                                                    <td><?php echo $rows4['visit_time']; ?></td>
                                                    <td><a href="./doctor.php?id=<?php echo $rows4['id']; ?>" class="btn btn-danger btn-sm px=5" role="button" aria-pressed="true">DELETE</a></td>
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
                    <?php
                            }
                            else{
                    ?>
                        <div id="clinic<?php echo $i;?>" class="tab-pane fade show">
                            <div class="card card-table mb-0">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-hover table-center mb-2">
                                            <thead>
                                                <tr>
                                                    <th>DATE</th>
                                                    <th>Visiting times</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    $query4 ="SELECT doctor_scheduling.id,doctor_scheduling.schedule_date,doctor_scheduling.visit_time,doctor_scheduling.clinic_name FROM doctor_scheduling INNER JOIN doctor_clinic ON doctor_scheduling.regis_id = doctor_clinic.regis_id AND doctor_scheduling.clinic_name = doctor_clinic.clinic_name INNER JOIN doctor_details ON doctor_details.regis_id = doctor_clinic.regis_id WHERE doctor_details.doc_email = '".$_SESSION['docemail']."' AND doctor_scheduling.clinic_name= '".$rows3['clinic_name']."' ORDER BY doctor_scheduling.schedule_date";
                                                    $result4 = mysqli_query($con, $query4);
                                                    while($rows4=mysqli_fetch_array($result4)){
                                                ?>
                                                <tr>
                                                    <td><?php echo $rows4['schedule_date']; ?></td>
                                                    <td><?php echo $rows4['visit_time']; ?></td>
                                                    <td><a href="./doctor.php?id=<?php echo $rows4['id']; ?>" class="btn btn-danger btn-sm px=5" role="button" aria-pressed="true">DELETE</a></td>
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
                    <?php
                            }
                            $i++;
                        }
                    ?>
                    </div>
                </div>
                <!--*****************************End Scheduling**********************-->