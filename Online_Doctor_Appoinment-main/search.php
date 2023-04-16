<?php 
    require_once('connection.php');
    //fetch data from database
    $sql = "select doc_city from doctor_details group by doc_city";
    $result = mysqli_query($con, $sql) or die("Error " . mysqli_error($con));

    $sql1 = "select doc_specialization from doctor_qualification group by doc_specialization";
    $result1 = mysqli_query($con, $sql1) or die("Error " . mysqli_error($con));
?>
<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <!-- Popper JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/search.css">
        <title>DocOnAppoint</title>
    </head>
    <body>
        <nav class="navbar navbar-expand-md bg-light border-bottom">
            <div class="container">
                    <a href="#" class="navbar-brand font-weight-bold" style="font-size: 1.6rem;color: #15558d;">DocOnAppoint</a>
                    <button type="button" class="navbar-toggler navbar-light" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse ml-5" id="navbarCollapse">
                        <ul class="navbar-nav">
                            <li class="nav-item mx-2">
                                <a class="nav-link" href="index.php">HOME</a>
                            </li>
                            <li class="nav-item mx-2">
                                <a class="nav-link" href="#">DOCTORS</a>
                            </li>
                            <li class="nav-item mx-2">
                                <a class="nav-link" href="#">PATIENT</a>
                            </li>
                            <li class="nav-item mx-2">
                                <a class="nav-link" href="#">ADMIN</a>
                            </li>
                        </ul>
                        <a href="login.php" class="btn ml-auto logbtn">
                            LOGIN
                        </a>
                    </div>
            </div>
        </nav>
<!-- *********************************end Navbar******************************* -->
<!-- **************************************Search*********************************** -->
<div class="container border-bottom pb-4" id="search">
            <form class="form-inline">
                <div class="input-group m-2 py-2 justify-content-center">
                    <div class="input-group-prepend">
                        <div class="input-group-text my-1 "><i class="fas fa-map-marker-alt"></i></div>
                    </div>
                    <input type="text" id="sel_loc" list="loc_list" placeholder="Location" class="my-1 form-control round-0 border-info" name="loca">
                    <datalist id="loc_list">
                    <?php while($row = mysqli_fetch_array($result)) { ?>
                        <option value="<?php echo $row['doc_city']; ?>"><?php echo $row['doc_city']; ?></option>
                    <?php } ?>
                    </datalist>
                </div>
                <div class="input-group my-1 mx-lg-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text "><i class="fas fa-search"></i></div>
                    </div>
                    <input type="text" id="doc_spe" list="doc_list" placeholder="Select Doctor" class="form-control round-0 border-info" name="speci" required="">
                    <datalist id="doc_list">
                    <?php while($row = mysqli_fetch_array($result1)) { ?>
                        <option value="<?php echo $row['doc_specialization']; ?>"><?php echo $row['doc_specialization']; ?></option>
                    <?php } ?>
                    </datalist>
                </div>
            </form>
        </div>
<!-- **********************************End Search*********************************** -->


<!-- ************************************List*************************************** -->

        <div class="show-list mt-3" id="fetch_data">
        
        </div>

<!-- **********************************End List************************************* -->
<!-- *************************************Footer*********************************** -->
<footer class="footer pt-2">
        <main class="container-fluid text-light">
            <div class="row px-3 py-5">
                <div class="col-md-5 col-12">
                    <div class="col-sm">
                        <a href="#" class="navbar-brand font-weight-bold text-light" style="font-size: 30px">DocOnAppoint</a>
                    </div>

                    <div>
                        <ul style="display: inline-flex;list-style: none;">
                            <li>
                                <a class="nav-link text-light fa-lg" href="">
                                    <i class="fab fa-facebook-square"></i>
                                </a>
                            </li>
                            <li>
                                <a class="nav-link text-light fa-lg" href="">
                                    <i class="fab fa-instagram"></i>
                                </a>
                            </li>
                            <li>
                                <a class="nav-link text-light fa-lg" href="">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>
                            </li>
                            <li>
                                <a class="nav-link text-light fa-lg" href="">
                                    <i class="fas fa-at"></i>
                                </a>
                            </li>
                        </ul>
                    </div>

                </div>

                <div class="col-md-5 col-12">
                    <p class="navbar-brand font-weight-bold disabled" style="font-size: 20px">Links</p>
                    <ul style="list-style: none;">
                        <li>
                            <a class="nav-link text-light" href="#search">
                                <i class="bi bi-chevron-double-right"> Search</i>
                            </a>
                        </li>
                        <li>
                            <a class="nav-link text-light" href="#about">
                                <i class="bi bi-chevron-double-right"> About</i>
                            </a>
                        </li>
                        <li>
                            <a class="nav-link text-light" href="#contact">
                                <i class="bi bi-chevron-double-right"> Contact</i>
                            </a>
                        </li>
                        <!-- <li>
                            <a class="nav-link text-light" href="#">
                                <i class="bi bi-chevron-double-right"> Admin</i>
                            </a>
                        </li> -->
                    </ul>
                </div>
                <div class="col-md-2 col-12">
                    <p class="navbar-brand font-weight-bold disabled" style="font-size: 20px">Contact</p>
                    <dl>
                        <i class="bi bi-geo-alt-fill"> Kolkata, West Bengal</i>
                    </dl>
                    <dl>
                        <i class="bi bi-envelope-fill"> abc@gmail.com</i>
                    </dl>
                    <dl>
                        <i class="bi bi-telephone-fill"> 9281746367</i>
                    </dl>
                </div>
            </div>
                <div class="copyrights">
                    <div class="row px-1 pt-1 border-top">
                        <div class="col-md-6 col-lg-6"></div>
                            <div class="col-md-6 col-lg-6 text-right">
                                <ul class="policymenu" style="display: inline-flex;list-style: none;">
                                    <li class="pr-2 border-right">
                                        <a href="#" class="text-light">Terms and Conditions</a>
                                    </li>

                                    <li class="pl-2">
                                        <a href="#" class="text-light">Policy</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
        </main>
    </footer>
<!-- ************************************End Footer********************************* -->



        <!-- **********************************<script>*********************************** -->
<script>
    $(document).ready(function(){
        $('#doc_spe').on("keyup",function(){
            var search_term=$(this).val();
            var search_term2=$('#sel_loc').val();
            $.ajax({
                url:"patient/live-search.php",
                type: "POST",
                data: {search:search_term,
                    search2:search_term2},
                success: function(data){
                    $("#fetch_data").html(data);
                }
            });
        });
        $('#sel_loc').on("keyup",function(){
            var search_term=$('#doc_spe').val();
            var search_term2=$(this).val();
            $.ajax({
                url:"patient/live-search.php",
                type: "POST",
                data: {search:search_term,
                    search2:search_term2},
                success: function(data){
                    $("#fetch_data").html(data);
                }
            });
        });
    });
    
</script>
    </body>
</html>