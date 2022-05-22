<?php
include 'connect.php';?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width,
	initial-scale=1.0">
	<title>Payment details</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="css/main1.css" rel="stylesheet" media="all">
</head>
<body>

<div class="container">
<button class="btn btn-primary my-5"><a href="add.php"
class="text-light">Add payment
</button>
<button class="btn btn-primary my-5"><a href="search.php"
class="text-light">Search
</button>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Pno</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Payment amount</th>
      <th scope="col">Card number</th>
      <th scope="col">Date</th>
      <th scope="col">operations</th>
    </tr>
  </thead>
  <tbody>

   <?php

$sql="Select * from `payment`";
$result=mysqli_query($con,$sql);
if($result){
	while($row=mysqli_fetch_assoc($result)){
		$id=$row['id'];
		$name=$row['name'];
		$email=$row['email'];
		$amount=$row['amount'];
    $card=$row['card'];
		$date=$row['date'];
		echo '<tr>
      <th scope="row">'.$id.'</th>
      <td>'.$name.'</td>
      <td>'.$email.'</td>
      <td>'.$amount.'</td>
      <td>'.$card.'</td>
      <td>'.$date.'</td>

      <td>
      <button class="btn btn-primary"><a href="update.php? updateid='.$id.'" class="text-light">Update</a></button>
      <button class="btn btn-danger"><a href="delete.php? deleteid='.$id.'" class="text-light">Delete</a></button>
      </td>
      
    </tr>';

	}
}




?>

  </tbody>
</table>
</div>

</body>
</html>