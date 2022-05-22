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







  <!doctype html>
<html lang="en">
  <head> 



    <!-- Required meta tags -->
   
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">

   <title>Order medicine</title>
  </head>
  <body style="background:#ebeeef;">
    <div class="row justify-content-center">
    <div class="container "> 
      <form method="post" >

        <center><h1> Order Medicine</h1></center>

  <div class="form-group">
    <label>Name</label>
    <input type="text" class="form-control" 
     placeholder="Enter your name" name="name" autocomplete="off">
   </div>

   <div class="form-group">
    <label>Pharmacy</label>
    <input type="text" class="form-control" 
     placeholder="Enter pharmacy" name="pharmacy" autocomplete="off">
   </div>

   <div class="form-group">
    <label>Phone Number</label>
    <input type="text" class="form-control" 
     placeholder="Enter your phone number" name="phone" autocomplete="off">
   </div>

   <div class="form-group">
    <label>Discription</label>
    <input type="text" class="form-control" 
     placeholder="Enter discription" name="discription" autocomplete="off">
   </div>
    
  
  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
</form>
    </div>

    
    </div>

   <?php $page = 'order' ; include 'header.php'; ?>
  </body>
</html> 





