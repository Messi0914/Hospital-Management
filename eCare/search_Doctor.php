<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
    <meta name="author" content="">

    <title>Search Bar using PHP</title>

    <link rel="stylesheet" href="css/style2.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
        
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">

    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="css/bootstrap-icons.css" rel="stylesheet">

    <link href="css/owl.carousel.min.css" rel="stylesheet">

    <link href="css/owl.theme.default.min.css" rel="stylesheet">

    <link href="css/templatemo-medic-care.css" rel="stylesheet">

    <link rel="stylesheet" href="css/style2.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.bundle.min.js"></script>


</head>
<body>


            <nav class="navbar navbar-expand-lg bg-light fixed-top shadow-lg">
                <div class="container">
                    <a class="navbar-brand mx-auto d-lg-none" href="index.html">
                        eCare
                        <strong class="d-block">Health Specialist</strong>
                    </a>

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav mx-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="index.php">Home</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="#about">About</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="search_Doctor.php">To Know</a>
                            </li>

                            <a class="navbar-brand d-none d-lg-block" href="index.php">
                                eCare
                                <strong class="d-block">Health Specialist</strong>
                            </a>

                            <li class="nav-item">
                                <a class="nav-link" href="register.php">Registration</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="#booking">Make an Appointment</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="login.php">User Profile</a>
                            </li>
                        </ul>
                    </div>

                </div>
            </nav>    
<br><br><br><br>
 <div class="search__container">
                    <p class="search__title">
                        We Take Care Of Your Health
                    </p>

<form method="post">
<center>
    <input class="search__input" type="text" name="search" placeholder="Search Your Doctor">
    <input class="btn btn-outline-dark" type="submit" name="submit" value="SEARCH">
</center>
</form>
 </div>

   
<?php

$con = new PDO("mysql:host=localhost;dbname=user_db",'root','');

if (isset($_POST["submit"])) {
    $str = $_POST["search"];
    $sth = $con->prepare("SELECT * FROM `docter_details` WHERE name = '$str'");

    $sth->setFetchMode(PDO:: FETCH_OBJ);
    $sth -> execute();

    if($row = $sth->fetch())
    {
        ?>
        <br><br><br>
        <section class="section about-section gray-bg" id="about">
            <div class="container">
                <div class="row align-items-center flex-row-reverse">
                    <div class="col-lg-6">
                        <div class="about-text go-to">
                            <h3 class="dark-color">Special Note</h3>
                            <h6 class="theme-color lead"><?php echo $row->role;?> in <?php echo $row->location;?></h6>
                            <p><?php echo $row->aboutme;?></p>

                            <div class="row about-list">
                                <div class="col-md-6">
                                    <div class="media">
                                        <label>Name</label>
                                        <p><?php echo $row->name;?></p>
                                    </div>

                                    <div class="media">
                                        <label>Role</label>
                                        <p><?php echo $row->role;?></p>
                                    </div>

                                    <div class="media">
                                        <label>Location</label>
                                        <p><?php echo $row->location;?></p>
                                    </div>

                                    </div>
                                    <div class="col-md-6">
                                    <div class="media">
                                        <label>E-mail</label>
                                        <p><?php echo $row->email;?></p>
                                    </div>
                                    <div class="media">
                                        <label>Phone</label>
                                        <p><?php echo $row->phone;?></p>
                                    </div>
                                    <div class="media">
                                        <label>Hospital</label>
                                        <p><?php echo $row->hospital;?></p>
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="about-avatar">
                            <img src="https://bootdey.com/img/Content/avatar/avatar7.png" title="" alt="">
                        </div>
                    </div>
                </div>
                <div class="counter">
                    <div class="row">
                        <div class="col-6 col-lg-3">
                            <div class="count-data text-center">
                                <h6 class="count h2" data-to="500" data-speed="500"><?php echo $row->time;?></h6>
                                <p class="m-0px font-w-600">Time</p>
                            </div>
                        </div>
                        <div class="col-6 col-lg-3">
                            <div class="count-data text-center">
                                <h6 class="count h2" data-to="150" data-speed="150"><?php echo $row->fee;?></h6>
                                <p class="m-0px font-w-600">Channeling Fee</p>
                            </div>
                        </div>
                        <div class="col-6 col-lg-3">
                            <div class="count-data text-center">
                                <h6 class="count h2" data-to="850" data-speed="850"><?php echo $row->experience;?></h6>
                                <p class="m-0px font-w-600">Experience Level</p>
                            </div>
                        </div>
                        <div class="col-6 col-lg-3">
                            <div class="count-data text-center">
                                <h6 class="count h2" data-to="190" data-speed="190"><?php echo $row->patients;?></h6>
                                <p class="m-0px font-w-600">Patiants</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
<?php 
    }
          
        else{

            echo "Name Does not exist";
        }

}

?>

<br><br><br><br><br><br><br><br><br><br><br><br>

<footer class="site-footer section-padding" id="contact">
            <div class="container">
                <div class="row">

                    <div class="col-lg-5 me-auto col-12">
                        <h5 class="mb-lg-4 mb-3">Opening Hours</h5>

                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex">
                                Sunday : Closed
                            </li>

                            <li class="list-group-item d-flex">
                                Monday, Tuesday - Firday
                                <span>8:00 AM - 3:30 PM</span>
                            </li>

                            <li class="list-group-item d-flex">
                                Saturday
                                <span>10:30 AM - 5:30 PM</span>
                            </li>
                        </ul>
                    </div>

                    <div class="col-lg-2 col-md-6 col-12 my-4 my-lg-0">
                        <h5 class="mb-lg-4 mb-3">Our Clinic</h5>

                        <p><a href="mailto:hello@company.co">eCare@company.co</a><p>

                        <p>Channel Your Doctor
                                Ongoing Number
                                Audio/Video Consultation
                                Medicine to Your Doorstep
                                Healthcare to Your Doorstep
                                Covid-19 Information
                                Lab Reports at Your Fingertips
                                Vet Care by SLVA</p>
                    </div>

                    <div class="col-lg-3 col-md-6 col-12 ms-auto">
                        <h5 class="mb-lg-4 mb-3">Socials</h5>

                        <ul class="social-icon">
                            <li><a href="#" class="social-icon-link bi-facebook"></a></li>

                            <li><a href="#" class="social-icon-link bi-twitter"></a></li>

                            <li><a href="#" class="social-icon-link bi-instagram"></a></li>

                            <li><a href="#" class="social-icon-link bi-youtube"></a></li>
                        </ul>
                    </div>


                </div>
            </section>
        </footer>

    <script type="text/javascript">

    </script>

</body>
</html>

