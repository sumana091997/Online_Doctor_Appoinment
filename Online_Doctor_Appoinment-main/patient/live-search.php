<?php 
require_once('connection.php');

$search_value=$_POST["search"];
$search_value2=$_POST["search2"];
$sql="SELECT * from doctor_qualification INNER JOIN doctor_details ON doctor_qualification.regis_id=doctor_details.regis_id WHERE doctor_qualification.doc_specialization LIKE '%{$search_value}%' AND doctor_details.doc_city LIKE '%{$search_value2}%'";
$result=mysqli_query($con,$sql);


$output="";
if(mysqli_num_rows($result)>0){
    while($row=mysqli_fetch_assoc($result)){
        $output.="<div class='container'>
                    <div class='row py-4 border-bottom'>
                        <div class='col-md-12 col-lg-4'>
                            <img class='' height='150px' width='150px' src='img/doctor/{$row["doc_photos"]}'>
                        </div>
                        <div class='col-md-12 col-lg-4'>
                            <a href='' style='text-decoration: none;'><h2>Dr. {$row["doc_fname"]} {$row["doc_mname"]} {$row["doc_lname"]}</h2></a>
                            <p style='color:black;font-size: 23px;'>{$row["doc_specialization"]}</p>
                            <p style='color:black;font-size: 23px;'><b>{$row["experience_details"]}</b> year experience.</p>
                            <p style='color:black;'>{$row["doc_city"]}</p>
                            <p style='color:black;'><b>Contact: {$row["doc_phone"]}</b></p>
                        </div>
                        <div class='col-md-12 col-lg-3'>
                            <div class='row my-3'>
                                <div class='col-12'>
                                    <input type='button' name='view' value='View Profile' id='{$row["regis_id"]}' class='btn btn-info btn-xs view_detail' />
                                    <!----------------------------------- Modal ------------------------------------>
                                    <div class='modal fade' id='myModal' tabindex='-1' role='dialog' aria-labelledby='exampleModalLongTitle' aria-hidden='true'>
                                        <div class='modal-dialog modal-dialog-centered'>
                                            <div class='modal-content'>
                                                <!----------------------------------------------------------MODAL HEADER---------------------------------------------------------------->
                                                <div class='modal-header bg-info'>
                                                    <h5 class='modal-title' id='staticBackdropLabel' style='font-size: 1.6rem;color: #ffffff;'>DOCTOR'S PROFILE</h5>
                                                    <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                                        <span aria-hidden='true'>&times;</span>
                                                    </button>
                                                </div>
                                                    <!----------------------------------------------------------MODAL HEADER---------------------------------------------------------------->
                                                    <!----------------------------------------------------------MODAL BODY---------------------------------------------------------------->
                                                <div class='modal-body bg-light' id='doctor_detail'>
                                                </div>
                                                   <!----------------------------------------------------------MODAL BODY---------------------------------------------------------------->
                                            </div>
                                                   
                                        </div>
                                    </div>
                                                   <!----------------------------------------------------------MODAL---------------------------------------------------------------->
                                </div>
                            </div>
                            <div class='row my-3'>
                                <div class='col-12'>
                                    <a type='submit' id='{$row["regis_id"]}' class='booking btn ml-auto shedulebtn btn-info btn-xs' style='width: 226px;height: 74px;' name='book'>
                                        <i class='fas fa-calendar-day'></i>
                                        Book Appointment<br> No Booking Fee
                                    </a>
                                </div>
                                <!----------------------------------- Modal ------------------------------------>
                                    <div class='modal fade' id='myModalbook' tabindex='-1' role='dialog' aria-labelledby='exampleModalLongTitle' aria-hidden='true'>
                                        <div class='modal-dialog modal-dialog-centered'>
                                            <div class='modal-content'>
                                                <!----------------------------------------------------------MODAL HEADER---------------------------------------------------------------->
                                                <div class='modal-header bg-info'>
                                                    <h2 class='modal-title' id='staticBackdropLabel' style='font-size: 1.6rem;color: #ffffff;'>Book Appointment</h2>
                                                    <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                                        <span aria-hidden='true'>&times;</span>
                                                    </button>
                                                </div>
                                                    <!----------------------------------------------------------MODAL HEADER---------------------------------------------------------------->
                                                    <!----------------------------------------------------------MODAL BODY---------------------------------------------------------------->
                                                <div class='modal-body bg-light' id='doctor_book'>
                                                </div>
                                                   <!----------------------------------------------------------MODAL BODY---------------------------------------------------------------->
                                            </div>
                                                   
                                        </div>
                                    </div>
                                    <!----------------------------------------------------------MODAL---------------------------------------------------------------->
                                
                            </div>
                        </div>
                    </div>
                </div>";
    }
    echo $output;
}
?>
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
        $('.booking').click(function(){  
            var book = $(this).attr("id");  
            $.ajax({  
                url:"patient/shedule-load.php",  
                method:"post",  
                data:{booking:book},  
                success:function(data){  
                    $('#doctor_book').html(data);  
                    $('#myModalbook').modal("show");  
                }  
            });  
        });  
    });  
 </script>
            