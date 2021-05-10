<?php
include "include/header.php";

$sql = "SELECT DISTINCT `sendname` FROM `messages` WHERE `recid` = 10";

$result = mysqli_query($con, $sql);

while ($row = mysqli_fetch_array($result))
{

$sendname = $row['sendname'];

echo " $sendname <br>";

}





?>