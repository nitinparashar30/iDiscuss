<?php
include "include/header.php";




$sqlg = "SELECT * FROM `messages` WHERE `sendid` = $userid OR `recid` = $userid";
                                            $resultg = mysqli_query($con, $sqlg);
                                            
                                            while($rowg = mysqli_fetch_array($resultg)){
                                            
                                                
                                                $recid = $rowg['recid'];
                                                $sendid = $rowg['sendid'];
                                                $dt = $rowg['dt'];
                                            
                                            
                                                echo "$sendid to <strong>$recid</strong> at $dt<br>";
                                            }



?>
