<?php
include "include/header.php" ;

$query = $_GET['query'];

$noresult = true;

?>
<div class="container col-md-8">
<h3 class="my-3 text-center">Search result for <em><?php echo $query;  ?>  </em> </h3>
<?php
$sqlu = "SELECT * FROM `users` WHERE `name` LIKE '%$query%'";

$resultu = mysqli_query($con, $sqlu);
$countu = mysqli_num_rows($resultu);
while($rowu = mysqli_fetch_array($resultu)){

$name =  $rowu['name'];
$sno =  $rowu['sno'];
$email =  $rowu['email'];
$noresult = false;

?>

<div class="media">
             <div class="media-body"><ul>
            <li><span><strong><a href="/forum/user.php?userid=<?php echo $sno; ?>"> <?php echo $name; ?></a> </strong></sapn>
            <p><?php echo $email; ?></p></li></ul>
            </div>
    <hr class="my-4">

</div>
<?php }
?>







<?php
$sql = "SELECT * FROM threads WHERE MATCH (thtitle, thdes) against ('$query')";

$result = mysqli_query($con, $sql);
$count = mysqli_num_rows($result);
while($row = mysqli_fetch_array($result)){

$thtitle =  $row['thtitle'];
$thdes =  $row['thdes'];
$thid =  $row['thid'];
$noresult = false;



?>

<div class="media">
             <div class="media-body"><ul>
            <li><span><strong><a href="/forum/ques.php?thid=<?php echo $thid; ?>"> <?php echo $thtitle; ?></a> </strong></sapn>
            <p><?php echo $thdes; ?></p></li></ul>
            </div>
    <hr class="my-4">

</div>
<?php }

if($noresult){

    echo'<div class="jumbotron jumbotron-fluid">
    <div class="container">
      <h4>Your search <em>'.$query.'</em> did not match any documents.</h4>
      <h6>Suggestions:</h6>      
      Try different keywords.
   
    </div>
  </div>';
}

?>