<?php
require_once('connection.php');
if(isset($_POST["doctor_id"]))  
{  
     $output = '';
     $query = "SELECT * FROM doctor_details det INNER JOIN doctor_qualification qua on det.regis_id=qua.regis_id where det.regis_id = '".$_POST["doctor_id"]."'";  
     $result = mysqli_query($con, $query);
     $row = mysqli_fetch_array($result);
     $output .= "<div class='container'>
                    <div class='row'>
                        <div class='col-md-5'>
                            <div class='profile-img'>
                                <img src='img/doctor/{$row["doc_photos"]}' width='150px' height='150px' alt=''>
                            </div>
                        </div>
                        <div class='col-md-7'>
                            <div class='doc-info-right'>
                                <div class='doc-info-cont'>
                                    <h4 class='doc-name'>Dr. {$row["doc_fname"]} {$row["doc_mname"]} {$row["doc_lname"]}</h4>
                                    <p class='doc-speciality'>{$row["doc_specialization"]} </p>
                                    <p class='doc-speciality'>{$row["experience_details"]} Years Experience Overall</p>
                                </div>
                                <div class='clinic-details'>
                                    <p class='doc-location'><i class='fas fa-map-marker-alt'></i> {$row["doc_address"]}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class='card'>
                        <div class='card-body'>
                            <nav class='user-tabs mb-4'>
                                <ul class='nav nav-tabs nav-tabs-bottom nav-justified'>
                                    <li class='nav-item'>
                                        <a class='nav-link active' href='#doc_overview' data-toggle='tab'>Overview</a>
                                    </li>
                                    <li class='nav-item'>
                                        <a class='nav-link clinic' id={$row["regis_id"]} href='#doc_locations' data-toggle='tab'>Clinic Details</a>
                                    </li>
                                </ul>
                            </nav>
                            
                            <div class='tab-content pt-0'>
                                <!----------------------------------------------------------MY BIO---------------------------------------------------------------->
                                <div role='tabpanel' id='doc_overview' class='tab-pane fade show active'>
                                    <div class='row'>
                                        <div class='col-md-12 col-lg-9'>
                                            <div class='widget about-widget'>
                                                <h4 class='widget-title'>About Me</h4>
                                                <p class='doc-speciality'>{$row["doc_bio"]} </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            
                                <!----------------------------------------------------------CLINIC DETAILS---------------------------------------------------------------->
                                <div role='tabpanel' id='doc_locations' class='tab-pane fade'>
                                
                                </div>
                            </div>
                        </div>
                    </div>
                </div>";
     echo $output;
}
?>
<script>  
 $(document).ready(function(){  
      $('.clinic').click(function(){  
           var doctor_id = $(this).attr("id");  
           $.ajax({  
                url:"patient/clinic-fetch.php",  
                method:"post",  
                data:{doctor_id:doctor_id},  
                success:function(data){  
                     $('#doc_locations').html(data);
                }  
           });  
      });  
 });  
 </script>