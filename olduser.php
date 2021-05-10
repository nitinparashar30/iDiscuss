<?php
include "include/header.php";

if(isset($_SESSION['name'])){

    $name =  $_SESSION['name'];
$email = $_SESSION['email'];
$userid =$_SESSION['userid'];

$noactivity = true;
}
if(isset($_GET['userid'])){
    $userid = $_GET['userid'];

    $sqlur = "SELECT * FROM `users` WHERE `sno` = $userid";
    $resultur = mysqli_query($con, $sqlur);
    
    $rowur = mysqli_fetch_array($resultur);
    $name  = $rowur['name'];
    $email = $rowur['email'];

}


?>
<div class="container my-3">
    <div class="row my-2">
        <div class="col-lg-8 order-lg-2">
            <ul class="nav nav-tabs">

                <li class="nav-item">
                    <a href="" data-target="#feed" data-toggle="tab" class="nav-link active">Feeds</a>
                </li>
                <li class="nav-item">
                    <a href="" data-target="#profile" data-toggle="tab" class="nav-link">Profile</a>
                </li>
                <li class="nav-item">
                    <a href="" data-target="#messages" data-toggle="tab" class="nav-link">Messages</a>
                </li>
                <li class="nav-item">
                    <a href="" data-target="#edit" data-toggle="tab" class="nav-link">Edit</a>
                </li>
            </ul>
            <div class="tab-content py-4">
                <div class="tab-pane active" id="feed">
                    <?php


$sql = "SELECT * FROM `follows` WHERE `userid` = $userid";
$result = mysqli_query($con, $sql);

while($row = mysqli_fetch_array($result)){

    $followid = $row['followid'];

    $sqlu = "SELECT * FROM `threads` WHERE `thuserid` = $followid";
    $resultu = mysqli_query($con, $sqlu);

while($rowu = mysqli_fetch_array($resultu)){

    $thtitle    = $rowu['thtitle'];
    $thdes  = $rowu['thdes'];
    $dt = $rowu['dt'];
    $username = $rowu['username'];
    $thuserid = $rowu['thuserid'];
    $thid = $rowu['thid'];


?>





                    <div class="media">
                        <img src="img/user1.png" class="mr-3" alt="...">
                        <div class="media-body">
                            <span><strong><a href="user.php?userid=<?php echo $thuserid ?>">
                                        <?php echo $username; ?></a> </strong></sapn>
                                <span class="float-right">Posted at <strong><?php echo $dt; ?> </strong></span>
                                <h6 class="mt-0"><a href="ques.php?thid=<?php echo $thid; ?>">
                                        <?php echo $thtitle; ?></a></h6>
                                <p><?php echo $thdes; ?></p>
                                <a href="ques.php?thid=<?php echo $thid; ?>" class="badge badge-primary">Add Comment</a>
                        </div>

                    </div>
                    <hr>
                    <?php
}
}


?>




                </div>

                <div class="tab-pane" id="profile">
                    <h5 class="mb-3"><?php echo $name;?></h5>

                    <div class="row">
                        <div class="col-md-6">
                            <h6>E-mail Id</h6>
                            <p>eMail - <em><?php echo $email;?></em></p>
                            <h6>Hobbies</h6>
                            <p>
                                Indie music, skiing and hiking. I love the great outdoors.
                            </p>
                        </div>
                        <div class="col-md-6">
                            <h6>Recent categories</h6>
                            <?php
                                $sql = "SELECT * FROM `threads` WHERE `thuserid` = $userid ORDER BY `thid` DESC";

                                $result = mysqli_query($con, $sql);
                                $count = mysqli_num_rows($result);
                                while($row = mysqli_fetch_array($result)){
                                
                                $thcatid =  $row['thcatid'];
                                $sqlct = "SELECT * FROM `categories` WHERE `catid` = $thcatid";
                                $resultct = mysqli_query($con, $sqlct);
                                while($row = mysqli_fetch_array($resultct)){
                                    $catname = $row['catname'];
                                
                                    echo '<a href="#" class="badge badge-dark badge-pill">'.$catname.'</a>';
                                }


                            


                                }
                                ?>

                            <hr>
                            <?php
                                $sql = "SELECT * FROM `threads` WHERE `thuserid` = $userid ORDER BY `thid` DESC";

                                $result = mysqli_query($con, $sql);
                                $count = mysqli_num_rows($result);
                                echo'<span class="badge badge-primary"><i class="fa fa-user"></i> '.$count.' Threads</span>';
                                ?>

                            <span class="badge badge-success"><i class="fa fa-cog"></i> 43 Forks</span>
                            <span class="badge badge-danger"><i class="fa fa-eye"></i> 245 Views</span>
                        </div>
                        <div class="col-md-12">
                            <h5 class="mt-2"><span class="fa fa-clock-o ion-clock float-right"></span> Recent Activity
                            </h5>
                            <table class="table table-sm table-hover table-striped">
                                <tbody>
                                    <?php
                                $sql = "SELECT * FROM `threads` WHERE `thuserid` = $userid ORDER BY `thid` DESC";

                                $result = mysqli_query($con, $sql);
                                $count = mysqli_num_rows($result);
                                while($row = mysqli_fetch_array($result)){
                                
                                $thtitle =  $row['thtitle'];
                                $thdes =  $row['thdes'];
                                $thid =  $row['thid'];
                                $dt =  $row['dt'];

                                $dt1 = date('d F Y, h:i:s A');
                                $noactivity = false;
                                
                                echo' <tr>
                                <td>
                                   <a href= "ques.php?thid='.$thid.'"> <strong>'.$thtitle.'</strong></a>
                                    <p><em>'.$thdes.' </em></p>
                                    <span class="float-right">Posted at <strong>'.$dt.'</strong></span>
                                </td>
                            </tr>';

                                }
                                if($noactivity)
                                echo'<h5><em>No recent activities</em></h5>
                                <p>Please go and start new discussions.</p>';

                                ?>


                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!--/row-->
                </div>
                <div class="tab-pane" id="messages">
                    <div class="alert alert-info alert-dismissable">
                        <a class="panel-close close" data-dismiss="alert">×</a> This is an <strong>.alert</strong>. Use
                        this to show important messages to the user.
                    </div>
                    <table class="table table-hover table-striped">
                        <tbody>
                            <tr>
                                <td>
                                    <span class="float-right font-weight-bold">3 hrs ago</span> Here is your a link to
                                    the latest summary report from the..
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
                <div class="tab-pane" id="edit">
                    <form role="form">
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">First name</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="text" value="Jane">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Last name</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="text" value="Bishop">
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-2 order-lg-1 text-center">
            <h5 class="mb-3"><?php echo $name;?></h5>
            <img src="img/user1.png" class="mx-auto img-fluid img-circle d-block" alt="avatar">
            <h6>E-mail Id</h6>
            <p> <?php echo $email;?></p>
            <label class="custom-file">
                <input type="file" id="file" class="custom-file-input">
                <span class="custom-file-control">Choose file</span>
            </label>
        </div>
    </div>
</div>

<?php 

include "include/footer.php";
?>