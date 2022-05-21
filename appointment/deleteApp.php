<?php
include('include/connection.php');
?>

?>

<?php

if (isset($_GET['deleteid'])) {
	$nic=$_GET['deleteid'];


	$sql= "delete from patient where nic=$nic";
	$result=mysqli_query($connection,$sql);
	if ($result) {
		//echo "Deleted Sucuessfully";
		header('location:showApp.php');



	}else{

		die(mysqli_error($connection));
	}

}





	?>