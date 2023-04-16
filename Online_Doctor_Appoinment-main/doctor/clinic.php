<?php
require_once('connection.php');
?>                        


        <!--*****************************Clinic***************************-->
                        
                            <h3>Clinic/Chamber Details(Only Three clinic details add at a time.)</h3>
                            <hr>
                            <form id="frm-cli" class="form-group" action="./doctor.php" method="post">
                                <div class="row">
                                    <div class="col-sm-8 py-1">
                                        <input type="text" class="form-control" placeholder="Clinic/Chamber Name" name="cliname">
                                    </div>
                                    <div class="col-sm-4 py-1">
                                        <select class="form-control" id="clinictype" name="clinictype">
                                            <option selected=true disabled="disabled">Select Type</option>
                                            <option value="Clinic">Clinic</option>
                                            <option value="Personal Chamber">Personal Chamber</option>
                                            <option value="Dispensary">Dispensary</option>
                                        </select>
                                    </div>
                                </div>
                                <br>
                                    <!----------------------->
                                <div class="row">
                                    <div class="col-sm-4 py-1">
                                        <label for="inputname">Opening time</label>
                                        <input type="time" id="clinic1start" name="clioptime">
                                    </div>
                                    <div class="col-sm-4 py-1">
                                        <label for="time"> Closing time</label>
                                        <input type="time" id="clinic1end" name="clcltime">
                                    </div>
                                    <div class="col-sm-4 py-1">
                                        <input type="text" class="form-control" placeholder="Enter your service fees.(Rs:) " name="clifee">
                                    </div>
                                </div>
                                <br>
                                    <!---------------------->
                                <div class="row">
                                    <div class="form-floating px-3 col-sm-6">
                                        <textarea class="form-control" row="4" cols="25" onkeypress="auto_grow(this);" onkeyup="auto_grow(this);" placeholder="Full Address with pin code" name="cliadd" style="margin-top: 20px; resize: none; overflow: hidden;"></textarea> 
                                    </div>
                                    <div class="col-sm-2 py-4">
                                        <input type="submit" class="btn btn-primary btn-sm px-5 form-control" value="Submit" name="clinicsubmit" id="clinicdetail">
                                    </div>
                                </div>
                            </form>
                            <hr>
        <!--***************************End Clinic**************************-->                    
                            <div class="card card-table mb-0">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-hover table-center mb-2">
                                            <thead>
                                                <tr>
                                                    <th>Clinic/Chamber Name</th>
                                                    <th>Type</th>
                                                    <th>Opening Time</th>
                                                    <th>Closing Time</th>
                                                    <th>Fees</th>
                                                    <th>Address</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    $query ="SELECT * FROM `doctor_clinic` INNER JOIN `doctor_details` ON doctor_clinic.regis_id=doctor_details.regis_id WHERE doctor_details.doc_email='".$_SESSION['docemail']."'";
                                                    $result = mysqli_query($con, $query);
                                                    while($rows=mysqli_fetch_array($result)){
                                                ?>
                                                <tr>
                                                    <td><?php echo $rows['clinic_name']; ?></td>
                                                    <td><?php echo $rows['clinic_type']; ?></td>
                                                    <td><?php echo $rows['clinic_opening_time']; ?></td>
                                                    <td><?php echo $rows['clinic_closing_time']; ?></td>
                                                    <td><?php echo $rows['clinic_fee']; ?></td>
                                                    <td><?php echo $rows['clinic_address']; ?></td>
                                                    <td><a href="./doctor.php?clinic_id=<?php echo $rows['clinic_id']; ?>" class="btn btn-danger btn-sm px=5" role="button" aria-pressed="true">DELETE</a></td>
                                                </tr>
                                                <?php
                                                    }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>