<?php
session_start();


if(isset($_POST['removeProfile'])){
    
    include('config.php');


    $loggedInUser = $_SESSION['user_id'];


    $sql = "DELETE FROM `user_form` WHERE id='$loggedInUser'";


    $result  = mysqli_query($conn,$sql);

    if($result){

        if(isset($_SESSION['user_image'])){
            $removeImageFromDirectory = 'uploaded_img'.$_SESSION['user_id'].'/'.$_SESSION['user_image'];

            unlink($removeImageFromDirectory);
            unset($_SESSION['user_image']);
            unset($_SESSION['user_id']);
        }
        
        session_destroy();
        header('Location:index.php');
        exit;
    }

}


?>