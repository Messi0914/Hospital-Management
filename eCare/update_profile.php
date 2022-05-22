<?php

include 'config.php';

session_start();
$user_id = $_SESSION['user_id'];

if(isset($_POST['update_profile'])){

   $update_fname = mysqli_real_escape_string($conn, $_POST['update_fname']);
   $update_lname = mysqli_real_escape_string($conn, $_POST['update_lname']);
   $update_email = mysqli_real_escape_string($conn, $_POST['update_email']);
   $update_nic = mysqli_real_escape_string($conn, $_POST['update_nic']);
   $update_contact = mysqli_real_escape_string($conn, $_POST['update_contact']);


   mysqli_query($conn, "UPDATE `user_form` 
      SET first_name = '$update_fname',last_name = '$update_lname', email = '$update_email', nic = '$update_nic',contact_number = '$update_contact' 
      WHERE id = '$user_id'") or die('query failed');

   $old_pass = $_POST['old_pass'];
   $update_pass = mysqli_real_escape_string($conn, md5($_POST['update_pass']));
   $new_pass = mysqli_real_escape_string($conn, md5($_POST['new_pass']));
   $confirm_pass = mysqli_real_escape_string($conn, md5($_POST['confirm_pass']));

   if(!empty($update_pass) || !empty($new_pass) || !empty($confirm_pass)){
      if($update_pass != $old_pass){
         $message[] = 'old password not matched!';
      }elseif($new_pass != $confirm_pass){
         $message[] = 'confirm password not matched!';
      }else{
         mysqli_query($conn, "UPDATE `user_form` SET password = '$confirm_pass' WHERE id = '$user_id'") or die('query failed');
         $message[] = 'password updated successfully!';
      }
   }

   $update_image = $_FILES['update_image']['name'];
   $update_image_size = $_FILES['update_image']['size'];
   $update_image_tmp_name = $_FILES['update_image']['tmp_name'];
   $update_image_folder = 'uploaded_img/'.$update_image;

   if(!empty($update_image)){
      if($update_image_size > 2000000){
         $message[] = 'image is too large';
      }else{
         $image_update_query = mysqli_query($conn, "UPDATE `user_form` SET image = '$update_image' WHERE id = '$user_id'") or die('query failed');
         if($image_update_query){
            move_uploaded_file($update_image_tmp_name, $update_image_folder);
         }
         $message[] = 'image updated succssfully!';
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
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">

   <meta name="description" content="">
   <meta name="author" content="">
   <title>update profile</title>

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

   <!-- custom css file link  -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
   <link rel="stylesheet" href="css/style1.css">

</head>
<body>
   
   
<div class="update-profile">

   <?php
      $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE id = '$user_id'") or die('query failed');
      if(mysqli_num_rows($select) > 0){
         $fetch = mysqli_fetch_assoc($select);
      }
   ?>

   <form action="" method="post" enctype="multipart/form-data">


      <?php
         if($fetch['image'] == ''){
            echo '<img src="images/default-avatar.png">';
         }else{
            echo '<img src="uploaded_img/'.$fetch['image'].'">';
         }
         if(isset($message)){
            foreach($message as $message){
               echo '<div class="message">'.$message.'</div>';
            }
         }
      ?>
      

      <div class="flex">
         <div class="inputBox">
            <span>First Name :</span>
            <input type="text" name="update_fname" value="<?php echo $fetch['first_name']; ?>" class="box">
            <span>Last Name :</span>
            <input type="text" name="update_lname" value="<?php echo $fetch['last_name']; ?>" class="box">
            <span>Email Address :</span>
            <input type="email" name="update_email" value="<?php echo $fetch['email']; ?>" class="box">
            <span>NIC :</span>
            <input type="text" name="update_nic" value="<?php echo $fetch['nic']; ?>" class="box">
            <span>Contact Number :</span>
            <input type="text" name="update_contact" value="<?php echo $fetch['contact_number']; ?>" class="box">
            <span>update your pic :</span>
            <input type="file" name="update_image" accept="image/jpg, image/jpeg, image/png" class="box">
         </div>
         <div class="inputBox">
            <input type="hidden" name="old_pass" value="<?php echo $fetch['password']; ?>">
            <span>Old password :</span>
            <input type="password" name="update_pass" placeholder="Enter previous password" class="box">
            <span>New password :</span>
            <input type="password" name="new_pass" placeholder="Enter new password" class="box">
            <span>Confirm password :</span>
            <input type="password" name="confirm_pass" placeholder="Confirm new password" class="box">
         </div>
      </div>
      <input type="submit" value="Submit" name="update_profile" class="btn"> 
      <a href="home.php" class="delete-btn" style="text-align:left: ;">go back</a>
   </form>

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

</body>
</html>