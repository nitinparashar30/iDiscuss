<?php
include "include/db.php";

$sql = "SELECT * FROM `follows` WHERE `userid` = 14";
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


echo "by $username <br> $thtitle <br> $thdes<br>";

}
}


?>