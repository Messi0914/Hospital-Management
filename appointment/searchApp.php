<?php
include('include/connection.php');
include('include/scripts.php');

$page='appointment';
include 'include/header.php';


?>


<!----------------------------------------------------------------------------------------->

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Please be sucuess</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="cssdis/main.css">

        <style type="text/css">
          

.container1:after{
  content: '';
  position: absolute;
  width: 100%;
  height: 100%;
  left: 0;
  top: 0;
  background: url("img/hh.jpg") no-repeat center;
  background-size: cover;
  filter: blur(100px);
  z-index: -1;
}

.container{
  background-color: #78F9DD;
}


        </style>

      

</head>
<body  class="container1">
 <div class="row">
  <div class="col">
    <div class="container">
      <div class="card mt-5">
        <div class="card-header">
<div class="search-box">

	<form action="searchApp.php" method="post">
		
		<input class="search2" type="text" name="phone" placeholder="Enter Your Phone Number">
	<input style="background: #0F51F2;" class="btn5"   type="submit" name="search" value="search"> 

</div>


</form>

<br>
<br><br>
<br>
<br><br>
<br>
 <div class="filter">

<div class="card- body">
<table class="table table-striped">
<tr>
      <th > Name</th>
      <th >Nic</th>
      <th >Age</th>
       <th >Phone</th>
        <th >Date</th>
         <th >Area</th>
          <th >Doctor</th>
           <th >Illness</th>

  
</tr> <br> <br>

<?php
if (isset($_POST['search'])) {
$phone= $_POST['phone'];
$query = "SELECT * FROM patient where phone='$phone' ";
$sql=mysqli_query($connection,$query);
 while($row=mysqli_fetch_array($sql))
 {
  ?>
  <tr>
              <td> <?php echo $row['full_name']; ?> </td>
              <td> <?php echo $row['nic']; ?> </td>
              <td> <?php echo $row['age']; ?> </td>
              <td> <?php echo $row['phone']; ?> </td>
              <td> <?php echo $row['dated']; ?> </td>
              <td> <?php echo $row['area']; ?> </td>
              <td> <?php echo $row['doctor']; ?> </td>
              <td> <?php echo $row['illness']; ?> </td>


  </tr>
  <?php
 }

}

?>

</table>

 </div>


      <form action="showApp.php" method="post">
          
<button style="margin: 400px; float: right; padding: 15px; margin-right: 12px;" type="submit" class="btn btn-success"> <i class="fa-solid fa-backward"></i>  Back</button>


        </form>

<script src="https://kit.fontawesome.com/bb3fe22788.js" crossorigin="anonymous"></script>
 


 



</body>
</html>