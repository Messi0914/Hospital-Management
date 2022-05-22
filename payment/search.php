<?php
	
	$con=new mysqli('localhost','root','','paymentdetails');

	if(!$con){
		die(mysqli_error($con));
	}else{

	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<form action="search.php" method="post">
		<label>Search</label>                          
		<input type="text" name="name">
		<input type="submit" name="search">
	</form>
	<table>
			<tr>
				<th>name</th>
				<th>email</th>
				<th>amount</th>
				<th>card</th>
				<th>date</th>
			</tr> <br> <br>
			
			<?php
			if(isset($_POST['search'])){
				$name= $_POST['name'];

				$query = "SELECT * FROM `payment` where name='$name'";
				$sql=mysqli_query($con,$query);

				while($row= mysqli_fetch_array($sql))
				{
					?>

					<tr>
						<td><?php echo $row['name']; ?></td>
						<td><?php echo $row['email']; ?></td>
						<td><?php echo $row['amount']; ?></td>
						<td><?php echo $row['card']; ?></td>
						<td><?php echo $row['date']; ?></td>
					</tr>

				<?php

				}
			}
			?>
		</table>
	</body>
	</html>	
