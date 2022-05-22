<?php
include 'connect.php';
?>

<?php $page = 'order' ; include 'header.php'; ?>

<!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1.0">
 	<title>Display</title>
 	 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
 </head>
 <body >
 	<div class="container" >
    <div class="row">
    <div class="col w-50"><button class="col w-25 btn btn-primary my-5"><a href="indexO.php" class="text-light">Order Medicine</a></button></div>
      <div class="col text-right w-50 justify-content-right"> <button class="col w-25 btn btn-primary my-5" style="margin-right: 150px !important;"><a href="search.php" class="text-light">Search Medicine</a></button></div>


</div>
 		<table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Name</th>
      <th scope="col">Pharmacy</th>
      <th scope="col">Phone</th>
       <th scope="col">Discription</th>
       <th scope="col">Operation</th>
    </tr>
  </thead>
  <tbody>


<?php

	$sql="select * from `order`";
	$result=mysqli_query($con,$sql);
	if($result){
		while($row=mysqli_fetch_assoc($result)){
			$id=$row['id'];
			$name=$row['name'];
			$pharmacy=$row['pharmacy'];
			$phone=$row['phone'];
			$discription=$row['discription'];
			echo '<tr>
      <th scope="row">'.$id.'</th>
      <td>'.$name.'</td>
      <td>'.$pharmacy.'</td>
      <td>'.$phone.'</td>
      <td>'.$discription.'</td>

      <td>
	<button class="btn btn-primary"><a href="updateO.php?updateid='.$id.'"class="text-light">Update</a></button>
	<button class="btn btn-danger"><a href="deleteO.php?deleteid='.$id.'"class="text-light">Delete</a></button>
</td>

    </tr>';

		}
	}


?>




 
  </tbody>
</table>


 	</div>

  <form action="indexO.php" method="post">
          
<button style="margin-left: 100px;" type="submit" class="btn btn-success mb-5  ">Go Back</button>

        </form>

 	
 </body>
 </html> 


