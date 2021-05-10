<?php
include "include/header.php";

if(isset($_GET['success'])){

$success = $_GET['success'];
$error = $_GET['error'];


if($success=="trueup"){
echo'<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
<strong>Signup success!</strong> You can Login now.
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true">&times;</span>
</button>
</div>';}

if($success=="truein"){

  $name =  $_SESSION['name'];
$email = $_SESSION['email'];
$userid =$_SESSION['userid'];
 
  echo'<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
  <strong>Welcome!</strong>'.$name.' You are Login now, your email is '.$email.'
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  </div>';}

if($success=="false"){
    echo'<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
    <strong>Error!</strong>'.$error.'.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    </div>';}

}







include "include/slider.php";

?>



<center class="my-3">

<?php if($logoutdiv==true){

echo'Click to view your profile <br/><a type="button" href="http://infonp.lovestoblog.com/user.php?userid='.$userid.'" class="btn btn-outline-dark btn-lg">Welcome ! '.$name.'</a>
<span class="badge badge-pill badge-primary">eMail-ID : '.$email.'</span>'; }?> </center>



<div class="container md-4">

    <h3 class="text-center my-2 text-center"> iDiscuss Categories </h3>
    <div class="row">

        <?php

$sql = "SELECT * FROM `categories`";

$result = mysqli_query($con,$sql);

while ($row = mysqli_fetch_array($result)){

  $id = $row['catid'];
  $catname = $row['catname'];
  $catdes =  $row['catdes'];
  $dt =  $row['dt'];

?>

        <div class="col-md-4 my-2">
            <div class="card" style="width: 18rem;">
                <img src="https://source.unsplash.com/300x200/?coding,<?php echo $catname; ?>" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title"> <a href="thread.php?catid=<?php echo $id; ?>"> <?php echo $catname; ?></a>
                    </h5>
                    <p class="card-text"><?php echo substr($catdes, 0, 50) ; ?>.....</p>
                    <a href="thread.php?catid=<?php echo $id; ?>" class="btn btn-primary">View threads</a>

                </div>
                <span class="badge badge-success">Created at : <?php echo $dt ; ?></span>
            </div>
        </div>
        <?php } ?>





    </div>
</div>
</div>
<hr class="my-4">

    
    <h3 class="text-center my-2"> iDiscuss Lets Start a Discussion</h3>
    <div class="container md-4 my-3">
    <div class="card card-body">
        <form action="/forum/include/catentry.php" method="post">

            <div class="form-group">
                <label for="thcat">Select Category</label>
                <select class="form-control" name="catid" >
                    <option value="null">SELECT</option>
                    <?php

$sql = "SELECT * FROM `categories`";

$result = mysqli_query($con,$sql);

while ($row = mysqli_fetch_array($result)){

  $catname = $row['catname'];
  $catid = $row['catid'];


  echo'<option value="'.$catid.'">'.$catname.'</option> ';
}

?>
                </select>

            </div>
            <div class="form-group">
                <label for="title">Question Title</label>
                <input type="text" class="form-control" id="tite" name="thtitle" aria-describedby="title" required>
                <small id="title" class="form-text text-muted">Keep your Title short and simple.</small>
            </div>

            <div class="form-group">
                <label for="thdes">Ellaborate your consern</label>
                <textarea class="form-control" id="thdes" name="thdes" rows="3" required></textarea>

            </div>
            <button type="submit" class="btn btn-outline-warning">Post your Question</button>
        </form>
    </div>
</div>
<div class="container md-4 my-3">
<div class="jumbotron">
  <h1 class="display-4">Welcome to iDiscuss!</h1>
  <p class="lead">Please login or Create a account to start a discussion.</p>
  <hr class="my-4">
  <p>You can signup with some simple steps. </p>
  <div class="container col-md-4">
  <a class="btn btn-outline-success btn-lg btn-block" data-toggle="modal" data-target="#signin">Signin</a>
  <a class="btn btn-outline-warning btn-lg btn-block" data-toggle="modal" data-target="#signup">Signup</a>
  </div>
</div>
</div>



<?php include "include/footer.php"; ?>