
<?php 
include('include/scripts.php');
 include 'include/header.php';
?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

   <!-- Bootstrap CSS --> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="cssdis/main.css">


<script src="https://github.com/Messi0914/Hospital-Management.git" crossorigin="anonymous"></script>


	<title></title>
</head>
<body class="container1">
	<div class="row">
  <div class="col">
    <div class="container">
      <div class="card mt-5">
        <div class="card-header">


<h1>Please Confirm Your Appointment By Clicking Below Button.</h1>
	<button  onclick="clickMe()" style=" padding: 15px; margin-bottom: 20px; margin-left: 450px; margin-top: 30px;" type="submit" class="btn btn-primary ">Confirm Appointment .  <i style="color: yellow; font-size: 23px;" class="fa-solid fa-circle-check"></i></button>

<form action="showApp.php" method="post">

	<button style=" padding: 20px 78px; margin-bottom: 30px; margin-left:390px" type="submit" class="btn btn-success ">View My Appointments .         <i style="font-size: 21px;" class="fa-solid fa-eye"></i></button>

</form>

<form action="Add.php" method="post">

	<button  style=" padding: 10px;" type="submit" class="btn btn-secondary "><i class="fa-solid fa-backward"></i> Back .</button>
</form>



<script src="https://kit.fontawesome.com/bb3fe22788.js" crossorigin="anonymous"></script>


	<script type="text/javascript">
  
function clickMe(){


swal({
  title: "Are you sure?",
  text: "Once you Confirm your Appointment, you will not be able to change that Appointment for 36 hours!",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
    swal("Successfully created your Appointment!", {
      icon: "success",
    });
  } else {
    swal("cancel!");
  }
});

}


</script>
</body>
</html>