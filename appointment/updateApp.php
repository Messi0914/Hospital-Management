<?php
include('include/connection.php');

?>

 <?php


$nic=$_GET['updateid'];

$sql = "SELECT * FROM patient where nic=$nic";
 $result= mysqli_query($connection, $sql);
 $row=mysqli_fetch_assoc($result);
$name=$row['full_name'];
$nic=$row['nic'];
$age=$row['age'];
$phone=$row['phone'];
$dated=$row['dated'];
$area=$row['area'];
$doctor=$row['doctor'];
$illness=$row['illness'];

 

    if(isset($_POST['submit'])){

$full_name = $_POST['fullName'];
$nic = $_POST['nic'];
$age = $_POST['age'];
$phone = $_POST['phone'];
$dated = $_POST['dated'];
$area = $_POST['area'];
$doctor =$_POST['doctor'];
$illness = $_POST['illness'];


$sql = "update patient set nic=$nic,full_name='$full_name',age='$age',phone='$phone',dated='$dated',area='$area',doctor='$doctor',illness='$illness' where nic=$nic";

$result=mysqli_query($connection,$sql);
    if ($result) {
        
        header('location:showApp.php');
       



    }else{

        die(mysqli_error($connection));
    }

    }
 ?>



<!DOCTYPE html>
<html>
<head>
    <title>Contact us</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0">

     <link rel="stylesheet" type="text/css" href="css/all.css">

</head>
<body>


    <div class="container">
        <div class="contact-box">
            <div class="left"></div>
            <div class="right">
                <h2>Update Your Appointemnt</h2>

                <form method="post" action="">

                <input type="text" name="fullName" class="field" placeholder="Enter Your Name" value=<?php echo $name;?>>
                <input type="text" name="nic" class="field" placeholder="Enter Your NIC Number"value=<?php echo $nic;?>>

                <?php if(isset($nic_error)) { ?>
                                 <p><?php echo $nic_error ?> </p> <?php
                                 } ?>

                <input type="text" name="age" class="field" placeholder="Enter Your Age" value=<?php echo $age;?>>

                <?php if(isset($age_error)) { ?>
                                 <p><?php echo $age_error ?> </p> <?php
                                 } ?>

                <input type="text" name="phone" class="field" placeholder="Enter Your Phone Number"value=<?php echo $phone;?>>

                    <?php if(isset($phone_error)) { ?>
                                 <p><?php echo $phone_error ?> </p> <?php
                                 } ?> 

                <input type="text" name="dated" class="field" placeholder="Select a Date"value=<?php echo $dated;?>>
                <?php if(isset($dated_error)) { ?>
                                 <p><?php echo $dated_error ?> </p> <?php
                                 } ?>

                <input type="text" name="area" class="field" placeholder="Enter Your Area" value=<?php echo $area;?>>
                    <?php if(isset($area_error)) { ?>
                                 <p><?php echo $area_error ?> </p> <?php
                                 } ?>

                <input type="text" name="doctor" class="field" placeholder="Select a Doctor" value=<?php echo $doctor;?>>

                <?php if(isset($doctor_error)) { ?>
                                 <p><?php echo $doctor_error ?> </p> <?php
                                 } ?>

                <input type="text" name="illness" class="field" placeholder="Illness" value=<?php echo $illness;?>>

                <?php if(isset($illness_error)) { ?>
                                 <p><?php echo $illness_error ?> </p> <?php
                                 } ?>

                <button class="btn" name="submit"> Update Appointment</button>
            </form>
            </div>
        </div>
    </div>

    






</body>
</html>







    
 