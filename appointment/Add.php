<?php
include('include/connection.php');


?>
<!----------------------------------------------------------------------------------------->


<?php

if (isset($_POST['submit'])) {
  

 $phone = $_POST['phone'];

 $age = $_POST['age'];

 $nic = $_POST['nic'];

 $phone = $_POST['phone'];

 $area = $_POST['area'];

 $doctor = $_POST['doctor'];

 $illness = $_POST['illness'];

  $dated = $_POST['dated'];

 

 if (empty($nic)) {
   $nic_error = 'Please enter your nic';
 }

 if (empty($age)) {
   $age_error = 'Please enter your age';
 } 

 if (empty($phone)) {

   $phone_error = 'Please enter your phone number';
 }elseif (strlen($phone) < 10) {
   
   $phone_error = 'Your phone number needs to have minimum of 10 numbers';

 }

  if (empty($dated)) {
   $dated_error = 'Please enter a date';
 }

  if (empty($phone)) {
   $phone_error = 'Please enter your phone number';
 }

  if (empty($area)) {
   $area_error = 'Please enter your area';
 }

  if (empty($doctor)) {
   $doctor_error = 'Please select a doctor';
 }

   if (empty($illness)) {
   $illness_error = 'Please enter illness';
 }

}

 ?>
<!----------------------------------------------------------------------------------------->


<?php 

$page='appointment';
//include 'header.php';

?>

<br>
<br><br>
 


<!DOCTYPE html>
<html>
<head>
	<title>Appointment</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">
	<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0">

	 <link rel="stylesheet" type="text/css" href="css/all.css">

   <style type="text/css">
    
    <?php

    if (isset($_POST['submit'])) {
      ?>
     .error{

      font-size: 15px;
      background: red;
      color: white;
      padding: 6px;
<?php
     }
     ?>

   </style>

</head>
<body>


	<div class="container">
		<div class="contact-box">
			<div class="left"></div>
			<div class="right">
				<h2>Book Your Appointemnt</h2>

				<form method="post" action="Add.php">

				<input type="text" name="fullName" class="field" placeholder="Enter Your Name">





				<input type="text" name="nic" class="field" placeholder="Enter Your NIC Number">
        
        <div class="error">
				<?php if(isset($nic_error)) { ?>
                                 <p><?php echo $nic_error ?> </p> <?php
                
                                 } ?> </div>

				<input type="text" name="age" class="field" placeholder="Enter Your Age">

			<div class="error">	<?php if(isset($age_error)) { ?>
                                 <p><?php echo $age_error ?> </p> <?php
                                 } ?> </div>

				<input type="text" name="phone" class="field" placeholder="Enter Your Phone Number">

				<div class="error">	<?php if(isset($phone_error)) { ?>
                                 <p><?php echo $phone_error ?> </p> <?php
                                 } ?> </div>

				<input type="text" name="dated" class="field" placeholder="Select a Date">
        <div class="error">

				<?php if(isset($dated_error)) { ?>
                                 <p><?php echo $dated_error ?> </p> <?php
                                 } ?> </div>

				<input type="text" name="area" class="field" placeholder="Enter Your Area">
        <div class="error">

					<?php if(isset($area_error)) { ?>
                                 <p><?php echo $area_error ?> </p> <?php
                                 } ?> </div>

				<input type="text" name="doctor" class="field" placeholder="Select a Doctor">

        <div class="error">
				<?php if(isset($doctor_error)) { ?>
                                 <p><?php echo $doctor_error ?> </p> <?php
                                 } ?> </div>

				<input type="text" name="illness" class="field" placeholder="Illness">
        <div class="error">

				<?php if(isset($illness_error)) { ?>
                                 <p><?php echo $illness_error ?> </p> <?php
                                 } ?> </div>

				<button class="btn" name="submit"> Book Appointment</button>
			</form>
			</div>
		</div>
	</div>

	






</body>
</html>

<?php 

if (isset($_POST['submit'])) {

$full_name = $_POST['fullName'];
$nic = $_POST['nic'];
$age = $_POST['age'];
$phone = $_POST['phone'];
$dated = $_POST['dated'];
$area = $_POST['area'];
$doctor =$_POST['doctor'];
$illness = $_POST['illness'];


$sql = "INSERT INTO patient (full_name , nic , age , phone , dated ,  area , doctor , illness) VALUES (?,?,?,?,?,?,?,?)";
$statment = $connection->prepare($sql);

$statment->bind_param("ssssssss" , $full_name , $nic , $age , $phone , $dated , $area , $doctor , $illness);




	

	 if($statment->execute()) {

	 	header('location:confirm.php');
	 	

	 }else {

	 	echo "";
	 }


}

?>


