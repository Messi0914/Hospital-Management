<?php

include 'config.php';
session_start();
$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
};

if(isset($_GET['logout'])){
   unset($user_id);
   session_destroy();
   header('location:login.php');
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">    
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="description" content="">
   <meta name="author" content=""> 

   <title>home</title>

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
    <link rel="stylesheet" href="css/style.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" ></script>

</head>
<body>

<div>
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
                                <a class="nav-link" href="#hero">Home</a>
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
                                <a class="nav-link" href="register">Registration</a>
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
</div>

<div class="containe">
   <div class="profile">
      <div class="avatar-flip">
      <?php
         $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE id = '$user_id'") or die('query failed');
         if(mysqli_num_rows($select) > 0){
            $fetch = mysqli_fetch_assoc($select);
         }
         if($fetch['image'] == ''){
            echo '<img src="images/default-avatar.png">';
         }else{
            echo '<img src="uploaded_img/'.$fetch['image'].'">';
         }
      ?>
      </div>
      <div class="card text-dark bg-light mb-3" style="max-width: 30rem;">
         <div class="card-header">
            <h2>
            <?php echo $fetch['first_name']; ?>
            <?php echo $fetch['last_name']; ?>
           </h2>
         </div>
         <div class="card-body" style="text-align:center ;">
         <h5 class="card-title" style="text-align:left">Personal Info</h5>
               <ul class="list-group" style="text-align:left ;">
                    <li class="list-group-item"><b>Email Address : </b><?php echo $fetch['email']; ?></li>
                    <li class="list-group-item"><b>NIC Number  :  </b>       <?php echo $fetch['nic']; ?></li>
                    <li class="list-group-item"><b>Contact Number :  </b> <?php echo $fetch['contact_number']; ?></li>
               </ul><br>
                <a href="update_profile.php" class="btn btn-outline-warning">Update profile</a>
         </div>
      </div>
     
      <h4>
      <a href="home.php?logout=<?php echo $user_id; ?>" class="delete-btn">logout</a>
      <a href="register.php">register</a>
      </h4>
      <p><button type="button" class="btn btn-outline-success">Make an Appointment</button></p>
      <br>

      <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#exampleModal"> Remove Your Profile</button>

   </div> 

</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
           <div class="modal-dialog" role="document">
             <div class="modal-content">
               <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
                 </button>
               </div>
               <div class="modal-body">
                 Do you want to Remove Your eCare Account?
               </div>
               <div class="modal-footer">
                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <form action="removeProfile.php" method="POST">
                      <button type="submit" name="removeProfile" class="btn btn-danger">
                           <i class="fas fa-users"></i> Remove
                     </button>
                  </form>
               </div>
             </div>
           </div>
         </div>

<?php
                include 'footer.php';
         ?>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>