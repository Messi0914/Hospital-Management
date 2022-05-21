
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="description" content="">
        <meta name="author" content="">

        <title>eCare Home page</title>

        <!-- CSS FILES -->        
        <link rel="preconnect" href="https://fonts.googleapis.com">
        
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">

        <link href="css/bootstrap.min.css" rel="stylesheet">

        <link href="css/bootstrap-icons.css" rel="stylesheet">

        <link href="css/owl.carousel.min.css" rel="stylesheet">

        <link href="css/owl.theme.default.min.css" rel="stylesheet">

        <link href="css/templatemo-medic-care.css" rel="stylesheet">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">


    </head>
    
    <body id="top">
    
        <main>

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
                            <li class="nav-item active" class="<?php if($page=='home'){echo 'active';} ?>">
                                <a class="nav-link" href="index.php">Home</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="#about">About</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="#timeline">To Know</a>
                            </li>

                            <a class="navbar-brand d-none d-lg-block" href="index.php">
                                eCare
                                <strong class="d-block">Health Specialist</strong>
                            </a>

                            <li class="nav-item" class="<?php if($page=='register'){echo 'active';} ?>">
                                <a class="nav-link" href="register.php">Registration</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" onclick="checklogin()" href="#booking">Make an Appointment</a>
                            </li>

                            <li class="nav-item" class="<?php if($page=='login'){echo 'active';} ?>">
                                <a class="nav-link" href="login.php">User Profile </a>
                            </li>
                        </ul>
                    </div>

                </div>
            </nav>

            <br><br><br><br><br><br><br><br>

   <div class="card text-center">
  <div class="card-header">
    Featured
  </div>
  <div class="card-body">
    <h5 class="card-title">THANK YOU FOR JOINING</h5>
    <p class="card-text"><?php

include 'config.php';

if(isset($_GET['code'])) {
	$verification_code = mysqli_real_escape_string($conn, $_GET['code']);

	$query = "SELECT * FROM `user_form` WHERE verification_code = '{$verification_code}'";

	$result = mysqli_query($conn, $query);

	if (mysqli_num_rows($result) == 1) {
		$query = "UPDATE `user_form` SET is_active = true, verification_code = NULL WHERE verification_code = '{$verification_code}' LIMIT 1";

		$result = mysqli_query($conn, $query);

		if (mysqli_affected_rows($conn) == 1 ) {

			echo 'Email address Verified successfully.';
		}else{

			echo 'Invalid Verification Code.';
		}

	}

}

?></p>
    <a href="index.php" class="btn btn-dark">HOME</a>
  </div>
  <div class="card-footer text-muted">
    eCare
  </div>
</div>
<br><br><br><br><br><br><br><br><br>

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

                        <p><a href="">ecare.hospital001@gmail.com</a><p>

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

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script>
function checklogin(){
    alert();
}
</script>

</body>
</html>

