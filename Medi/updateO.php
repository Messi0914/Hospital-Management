<?php
  include 'connect.php';
  $id=$_GET['updateid'];

$sql="select * from `order` where id=$id";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($result);
$name=$row['name'];
$pharmacy=$row['pharmacy'];
$phone=$row['phone'];
$discription=$row['discription'];


  if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $pharmacy=$_POST['pharmacy'];
    $phone=$_POST['phone'];
    $discription=$_POST['discription'];

    $sql="update `order` set id=$id,name='$name',pharmacy='$pharmacy',phone='$phone',discription='$discription'
    where id=$id";

    $result=mysqli_query($con,$sql);
    if($result){
      //echo "Data inserted successfull";
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

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">

    <title>Order medicine</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">
  <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0">
  </head>
  <body>
  <div class="container">
    <div class="contact-box">
      <div class="left"></div>
      <div class="right">
        
        
        <form method="post" >

        <center><h1> Order Medicine</h1></center>

 
    <label>Name</label>
    <input type="text" class="field" 
     placeholder="Enter your name" name="name" autocomplete="off" value=<?php echo $name;?>>
   

   
    <label>Pharmacy</label>
    <input type="text" class="field" 
     placeholder="Enter pharmacy" name="pharmacy" autocomplete="off" value=<?php echo $pharmacy;?>>
   

   
    <label>Phone Number</label>
    <input type="text" class="field" 
     placeholder="Enter your phone number" name="phone" autocomplete="off" value=<?php echo $phone;?>>
  

   
    <label>Discription</label>
    <input type="text" class="field" 
     placeholder="Enter discription" name="discription" autocomplete="off" value=<?php echo $discription;?>>
  
    
  
  <button type="submit" class="btn" name="submit">Submit</button>
</form>



      </div>
    </div>
  </div>

 <?php $page = 'order' ; include 'header.php'; ?>
  
</body>
</html>
