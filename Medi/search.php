<?php
	
	$con=new mysqli('localhost','root','','ordermedicine');

	if(!$con){
		die(mysqli_error($con));
	}else{
		
	}

 $page = 'order' ; include 'header.php'; 

?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>search</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">

</head>
<body style="background:#ebeeef;">

	<form action="search.php" method="post"><br>
		<label>Search</label>
		<input type="text" name="phone">
		<input type="submit" class="btn btn-primary" name="search">
	</form>
	

	<table class="table">

		 
		<thead class="table-light">
		<tr>
			<th scope="col">ID</th>
			<th scope="col">Name</th>
			<th scope="col">Pharmacy</th>
			<th scope="col">Phone</th>
			<th scope="col">Discription</th>
			<thead>		
		</tr> <br> <br>

		<?php 
		if (isset($_POST['search'])){
			$phone= $_POST['phone'];

			$query = "SELECT * FROM `order` where phone='$phone'";
			$sql=mysqli_query($con,$query);

			while($row= mysqli_fetch_array($sql)) 
			{
				?>

				<tr>
					<td><?php echo $row['id']; ?></td>
					<td><?php echo $row['name']; ?></td>
					<td><?php echo $row['pharmacy']; ?></td>
					<td><?php echo $row['phone']; ?></td>
					<td><?php echo $row['discription']; ?></td>

				</tr>

			<?php

			}


		}
		?>

	</table>

	<form action="indexO.php" method="post">
          
<button style="margin-left: 100px; margin-top: 250px;" type="submit" class="btn btn-success mb-5  ">Go Back</button>

        </form>

</body>
</html>

