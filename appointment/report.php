<?php
include('include/report.php')
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Reports in PHP</title>

<style type="text/css">

*{

	padding: 0px;
	margin: 0px;
}

body {

	background-color: #3877d6;
}
	
.container{

	width: 960px;
	margin: 0 auto;
	background-color: #fff;
	height: 400px;
	margin-top: 10px ;
	padding: 20px;

}
.wrapper{

	margin-bottom: 20px;
}

h1{

	font-family: sans-serif;
	color: rgb(84, 84, 172);
}
.data{

	font-family: sans-serif;
	width: 800px;
	padding: 10px;
	margin-top: 20px;
}

.data select {

	width: 200px;
	padding: 3px;
	margin: 20px 0px;
	float: left;
	position: relative;
	margin-right: 20px;
}

.submit{

	margin-top: 18px;
	width: 100px;
	padding: 6px;
	border: none;
	outline: none;
	background:blue ;
	color: white;
	font-weight: bold;
	cursor: pointer;

}

.table{

margin-top: 20px;
border: 1px solid #ccc ;
clear: both;

}

.table th{

	width: 200px;
	font-family: sans-serif;
	font-size: 13px;
	color: rgb(84, 84, 172);
	padding: 3px 20px 3px 20px;

}



</style>


</head>
<body>

	<div class="container">
		<div class="wrapper">
			
			<h1>Report Of Appointment</h1>
 
		</div>

		<div class="data">

			<form action="report.php" method="POST">
				
				<select name="standards">
				
				<option>Select</option>
				<?php

				$query1 =  "SELECT * FROM patient";
				$result1 = mysqli_query($connection, $query1);
				while($rows1 = mysql_fetch_array($result1)){
					$phone = $rows1['phone'];
					$name = $rows1['full_name'];
					?>

		<option value="<?php echo $phone; ?>"><?php echo $name; ?> </option>


<?php

				}

				 ?>
									
			</select>

			<select name="Courses">
				<option>Select</option>
				<option>1 PUC</option>
				<option>2 PUC</option>
			</select>

			<input type="submit" name="submit" class="submit">
			<table border="1" class="table">
				<tr>
					<th>Student Name</th>
					<th>Gender</tr>
				</tr>

			</table>
			</form>

		</div>
</div>

</body>
</html>