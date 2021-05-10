<?php

session_start();
include "db.php";
include "signin.php";
include "signup.php";
include "followmodal.php";
include "followingmodal.php";


$logoutdiv = false;
$logindiv  = true;



if(isset($_GET['success'])){

    $success = $_GET['success'];
    $error = $_GET['error'];

}
if(isset($_SESSION['login']))
{
    
    $logoutdiv = true;
    $logindiv  = false;
   
    $name = $_SESSION['name'];
$email = $_SESSION['email'];
$userid = $_SESSION['userid'];
    
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>idiscuss - Forum</title>
    <link rel="shortcut icon" href="include/myspace.png">

    <style>
    html {
        zoom: 100%;
    }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">

        <a class="navbar-brand" href="index.php"><img src="include/myspace.png" /> iDiscuss</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="cat.php" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Categroies
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <?php

$sql = "SELECT * FROM `categories`";

$result = mysqli_query($con,$sql);

while ($row = mysqli_fetch_array($result)){

  $catname = $row['catname'];
  $catid = $row['catid'];


  echo'<a class="dropdown-item" href="thread.php?catid='.$catid.'">' .$catname. '</a>';
}

?>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" tabindex="-1" aria-disabled="true">Contact</a>
                </li>
                
            </ul>
<?php if($logoutdiv==true){

echo'<img src="img/user1.png" width="60px" class="btn btn-outline-light mr-3" alt="..."><a type="button" href="/forum/user.php?userid='.$userid.'" class="btn btn-outline-light btn-lg mr-5">Welcome ! '.$name.'</a>
<span class="badge badge-pill badge-primary mr-5">eMail-ID : '.$email.'</span>'; }?>
            <form class="form-inline my-2 my-lg-0" action= "/forum/search.php"  method = "get">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" name="query" aria-label="Search">
                <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button></form>
               <?php 
               if($logindiv == true){
                echo'
                <button type="button" class="btn btn-outline-success ml-2" data-toggle="modal"
                    data-target="#signin">Signin</button>
                <button type="button" class="btn btn-outline-warning ml-2" data-toggle="modal"
                    data-target="#signup">Signup</button>';

               }?>
<?php
if($logoutdiv==true){
echo' <a href="logout.php" class="btn btn-outline-danger ml-2">Logout</a>';}

?>
                   
            

        </div>
    </nav>

    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
    </script>
</body>

</html>