<?php
include "include/header.php";

if(isset($_POST['msg1'])){





$msg = $_POST['msg1'];

$sql = "INSERT INTO `messages` (`msg`, `userid`, `senderid`, `dt`) 
VALUES ('$msg', '15', '14', current_timestamp());";
$result = mysqli_query($con, $sql);
}




$sqlg = "SELECT * FROM `messages` WHERE (`sendid` = 15 AND `recid` = 14) OR (`sendid` = 14 AND `recid` = 15) ORDER BY `sno`";
$resultg = mysqli_query($con, $sqlg);

while($rowg = mysqli_fetch_array($resultg)){

    $msg = $rowg['msg'];
    $dt = $rowg['dt'];
    $sendid = $rowg['sendid'];


    echo "$sendid <strong>$msg</strong> at $dt<br>";
}

?>


<form action="test2.php" method="post">

<input type="text" name="msg1" id="">
<button type="submit">submit</button>


</form>