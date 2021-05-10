<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <style>
  .anyClass {
  height:350px;
  overflow-y: scroll;
}
  </style>
  
</head>
<body>
  <?php include "include/header.php";

  $logindiv = false;
$noactivity = true;
if(isset($_SESSION['name'])){

  $name =  $_SESSION['name'];
$email = $_SESSION['email'];
$userid =$_SESSION['userid'];

$logindiv = true;
}
if(isset($_GET['userid'])){
  $useridg = $_GET['userid'];

  $sqlur = "SELECT * FROM `users` WHERE `sno` = $useridg";
  $resultur = mysqli_query($con, $sqlur);
  
  $rowur = mysqli_fetch_array($resultur);
  $name  = $rowur['name'];
  $email = $rowur['email'];

}
  ?>

<div class="container">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-lg-4">
                  <div class="border-bottom text-center pb-4">
                    <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="profile" class="img-lg rounded-circle mb-3">
                    <div class="mb-3">
                      <h3><?php echo $name; ?></h3>
                      <div class="d-flex align-items-center justify-content-center">
                        <h5 class="mb-0 mr-2 text-muted">India</h5>
                        <div class="br-wrapper br-theme-css-stars"><select id="profile-rating" name="rating" autocomplete="off" style="display: none;">
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                          <option value="5">5</option>
                        </select><div class="br-widget"><a href="#" data-rating-value="1" data-rating-text="1" class="br-selected br-current"></a><a href="#" data-rating-value="2" data-rating-text="2"></a><a href="#" data-rating-value="3" data-rating-text="3"></a><a href="#" data-rating-value="4" data-rating-text="4"></a><a href="#" data-rating-value="5" data-rating-text="5"></a></div></div>
                      </div>
                    </div>
                    <p><?php echo $email; ?> </p>
                    <p class="w-75 mx-auto mb-3">Bureau Oberhaeuser is a design bureau focused on Information- and Interface Design. </p>
                    <div class="d-flex justify-content-center">

                    <?php
                                $sql = "SELECT * FROM `threads` WHERE `thuserid` = $userid ORDER BY `thid` DESC";

                                $result = mysqli_query($con, $sql);
                                $count = mysqli_num_rows($result);
                                echo'<span class="btn btn-primary mr-3"><i class="fa fa-user"></i> '.$count.' Threads</span>';
                                ?>
                    
                    
                    </div>
                  </div>
                  <div class="border-bottom py-4">
                    <p>Recent categories</p>
                    <div>
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
                                
                                    echo '<a href="#" class="badge badge-success badge-pill">'.$catname.'</a>';
                                }                         


                                }
                                ?>
                       
                    </div>                                                               
                  </div>
                  <div class="border-bottom py-4">
                    <div class="d-flex mb-3">
                      <div class="progress progress-md flex-grow">
                        <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="55" style="width: 55%" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </div>
                    <div class="d-flex">
                      <div class="progress progress-md flex-grow">
                        <div class="progress-bar bg-success" role="progressbar" aria-valuenow="75" style="width: 75%" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </div>
                  </div>
                  <div class="py-4">
                    <p class="clearfix">
                      <span class="float-left">
                        Status
                      </span>
                      <span class="float-right text-muted">
                        Active
                      </span>
                    </p>
                    <p class="clearfix">
                      <span class="float-left">
                        Phone
                      </span>
                      <span class="float-right text-muted">
                        006 3435 22
                      </span>
                    </p>
                    <p class="clearfix">
                      <span class="float-left">
                        Mail
                      </span>
                      <span class="float-right text-muted">
                        Jacod@testmail.com
                      </span>
                    </p>
                    <p class="clearfix">
                      <span class="float-left">
                        Facebook
                      </span>
                      <span class="float-right text-muted">
                        <a href="#">David Grey</a>
                      </span>
                    </p>
                    <p class="clearfix">
                      <span class="float-left">
                        Twitter
                      </span>
                      <span class="float-right text-muted">
                        <a href="#">@davidgrey</a>
                      </span>
                    </p>
                  </div>
                  <button class="btn btn-primary btn-block mb-2">Preview</button>
                </div>
                <div class="col-lg-8">
                  <div class="d-block d-md-flex justify-content-between mt-4 mt-md-0">
                    <div class="text-center mt-4 mt-md-0">
                   <?php
                   if(isset($_POST['followid'])){
                    $followid = $_POST['followid'];
                    $sqlfl = "INSERT INTO `follows` (`userid`, `followid`, `dt`) 
                    VALUES ('$userid', '$followid', current_timestamp())";
                    $resultfl = mysqli_query($con, $sqlfl);
                    }  
                    
                    $sqlcf = "SELECT * FROM `follows` WHERE `followid` = $useridg AND `userid` = $userid";
                    $resultcf = mysqli_query($con, $sqlcf);
                    $countcf = mysqli_num_rows($resultcf);

                    $sqlct = "SELECT * FROM `follows` WHERE `userid` = $userid";
                    $resultct = mysqli_query($con, $sqlct);
                    $countct = mysqli_num_rows($resultct);

                    $sqlctr = "SELECT * FROM `follows` WHERE `followid` = $userid";
                    $resultctr = mysqli_query($con, $sqlctr);
                    $countctr = mysqli_num_rows($resultctr);

                    if ($countcf > 0 && $userid != $useridg)
                    {
                      echo'<button  class="btn btn-success">Followed</button>
                      <button class="btn btn-outline-primary" data-target="#msg" data-toggle="tab">Message</button>';
                    }
                    elseif($userid == $useridg)
                    {
                      echo '<button class="btn btn-outline-success" data-toggle="modal" data-target="#followModal">'.$countctr.' Followers</button>
                      <button  class="btn btn-success" data-toggle="modal" data-target="#followingModal">'.$countct.' Followings</button>';
                    }
                    else{
                      echo'<table><tr><td><form action="user.php?userid='.$useridg.'" method="post">
                      <input type="hidden" name="followid" value="'.$useridg.'">
                      <button  class="btn btn-primary">Follow</button> </form></td><td>
                      <button class="btn btn-outline-primary">Message</button></td></tr></table>';
                    }
                   
                      
                    
                      
                      ?> 
<?php 

?>

                      
                        <input type="hidden" name="followid" value="">
                     
                      </form>
                    </div>
                  </div>
                  <div class="mt-4 py-2 border-top border-bottom">
                    <ul class="nav nav-tabs">
                     <?php                   
                     if($userid == $useridg){
                      echo'<li class="nav-item">
                        <a class="nav-link" href="" data-target="#feed" data-toggle="tab">
                          <i class="mdi mdi-newspaper"></i>
                          Feed
                        </a>
                      </li>'; } ?>


                      
                      <li class="nav-item" >
                        <a class="nav-link active"  href="" data-target="#recent" data-toggle="tab">
                          <i class="mdi mdi-calendar"></i>
                          Recent Activities
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="" data-target="#msg" data-toggle="tab">
                          <i class="mdi mdi-attachment"></i>
                          Messages
                        </a>
                      </li>
                    </ul>
                   </div>
                   <div class="tab-content py-4">
                    <div class="tab-pane" id="feed">
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
                    <hr class="my-3">
<?php }} ?>
                    
</div>
                        <div class="tab-pane active" id="recent">
                        <table class="table table-sm table-hover table-striped">
                                <tbody>
                        <?php
                                $sql = "SELECT * FROM `threads` WHERE `thuserid` = $useridg ORDER BY `thid` DESC";

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
                                <td><span class="float-right">Posted at <strong>'.$dt.'</strong></span>
                                   <a href= "ques.php?thid='.$thid.'"> <strong>'.$thtitle.'</strong></a>
                                    <p><em>'.$thdes.' </em></p>
                                    
                                </td>
                            </tr>';

                                }
                                if($noactivity)
                                echo'<h5><em>No recent activities</em></h5>
                                <p>Please go and start new discussions.</p>';

                                ?></tbody>
                                </table>

                          </div>
                          

                          <div class="tab-pane"  id="msg">
                          <div class="anyClass"><table width=100%>
                          
                                            <?php
if ($_SESSION['userid'] == $_GET['userid'])
{

echo'<table class="table table-sm table-hover table-striped">';

  $sql = "SELECT DISTINCT `sendname` FROM `messages` WHERE `recid` = $userid";

  $result = mysqli_query($con, $sql);
  
  while ($row = mysqli_fetch_array($result))
  {
  
  $sendname = $row['sendname'];
  
  echo '<tr> <td><a href=""><strong> '.$sendname.' </strong> </a> </td> </tr>';
  }  
  echo'</table>';
}

else
{
if(isset($_POST['msg'])){

  $useridg = $_GET['userid'];
  $name =  $_SESSION['name'];
  $sqlur = "SELECT * FROM `users` WHERE `sno` = $useridg";
  $resultur = mysqli_query($con, $sqlur);
  
  $rowur = mysqli_fetch_array($resultur);
  $nameg  = $rowur['name'];
  


  $msg = $_POST['msg'];
  
  $sql = "INSERT INTO `messages` (`msg`, `sendid`, `sendname`, `recid` , `recname`, `dt`) 
  VALUES ('$msg', '$userid' , '$name', '$useridg','$nameg', current_timestamp());";
  $result = mysqli_query($con, $sql); }

                                            $sqlg = "SELECT * FROM `messages` WHERE (`sendid` = $userid AND `recid` = $useridg) OR (`sendid` = $useridg AND `recid` = $userid) ORDER BY `sno`";
                                            $resultg = mysqli_query($con, $sqlg);
                                            
                                            while($rowg = mysqli_fetch_array($resultg)){
                                            
                                                $msg = $rowg['msg'];
                                                $dt = $rowg['dt'];
                                                $sendid = $rowg['sendid'];
                                                $sendname = $rowg['sendname'];
                                            
                                            if ($sendid == $userid) {

                                              echo'<tr><td><div class="alert alert-primary float-right border border-dark"><strong>'.$sendname.'</strong> at '.$dt.'<br>-'.$msg.'</div></td></tr>';
                                            }
                                            else{
                                              echo'<tr><td><div class="alert alert-success float-left border border-dark"><strong>'.$sendname.'</strong> at '.$dt.'<br>-'.$msg.'</div></td></tr>';
                                                
                                            } 
                                            }
                                          }
                                            ?>
                                            </table></div>
                                           
 <form action="/forum/user.php?userid=<?php echo $useridg; ?>&msg=true" method="post"><div class="form-group">                   
                    <textarea class="form-control" id="msg" name="msg" rows="3" width="120%" required></textarea>
                </div></td>
                <td><button type="submit" class="btn btn-primary float-right">Send Message</button></form>
</div>
                        
</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


    <?php
    include "include/footer.php";
    ?>
    </body>
</html>