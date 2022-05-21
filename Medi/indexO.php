<?php
  include 'connect.php';
  if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $pharmacy=$_POST['pharmacy'];
    $phone=$_POST['phone'];
    $discription=$_POST['discription'];

    $sql="insert into `order` (name,pharmacy,phone,discription)
    values('$name','$pharmacy','$phone','$discription')";
    $result=mysqli_query($con,$sql);
    if($result){
      // echo "Data inserted successfull";
      header('location:display.php');
    }else{
      die(mysqli_error($con));
    }
  }
?>


<!DOCTYPE html>
<html>
<head>

	<style type="text/css">
		
		h1{
			margin-bottom: 40px ;
		}

    body label{
      font-weight: bold;
    }

	</style>

	<title>Contact us</title>
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
     placeholder="Enter your name" name="name" autocomplete="off" required>
   

   
    <label>Pharmacy</label>
    <input type="text" class="field" 
     placeholder="Enter pharmacy" name="pharmacy" autocomplete="off" required>
   

   
    <label>Phone Number</label>
    <input type="text" class="field" 
     placeholder="Enter your phone number" name="phone" autocomplete="off" required>
  

   
    <label>Discription</label>
    <input type="text" class="field" 
     placeholder="Enter discription" name="discription" autocomplete="off" required>
  
    
  
  <button type="submit" class="btn" name="submit">Submit</button>
</form>



			</div>
		</div>
	</div>

 <?php $page = 'order' ; include 'header.php'; ?>

</body>
</html>