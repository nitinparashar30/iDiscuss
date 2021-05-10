<?php
include "include/header.php";
if(isset($_SESSION['login']))
{
    
$name = $_SESSION['name'];
$email = $_SESSION['email'];
$userid = $_SESSION['userid'];
    
}


$noresult =true;
$succdiv = false;

$thid = $_GET['thid'];

$sql = "SELECT * FROM `threads` WHERE `thid` = $thid";

$result = mysqli_query($con, $sql);

$rowt = mysqli_fetch_array($result);

$thtitle  = $rowt['thtitle'];
    $thdes  = $rowt['thdes'];
    $thuserid  = $rowt['thuserid'];
    $username  = $rowt['username'];
    $dt  = $rowt['dt'];
    $thid  = $rowt['thid'];

if(isset($_POST['comtdes']))
{
    $thid  = $_GET['thid'];
    $comtdes = $_POST['comtdes'];

$sqlcc = "INSERT INTO `comments` (`comtdes`, `thid`, `userid`, `username`, `dt`)
 VALUES ('$comtdes', '$thid', '$userid', '$name', current_timestamp());";

$resultcc = mysqli_query($con, $sqlcc);

if($result)
{
    $succdiv = true;
}

}


?>

<div class="container col-xm my-3">

    <div class="jumbotron">
        <h3 class="display-12"><strong>Ques.</strong><?php echo $thtitle; ?> </h3>
        <p class="lead"><?php echo $thdes; ?></p>
        <hr class="my-4">
        <span>Posted by<strong> <?php echo $username; ?> </strong></sapn>
            <span class="float-right">Posted at <strong><?php echo $dt; ?> </strong></span>
    </div>
    <?php
if($succdiv)
{
    echo'<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Thank you!</strong> Your Comment has been posted successfully.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
}
    ?>


<button class="btn btn-outline-primary btn-lg" type="button" data-toggle="collapse" data-target="#collapseExample"
        aria-expanded="false" aria-controls="collapseExample">
        Add your comment here
    </button>
    </p>
    <div class="collapse" id="collapseExample">
        <div class="card card-body">
        <form action="ques.php?thid=<?php echo $thid; ?>" method="post">
            <div class="form-group">
                <label for="thdes"><strong>Enter your comment</strong></label>
                <textarea class="form-control" placeholder="Start type your comment....." id="comtdes" name="comtdes" rows="3" required></textarea>

            </div>
            <button type="submit" class="btn btn-outline-warning">Post your Comment</button>
        </form>

        </div>
    </div>

    <h2 class="py-2">Discussions </h2>

    <?php
$sqlc = "SELECT * FROM `comments` WHERE `thid` = $thid ORDER BY `comments`.`cmtid` DESC";

$resultc = mysqli_query($con, $sqlc);

while ($rowc = mysqli_fetch_array($resultc))
{
$noresult = false;
$cmtid = $rowc['cmtid'];
$comtdes = $rowc['comtdes'];
 $dt  = $rowc['dt'];
 $username  = $rowc['username'];
 $userid  = $rowc['userid'];
?>

    <div class="media">
        <img src="img/user1.png" class="mr-3" alt="...">
        <div class="media-body">
        <span class="float-right">Posted at <strong><?php echo $dt; ?> </strong></span>
        <span>By <strong><a href="user.php?userid=<?php echo $userid ?>"> <?php echo $username; ?></a> </strong></sapn>
            <p><?php echo $comtdes; ?></p>
            <button class="badge badge-primary" type="button" data-toggle="collapse" data-target="#collapseExample"
        aria-expanded="false" aria-controls="collapseExample">Add Reply</button>
        </div>

    </div>
    <hr class="my-4">

    <?php }

if($noresult){
    echo'<div class="jumbotron jumbotron-fluid">
      <div class="container">
        <h4>No comments found.</h4>
        <p class="lead">Be the first person to comment.</p>
      </div>
    </div>';
    }
    ?>

</div>


<?php  include "include/footer.php" ?>