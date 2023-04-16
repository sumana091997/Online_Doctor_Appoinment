<?php
require_once('connection.php');


 // For fetching data in dashboard
    $query = "SELECT doctor_details.doc_photos,doctor_details.regis_id,doctor_details.doc_fname,doctor_details.doc_mname,doctor_details.doc_lname,patient_appoint.app_date,patient_appoint.app_time,patient_appoint.booking_date,patient_appoint.pat_email, doctor_details.doc_email, patient_appoint.doc_email FROM patient_appoint INNER JOIN doctor_details ON patient_appoint.doc_email=doctor_details.doc_email WHERE patient_appoint.pat_email='".$_SESSION['patemail']."'";
    $result = mysqli_query($con, $query);
?>

	 <!----tab Menu------>
         <nav class="user-tabs mb-4">
            <ul class="nav nav-tabs nav-tabs-bottom nav-justified nav-fill">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#pat_appointments" data-toggle="tab">Appointments</a>
                 </li>
                 <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="#pat_prescriptions" data-toggle="tab">Prescriptions</a>
                 </li>
             </ul>
        </nav>
            <!-----table content-------->
        <div class="tab-content pt-2">
                <!-- Appointment Tab -->
            <div id="pat_appointments" class="tab-pane fade show active">
                <div class="card card-table mb-0">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-center mb-0">
                                <thead>
                                    <tr>
                                        <th>Doctor name</th>
                                        <th>Appt Date</th>
                                        <th>Time</th>
                                        <th>Booking Date</th>
                                        <th></th>
                                    </tr>
                                    <?php 
                                        while($rows = mysqli_fetch_assoc($result)){
                                    ?>
                                    <tr>
                                        <td><?php echo $rows['doc_fname'], " " ,$rows['doc_lname'] ; ?></td>
                                        <td><?php echo $rows['app_date']; ?></td>
                                        <td><?php echo $rows['app_time']; ?></td>
                                        <td><?php echo $rows['booking_date']; ?></td>              
                                        <td><button class="btn btn-primary view_detail" id="<?php echo $rows['regis_id']; ?>">View Profile</button></td>
                                    </tr>
                                    <?php
                                        }
                                    ?>
                                </thead>                  
                            </table>
                            <!----------------------------------- Modal ------------------------------------>
                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <!----------------------------------------------------------MODAL HEADER---------------------------------------------------------------->
                                        <div class="modal-header bg-info">
                                            <h5 class="modal-title" id="staticBackdropLabel" style="font-size: 1.6rem;color: #ffffff;">DOCTOR"S PROFILE</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <!----------------------------------------------------------MODAL HEADER---------------------------------------------------------------->
                                        <!----------------------------------------------------------MODAL BODY---------------------------------------------------------------->
                                        <div class="modal-body bg-light" id="doctor_detail">
                                        </div>
                                        <!----------------------------------------------------------MODAL BODY---------------------------------------------------------------->
                                    </div>
                                                   
                                </div>
                            </div>
                            <!----------------------------------- Modal ------------------------------------>
                        </div>
                    </div>
                </div>
            </div>
                <!-- prescription Tab -->
            <div id="pat_prescriptions" class="tab-pane fade">
                <div class="card card-table mb-0">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-center mb-0">
                                <thead>
                                    <tr>   
                                        <th>Prescription Id</th>
                                        <th>Doctor name</th>
                                        <th>Appoinment Date</th>
                                        <th></th>
                                    </tr>
                                    <?php 
                                        while($rows = mysqli_fetch_assoc($result)){
                                    ?>
                                    <tr>
                                        <td><?php echo $rows['doc_fname'], " " ,$rows['doc_lname'] ; ?></td>
                                        <td><?php echo $rows['app_date']; ?></td>
                                        <td><?php echo $rows['app_time']; ?></td>
                                        <td><?php echo $rows['booking_date']; ?></td>              
                                        <td><button class="btn btn-primary">View Profile</button></td>
                                    </tr>
                                    <?php
                                        }
                                    ?>
                                </thead>
                                                            
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <script>  
        $(document).ready(function(){  
            $('.view_detail').click(function(){  
                var doctor_id = $(this).attr("id");  
                $.ajax({  
                    url:"patient/modal-fetch.php",  
                    method:"post",  
                    data:{doctor_id:doctor_id},  
                    success:function(data){  
                        $('#doctor_detail').html(data);  
                        $('#myModal').modal("show");  
                    }  
                });  
            });  
        });  
    </script>