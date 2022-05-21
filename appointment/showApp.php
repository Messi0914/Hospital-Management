
<?php
include('include/connection.php');

$page='appointment';
include 'include/header.php';

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

        <link rel="stylesheet" type="text/css" href="css/all.css">
    <title></title>
  </head>

  <body style="background: #CCCCCC;">
   <div class="row">
<div class="col">
  <div class="container">
<div class="card mt-5">

      <div class="card-header">
<form action="searchApp.php" method="post">
          <button type="submit" class="btn btn-success mb-5">Check Your Apppointment . <i class="fa-solid fa-magnifying-glass"></i></button>

   <form action="pdf2.php" method="post">
          <button style=" padding: 10px 10px; float:right; margin-right:100px;" type="submit" class="btn btn-danger
           mb-5  ">PDF  <i class="fa-solid fa-file-pdf"></i></button>
</form>       

        </form>
<div class="card- body">
    <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Name</th>
      <th scope="col">NIC</th>
      <th scope="col">Age</th>
      <th scope="col">Phone</th>
       <th scope="col">Date</th>
      <th scope="col">Area</th>
      <th scope="col">Doctor</th>
      <th scope="col">Illness</th>
      <th scope="col">Operations</th>
    </tr>
 </thead>

</div>
  <tbody>


    <?php 
$sql = "SELECT * FROM patient  ";
$result= mysqli_query($connection, $sql);
      if($result){

        while($row=mysqli_fetch_assoc($result)){

        $name=$row['full_name'];
        $nic=$row['nic'];
        $age=$row['age'];
        $phone=$row['phone'];
        $dated=$row['dated'];
        $area=$row['area'];
        $doctor=$row['doctor'];
        $illness=$row['illness'];

         echo ' <tr>

      <td scope="row">'.$name.'</td>
      <td >'.$nic.'</td>
      <td>'.$age.'</td>
      <td>'.$phone.'</td>
      <td>'.$dated.'</td>
      <td>'.$area.'</td>
      <td>'.$doctor.'</td>
      <td>'.$illness.'</td>

      <td>

      <button class="btn btn-primary" ><a href="updateApp.php?updateid='.$nic.'" class= "text-light"> <i class="fa-solid fa-square-pen"></i> </button>

    <button class="btn btn-danger"><a href="deleteApp.php?deleteid='.$nic.'" class= "text-light"><i class="fa-solid fa-trash-can"></i></button>    
      </td>
    </tr>';

      }
}
?>
</tbody>
</table>


        <form action="Add.php" method="post">
          
<button style="" type="submit" class="btn btn-secondary mb-5 "><i class="fa-solid fa-backward"></i> Back</button>
        </form>
</div>
</div>
</div>
</div> 
</div>
 </body>
</html>




