<?php
require_once('connection.php');
echo $_POST["booking"];
echo $_POST["booking2"];
$query2 = "SELECT cli.regis_id,cli.clinic_name FROM doctor_clinic cli INNER JOIN doctor_details det ON cli.regis_id = det.regis_id WHERE det.regis_id = '".$_POST["booking2"]."'";
$result2 = mysqli_query($con, $query2);
$query3 = "SELECT cli.regis_id,cli.clinic_name FROM doctor_clinic cli INNER JOIN doctor_details det ON cli.regis_id = det.regis_id WHERE det.regis_id = '".$_POST["booking2"]."'";
$result3 = mysqli_query($con, $query3);
?>
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
                                                    <th>Visiting times</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    $query4 ="SELECT doctor_scheduling.visit_time,doctor_scheduling.regis_id,doctor_scheduling.id FROM doctor_scheduling WHERE doctor_scheduling.schedule_date= '".$_POST["booking"]."' AND doctor_scheduling.regis_id='".$_POST["booking2"]."' AND doctor_scheduling.clinic_name= '".$rows3['clinic_name']."' ORDER BY doctor_scheduling.visit_time";
                                                    $result4 = mysqli_query($con, $query4);
                                                    while($rows4=mysqli_fetch_array($result4)){
                                                ?>
                                                <tr>
                                                    
                                                        <td><?php echo $rows4['visit_time']; ?></td>
                                                        <td>
                                                            <form action="patient.php" method="POST">
                                                            <?php
                                                                $_SESSION['bookid'] = $rows4['id'];
                                                            ?>
                                                                <input type="submit" class="btn btn-success btn-sm px=5" role="button" aria-pressed="true" value="Confirm" name="sche">
                                                            </form>
                                                        </td>
                                                    
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
                                                    <th>Visiting times</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    $query4 ="SELECT doctor_scheduling.visit_time,doctor_scheduling.regis_id,doctor_scheduling.id FROM doctor_scheduling WHERE doctor_scheduling.schedule_date= '".$_POST["booking"]."' AND doctor_scheduling.regis_id='".$_POST["booking2"]."' AND doctor_scheduling.clinic_name= '".$rows3['clinic_name']."' ORDER BY doctor_scheduling.visit_time";
                                                    $result4 = mysqli_query($con, $query4);
                                                    while($rows4=mysqli_fetch_array($result4)){
                                                ?>
                                                <tr>
                                                    
                                                        <td><?php echo $rows4['visit_time']; ?></td>
                                                        <td>
                                                            <form action="patient.php" method="POST">
                                                                <?php
                                                                    $_SESSION['bookid'] = $rows4['id'];
                                                                ?>
                                                                <input type="submit" class="btn btn-success btn-sm px=5" role="button" aria-pressed="true" value="Confirm" name="sche">
                                                            </form>
                                                        </td>
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