<?php
include "db.php";
session_start();
if(isset($_SESSION['login']))
{
    
$name = $_SESSION['name'];
$email = $_SESSION['email'];
$userid = $_SESSION['userid'];


    
}

if(isset($_POST['thtitle']))

{
    $thtitle  = $_POST['thtitle'];  
    $thdes  = $_POST['thdes'];
    $catid = $_POST['catid'];

    $sqlth = "INSERT INTO `threads` ( `thtitle`, `thdes`, `thcatid`, `thuserid`, `username`, `dt`) 
    VALUES ('$thtitle', '$thdes', '$catid', '$userid', '$name', current_timestamp());";

    $resultth = mysqli_query($con, $sqlth);

    //header("location:/forum/index.php");


    
}




?>