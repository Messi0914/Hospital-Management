<?php
include 'connect.php';
if(isset($_POST['submit'])){
  $name=$_POST['name'];
  $email=$_POST['email'];
  $amount=$_POST['amount']; 
  $card=$_POST['card'];
  $date=$_POST['date'];

  $sql="insert into `payment` (name,email,amount,card,date)
  values('$name','$email','$amount','$card','$date')";
  $result=mysqli_query($con,$sql);
  if($result){
    // echo "data inserted successfully";
    header('location:display.php');
  }else{
    die(mysqli_error($con));
  }

}

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Colorlib">
   <meta name="keywords" content="Colorlib Templates">
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="author" content="">
    


    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Payment details</title>
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
    <div class="container my-5">
      <form method="post">

        <div class="form-group">
         <label>Name</label>
         <input type="text" class="form-control" placeholder="Enter your name" name="name" autocomplete="off">
        </div>

        <div class="form-group">
         <label>Email</label>
         <input type="text" class="form-control" placeholder="Enter your email" name="email" >
        </div>

        <div class="form-group">
         <label>payment amount</label>
         <input type="text" class="form-control" placeholder="Enter the payment amount" name="amount" autocomplete="off">
        </div>

        <div class="form-group">
         <label>Card number</label>
         <input type="text" class="form-control" placeholder="Enter the card number" name="card" autocomplete="off">
        </div>

        <div class="form-group">
         <label>Date</label>
         <input type="text" class="form-control" placeholder="Enter the date" name="date" autocomplete="off">
        </div>

        <button type="submit" class="btn btn-primary" name="submit">Make payment</button>
      </form>
    </div>
    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/global.js"></script>

  </body>
</html>