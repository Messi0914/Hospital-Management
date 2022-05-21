<?php

include 'config.php';

if(isset($_POST['submit'])){

   $fname = mysqli_real_escape_string($conn, $_POST['fname']);
   $lname = mysqli_real_escape_string($conn, $_POST['lname']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $nic = mysqli_real_escape_string($conn, $_POST['nic']);
   $contact = mysqli_real_escape_string($conn, $_POST['contact']);
   $pass = mysqli_real_escape_string($conn, md5($_POST['password']));
   $cpass = mysqli_real_escape_string($conn, md5($_POST['cpassword']));
   $image = $_FILES['image']['name'];
   $image_size = $_FILES['image']['size'];
   $image_tmp_name = $_FILES['image']['tmp_name'];
   $image_folder = 'uploaded_img/'.$image;

   $verification_code = sha1($email . time());
   $verification_URL ='http://localhost/eCare/verify.php?code=' . $verification_code;


   $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE email = '$email' AND password = '$pass'") or die('query failed');

   if(mysqli_num_rows($select) > 0){
      $message[] = 'user already exist'; 
   }else{
      if($pass != $cpass){
         $message[] = 'confirm password not matched!';
      }elseif($image_size > 2000000){
         $message[] = 'image size is too large!';
      }else{
         $insert = mysqli_query($conn, "INSERT INTO `user_form`(first_name,last_name, email,nic,contact_number, password, image, verification_code, is_active) VALUES('$fname','$lname', '$email','$nic','$contact', '$pass', '$image', '$verification_code', false)") or die('query failed');


         $to               = $email;
         $sender           = 'ecare.hospital001@gmail.com';
         $mail_subject     = 'Verify Email Address';
         $email_body       = '<p>Dear ' . $fname . '</p>' ;
         $email_body      .= '<p> Thank you for registeration. There is one more Step.
         Click Below Link to verify your email address in order to activate your account.</p>';
         $email_body      .= '<p>' . $verification_URL . '</p>';
         $email_body      .= '<p>Thank You, <br>eCare</p>';


         
         $header           ="From: {$sender}\r\nContent-Type: text/html;";

         $send_mail_result = mail($to, $mail_subject, $email_body, $header);

          if ($send_mail_result) {

            echo 'please check your email.';

          }else{

            echo 'Error.';
          }


         if($insert){
            move_uploaded_file($image_tmp_name, $image_folder);
            $message[] = 'registered successfully!';
            header('location:login.php');
         }else{
            $message[] = 'registeration failed!';
         }
      }
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta name="description" content="Colorlib Templates">
   <meta name="author" content="Colorlib">
   <meta name="keywords" content="Colorlib Templates">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

   <title>register</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
   <!-- Icons font CSS-->
   <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
   <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
   <!-- Font special for pages-->
   <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

   <!-- Vendor CSS-->
   <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
   <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

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

   <!-- Main CSS-->
   <link href="css/main1.css" rel="stylesheet" media="all">


</head>
<body>
    <div class="page-wrapper bg-blue p-t-100 p-b-100 font-robo">
         <?php
      if(isset($message)){
         foreach($message as $message){
            echo '<div class="message">'.$message.'</div>';
         }
      }
      ?>
        <div class="wrapper wrapper--w680">
            <div class="card card-1">
                <div class="card-heading"></div>
                <div class="card-body">
                    <h2 class="title">Registration Info</h2>
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="input-group">
                            <input type="text" name="fname" placeholder="First name" class="input--style-1" required>
                        </div>
                        <div class="input-group">
                            <input type="text" name="lname" placeholder="Last name" class="input--style-1" required>
                        </div>
                        <div class="input-group">
                            <input type="email" name="email" placeholder="Enter email" class="input--style-1" required> 
                        </div>
                         <div class="input-group">
                            <input type="text" name="nic" placeholder="NIC" class="input--style-1" required>
                        </div>
                        <div class="input-group">
                            <input type="text" name="contact" placeholder="Contact number" class="input--style-1" required>
                        </div>
                        <div class="input-group">
                            <input type="password" name="password" placeholder="Enter password" class="input--style-1" required>
                        </div>
                        <div class="input-group">
                            <input type="password" name="cpassword" placeholder="Confirm password" class="input--style-1" required>
                        </div>
                        <div class="input-group">
                            <input type="file" name="image" class="input--style-1" accept="image/jpg, image/jpeg, image/png">
                        </div>
                        <div class="p-t-20">
                            <input type="submit" name="submit" value="Register now" class="btn btn-success">
                        </div>
                        
                    </form>
                </div>
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

    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/global.js"></script>

    <?php $page = 'register' ; include 'header.php'; ?>

</body>
</html>