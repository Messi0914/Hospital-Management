<?php
$con=new mysqli('localhost','root','','paymentdetails');

if(!$con){
  die(mysqli_error($con));
}

$id=$_GET['updateid'];
$sql="Select * from `payment` where id=$id";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($result);
$name=$row['name'];
$email=$row['email'];
$amount=$row['amount'];
$card=$row['card'];
$date=$row['date'];


if(isset($_POST['submit'])){
  $name=$_POST['name'];
  $email=$_POST['email'];
  $amount=$_POST['amount']; 
  $card=$_POST['card']; 
  $date=$_POST['date'];

  $sql="update `payment` set id=$id,name='$name',email='$email',amount='$amount',card='$card',date='$date' where id=$id";
  $result=mysqli_query($con,$sql);
  if($result){
     //echo "data updated successfully";
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Payment details</title>
  </head>
  <body>
    <div class="container my-5">
      <form method="post">

        <div class="form-group">
         <label>Name</label>
         <input type="text" class="form-control" placeholder="Enter your name" name="name" autocomplete="off" value=<?php echo $name;?>>
        </div>

        <div class="form-group">
         <label>Email</label>
         <input type="text" class="form-control" placeholder="Enter your email" name="email" autocomplete="off" value=<?php echo $email;?>>
        </div>

        <div class="form-group">
         <label>payment amount</label>
         <input type="text" class="form-control" placeholder="Enter the payment amount" name="amount" autocomplete="off" value=<?php echo $amount;?>>
        </div>

        <div class="form-group">
         <label>Card number</label>
         <input type="text" class="form-control" placeholder="Enter the card number" name="card" autocomplete="off" value=<?php echo $card;?>>
        </div>

        <div class="form-group">
         <label>Date</label>
         <input type="text" class="form-control" placeholder="Enter the date" name="date" autocomplete="off" value=<?php echo $date;?>>
        </div>

        <button type="submit" class="btn btn-primary" name="submit">Update</button>
      </form>
    </div>
  </body>
</html>