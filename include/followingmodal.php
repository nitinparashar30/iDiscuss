<!-- Button trigger modal -->
<?php
include "db.php";


if(isset($_SESSION['login']))
{ 
$name = $_SESSION['name'];
$email = $_SESSION['email'];
$userid = $_SESSION['userid'];

}


?>

<!-- Modal -->
<div class="modal fade" id="followingModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Follwers</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php
        
        $sqlct = "SELECT * FROM `follows` WHERE `userid` = $userid";
        $resultct = mysqli_query($con, $sqlct);
        $countct = mysqli_num_rows($resultct);
while ($row = mysqli_fetch_array($resultct))
{
$followid = $row['followid'];

$sql = "SELECT * FROM `users` WHERE `sno` = $followid";
$result = mysqli_query($con, $sql);

while ($rowu = mysqli_fetch_array($result))
{
$namef = $rowu['name'];

echo '<h4><em><a href="user.php?userid='.$followid.'">'.$namef.' </a> </em></h4>';
}


    
}
        ?>
      </div>
      <div class="modal-footer">
        
      </div>
    </div>
  </div>
</div>