<?php 
require_once('connection.php');

$book=$_POST["booking"];
$sql="SELECT * from doctor_details INNER JOIN doctor_qualification ON doctor_details.regis_id=doctor_qualification.regis_id WHERE doctor_details.regis_id='$book'";
$result = mysqli_query($con, $sql);
$patfetch = mysqli_fetch_assoc($result);
?>        
            <!--**********Scheduling**********-->
                <div class="tab-pane" id="scheduling">
                    <form id="frm-pat" class="form-group" action="./patient.php" method="post">
                        
                        <div class='row'>
                            <div class='col-md-5'>
                                <div class='profile-img'>
                                    <img src="img/doctor/<?php echo $patfetch['doc_photos']; ?>" width='150px' height='150px' alt=''>
                                </div>
                            </div>
                            <div class='col-md-7'>
                                <div class='doc-info-right'>
                                    <div class='doc-info-cont'>
                                        <h4 class='doc-name'>Dr. <?php echo $patfetch['doc_fname'];echo " "; echo $patfetch['doc_mname'];echo " "; echo $patfetch['doc_lname']; ?></h4>
                                        <p class='doc-speciality'><?php echo $patfetch['doc_specialization']; ?></p>
                                        <p class='doc-speciality'><?php echo $patfetch['doc_city']; ?></p>
                                    </div>
                                    <div class='clinic-details'>
                                        <p class='doc-location'><i class='fas fa-map-marker-alt'></i> <?php echo $patfetch['doc_address']; ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row container">
                            <h4 class="font-weight-bold">Pick a time alot</h4>
                            <div class ="form-group col-sm-3 mt-1 px-3">
                                <input type="date" id="appointdate" name="scheduledate" class="datechange" onchange="myFunction(event)">
                            </div>
                        </div>
                    </form>
                

                    <!-- *************List************** -->

                    <div class="show-list mt-3" id="fetchdate">
                    </div>

                    <!-- ***********End List************ -->
                </div>
            <!--**********End Scheduling**********-->
    <script>
        function myFunction(e) {
            var book = e.target.value;
            var book2 = "<?php echo $book?>";
            $.ajax({  
                url:"patient/schedule-book.php",  
                method:"post",  
                data:{booking:book,
                booking2:book2},  
                success:function(data){
                    $('#fetchdate').html(data);
                }
            });  
        }
    </script>