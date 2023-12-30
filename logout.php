<?php

session_start();
    include 'connection.php';

    
    $sqll = "UPDATE sitedata SET status= NULL WHERE username='".$_SESSION['username']."' AND password='".$_SESSION['password']."' ";
    $resu = mysqli_query($conn , $sqll);
    session_abort();
    header('Location:projlog.php');
    

?>