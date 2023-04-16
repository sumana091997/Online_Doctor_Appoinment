<?php
//connect to mysql database
$connection = mysqli_connect("localhost","root","","doconappoint") or die("Error " . mysqli_error($connection));

//fetch data from database
$sql = "select doc_city from doctor_details group by doc_city";
$result = mysqli_query($connection, $sql) or die("Error " . mysqli_error($connection));

$sql1 = "select doc_specialization from doctor_qualification group by doc_specialization";
$result1 = mysqli_query($connection, $sql1) or die("Error " . mysqli_error($connection));
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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.css"/>
    <!--  ************************************************************** -->
        <link rel="stylesheet" href="css/style.css">
        <title>DocOnAppoint</title>
    </head>
    <body>
    <section class="sec1" id="hom"></section>
        <nav class="navbar navbar-expand-md bg-light border-bottom">
            <div class="container">
                    <a href="#" class="navbar-brand font-weight-bold" style="font-size: 1.6rem;color: #15558d;">DocOnAppoint</a>
                    <button type="button" class="navbar-toggler navbar-light" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse ml-5" id="navbarCollapse">
                        <ul class="navbar-nav">
                            <li class="nav-item mx-2">
                                <a class="nav-link" href="#hom">HOME</a>
                            </li>
                            <li class="nav-item mx-2">
                                <a class="nav-link" href="#about">About Us</a>
                            </li>
                            <li class="nav-item mx-2">
                                <a class="nav-link" href="#contact">Contact Us</a>
                            </li>
                            <!-- <li class="nav-item mx-2">
                                <a class="nav-link" href="#other">Others</a>
                            </li> -->
                        </ul>
                        <a href="login.php" class="btn ml-auto logbtn">
                            LOGIN
                        </a>
                    </div>
            </div>
        </nav>
<!-- *********************************end Navbar******************************* -->
<!-- **************************************Search*********************************** -->
        <div class="container" id="search">
            <form class="form-inline m-2 py-2 justify-content-center"  action="search.php" method="POST">
               <div class="input-group ">
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
                <div class="input-group my-1 mx-lg-2 ">
                    <div class="input-group-prepend">
                        <div class="input-group-text "><i class="fas fa-search"></i></div>
                    </div>
                    <input type="text" id="doc_loc" list="doc_list" placeholder="Select Doctor" class="form-control round-0 border-info" name="speci" required="">
                    <datalist id="doc_list">
                    <?php while($row = mysqli_fetch_array($result1)) { ?>
                        <option value="<?php echo $row['doc_specialization']; ?>"><?php echo $row['doc_specialization']; ?></option>
                    <?php } ?>
                </datalist>
                </div>
                <?php mysqli_close($connection); ?>
                <button type="submit" name="search" class="my-1 btn rounded-0 sub-btn">Submit</button>
            </form>
        </div>

<!-- **********************************End Search*********************************** -->
<!-- **********************************Header Photo*********************************** -->
<!--         <div class="img-div">
            <img class="col-img img-fluid divimg" src="image/home2.png">
        </div> -->
        <div class="header-img">
            <section class="header-section">
                <div class="center-div">
                    <h1 class="font-weight-bold">Easy to search doctor</h1>
                    <p>24/7 any time to search doctor.</p>
                    <div class="header-buttons">
                        <a href="#"><i class="fas fa-chevron-circle-down"></i> Know More <i class="fas fa-chevron-circle-down"></i></a>
                    </div>
                </div>
            </section>
        </div>

<!-- **********************************End Header Photo*********************************** -->
<!-- **********************************Slider*********************************** -->
        <div class="container">
            <h2>Book an appointment for an in-clinic consultation</h2>
            <p style="color:black;">Find experienced doctors across all specialties</p>
            <div class="row">
                <div class="col-lg-12">
                    <div id="news-slider" class="owl-carousel">
                        <!-- 1 -->
                        <div class="news-grid">
                            <div class="news-grid-image"><img src="image/general_physician.jpeg" alt=""></div>
                            <div class="news-grid-txt">
                                <h2>Dentist</h2>
                                <a href="#">Explore</a>
                            </div>
                        </div>
                        <!-- 2 -->
                        <div class="news-grid">
                            <div class="news-grid-image"><img src="image/dentist.jpeg" alt=""></div>
                            <div class="news-grid-txt">
                                <h2>Dentist</h2>
                                <a href="#">Explore</a>
                            </div>
                        </div>
                        <!-- 3 -->
                        <div class="news-grid">
                            <div class="news-grid-image"><img src="image/neurologist.jpeg" alt=""></div>
                            <div class="news-grid-txt">
                                <h2>Neurologist</h2>
                                <a href="#">Explore</a>
                            </div>
                        </div>
                        <!-- 4 -->
                        <div class="news-grid">
                            <div class="news-grid-image"><img src="image/cardiologist.jpeg" alt=""></div>
                            <div class="news-grid-txt">
                                <h2>Cardiologist</h2>
                                <a href="#">Explore</a>
                            </div>
                        </div>
                        <!-- 5 -->
                        <div class="news-grid">
                            <div class="news-grid-image"><img src="image/urologist.jpeg" alt=""></div>
                            <div class="news-grid-txt">
                                <h2>Urologist</h2>
                                <a href="#">Explore</a>
                            </div>
                        </div>
                        <!-- 6 -->
                        <div class="news-grid">
                            <div class="news-grid-image"><img src="image/darmatologist.jpeg" alt=""></div>
                            <div class="news-grid-txt">
                                <h2>Darmatologist</h2>
                                <a href="#">Explore</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
<!-- **********************************End Slider*********************************** -->
                <section class="sec1" id="about"></section>
<!-- **********************************About*********************************** -->
        <div class="about-div mt-5 py-5" id="about" style="box-shadow: 0px 2px 5px #888, 0px -2px 5px #888;">
            <div class="container text-center">
                <h1>About Us</h1>
                <div class="row pt-4">
                    <div class="col-12 col-md-6">
                        <h3>Search Doctor, Make an Appointment.</h3>
                        <h5>Discover the best doctors, clinic & hospital the city nearest to you.</h5>
                        
                    </div>
                    <div class="col-12 col-md-6">
                        <img src="image/dr-slider.png" class="img-fluid" style="height: 400px;">
                        <div class="container">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>

<!-- **********************************End About*********************************** -->
<!-- **********************************Clinic and Specialities********************* -->


<!-- **********************************End Clinic and Specialities***************** -->
<!-- **************************************Review********************************** -->
        <div class="text-center pt-5">
            <h1>What our users have to say</h1>
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="carousel-caption">
                            <h5>Very good app. Well thought out about booking/ rescheduling/ canceling an appointment. Also, Doctor's feedback mechanism is good and describes all the basics in a good way.</h5>
                            <div class="card-testimonial">
                                <i class="fas fa-users"></i>
                                <p class="review-text" style="color: black;">Somik Bose</p>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="carousel-caption">
                            <h5 class="review-text">Very helpful. Far easier than doing same things on computer. Allows quick and easy search with speedy booking. Even maintains history of doctors visited.</h5>
                            <div class="card-testimonial">
                                <i class="fas fa-users"></i>
                                <p class="review-text" style="color: black;">Subhra Patra</p>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="carousel-caption">
                            <h5 class="review-text">Very easy to book,maintain history. Hassle free from older versions of booking appointment via telephone.</h5>
                            <div class="card-testimonial">
                                <i class="fas fa-users"></i>
                                <p class="review-text" style="color: black;">Minu</p>
                            </div>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
<!-- *************************************End Review******************************* -->
                    <section class="sec1" id="contact"></section>
<!-- *************************************Contact us******************************* -->
        <div class="contact text-center py-5" id="contact" style="box-shadow: 0px 2px 3px #888, 0px -2px 3px #888;">
            <div class="container">
                <h1>Contact Us</h1>
                <div class="row text-left">
                    <div class="col-md-3 col-12">
                    </div>
                    <div class="col-md-6 col-12">
                        <form>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Your Name</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Email</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Massage</label>
                                <textarea type="textarea" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"></textarea>
                            </div>
                            <button type="submit" class="btn con-sub">Submit</button>
                        </form>
                    </div>
                    <div class="col-md-3 col-12">
                    </div>
                </div> 
            </div>
        </div>
<!-- ***********************************End Contact us***************************** -->
                    <section class="sec1" id="other"></section>
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
        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <!-- Popper JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script src="https://code.jquery.com/jquery-1.12.4.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js" crossorigin="anonymous"></script>
        
        <script type="text/javascript">
            $(document).ready(function(){
                $("#news-slider").owlCarousel({
                    items:3,
                    navigation:true,
                    navigationText:["",""],
                    autoPlay:true
                });
            });
        </script>
    </body>
</html>