

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="description" content="">
   <meta name="author" content="">

   <title>login</title>
<!--===============================================================================================-->   
   <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
   <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
   <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
   <link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
   <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->   
   <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
   <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
   <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->   
   <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
   <link rel="stylesheet" type="text/css" href="css/util.css">
   <link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
  

   <link rel="stylesheet" href="css/style2.css">

   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>

 

<div class="limiter">

      <?php
      if(isset($message)){
         foreach($message as $message){
            echo '<div class="message">'.$message.'</div>';
         }
      }
      ?>

      <div class="container-login100">
         <div class="wrap-login100">
            <div class="login100-form-title" style="background-image: url(images/bg2.jpg);">
               <span class="login100-form-title-1">
                  Sign In
               </span>
            </div>

            <form class="login100-form validate-form" action="" method="post" enctype="multipart/form-data">

                        <?php

                        include 'config.php';
                        session_start();


                        if(isset($_POST['submit'])){

                           $email = mysqli_real_escape_string($conn, $_POST['email']);
                           $pass = mysqli_real_escape_string($conn, md5($_POST['password']));

                           $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE email = '$email' AND password = '$pass'") or die('query failed');

                           if(mysqli_num_rows($select) > 0){
                              $row = mysqli_fetch_assoc($select);
                              $_SESSION['user_id'] = $row['id'];
                              header('location:home.php');
                           }else{
                              $message[] = 'incorrect email or password!';
                           }

                        }

                        ?>
                        <br><br>

                        <?php
                           if(isset($message)){
                                 foreach($message as $message){
                                    echo '<div class="message">'.$message.'</div>';
                                 }
                           }
                        ?>
               
               <div class="wrap-input100 validate-input m-b-26" data-validate="Email is required">
                  <span class="label-input100">Email</span>

                   <input type="email" name="email" placeholder="Enter email"  required>

                  <span class="focus-input100"></span>
               </div>

               <div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
                  <span class="label-input100">Password</span>

                  <input type="password" name="password" placeholder="Enter password"  required>

                  <span class="focus-input100"></span>
               </div>

               <div class="flex-sb-m w-full p-b-30">
                  <div class="contact100-form-checkbox">
                     <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
                     <label class="label-checkbox100" for="ckb1">
                        Remember me
                     </label><br>
                     <p>don't have an account? <a href="register.php">regiser now</a></p>
                  </div>

               </div>

               <div class="container-login100-form-btn">
                   <input type="submit" name="submit" value="login now" class="login100-form-btn">
                  </button>
               </div>
            </form>
      </div>
   </div>
</div>

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


   
<!--===============================================================================================-->
   <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
   <script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
   <script src="vendor/bootstrap/js/popper.js"></script>
   <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
   <script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
   <script src="vendor/daterangepicker/moment.min.js"></script>
   <script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
   <script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
   <script src="js/main.js"></script>

</body>
<?php $page = 'login' ; include 'header.php'; ?>
</html>
