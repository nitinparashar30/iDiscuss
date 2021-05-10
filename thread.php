<?php
include "include/header.php";

if(isset($_SESSION['login']))
{
    
$name = $_SESSION['name'];
$email = $_SESSION['email'];
$userid = $_SESSION['userid'];
    
}


$noresult = true;
$succdiv = false;
$catid = $_GET['catid'];

$sql = "SELECT * FROM `categories` WHERE `catid` = $catid";

$result = mysqli_query($con, $sql);

$row = mysqli_fetch_array($result);

$catname  = $row['catname'];
$catdes  = $row['catdes'];


if(isset($_POST['thtitle']))

{
    $thtitle  = $_POST['thtitle'];  
    $thdes  = $_POST['thdes'];
    $catid  = $_GET['catid'];
    

    $sqlth = "INSERT INTO `threads` ( `thtitle`, `thdes`, `thcatid`, `thuserid`, `username`, `dt`) 
    VALUES ('$thtitle', '$thdes', '$catid', '$userid', '$name', current_timestamp());";

    $resultth = mysqli_query($con, $sqlth);

    if($resultth)
    {
        $succdiv = true;
    }
    
}




?>

<div class="container col-xm my-3">

    <div class="jumbotron">
        <h1 class="display-12">Welcome to <?php echo $catname; ?> forums</h1>
        <p class="lead"><?php echo $catdes; ?></p>
        <hr class="my-4">
        <a class="btn btn-outline-warning" href="#" role="button">Learn more</a>
    </div>
    <?php
if($succdiv)
{
    echo'<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Thank you!</strong> Your Question has been posted successfully.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
}
    ?>


    <button class="btn btn-outline-primary btn-lg" type="button" data-toggle="collapse" data-target="#collapseExample"
        aria-expanded="false" aria-controls="collapseExample">
        Start a Discussion
    </button>
    </p>
    <div class="collapse" id="collapseExample">
        <div class="card card-body">
            <form action="thread.php?catid=<?php echo $catid; ?>" method="post">
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



    <h2 class="py-2">Browse Questions </h2>
    <?php
$sqlt = "SELECT * FROM `threads` WHERE `thcatid` = $catid  ORDER BY `threads`.`thid` DESC";

$resultt = mysqli_query($con, $sqlt);

while ($rowt = mysqli_fetch_array($resultt))
{
    $noresult = false;
    $thtitle  = $rowt['thtitle'];
    $thdes  = $rowt['thdes'];
    $thuserid  = $rowt['thuserid'];
    $username  = $rowt['username'];
    $dt  = $rowt['dt'];
    $thid  = $rowt['thid'];
?>

    <div class="media">
        <img src="img/user1.png" class="mr-3" alt="...">
        <div class="media-body">
            <h6 class="mt-0">Ques.<a href="ques.php?thid=<?php echo $thid; ?>"> <?php echo $thtitle; ?></a></h6>
            <p><?php echo $thdes; ?></p>
            <span>Posted by <strong><a href="user.php?userid=<?php echo $thuserid ?>"> <?php echo $username; ?></a> </strong></sapn>
                <span class="float-right">Posted at <strong><?php echo $dt; ?> </strong></span>
                <a href="ques.php?thid=<?php echo $thid; ?>" class="badge badge-primary">Add Comment</a>
        </div>

    </div>
    <hr class="my-4">

    <?php }

if($noresult){
echo'<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h4>No threads found.</h4>
    <p class="lead">Be the first person to ask.</p>
  </div>
</div>';
}
    ?>


</div>


<?php  include "include/footer.php" ?>