<?php
include "db.php";

if(isset($_POST['name']))
{

        $name  = $_POST['name'];
        $email = $_POST['email'];
        $passw = $_POST['passw'];
        $passc = $_POST['passc'];

    if($passw==$passc)

    {
        $sql = "SELECT * FROM `users` WHERE `email` = '$email'";
        $result = mysqli_query($con, $sql);
        $row  = mysqli_num_rows($result);

           if($row > 0)

               {
                   $error = "User_already_Exist";
                }
                 else {

                            $passh = password_hash($passw, PASSWORD_DEFAULT);

                            $sqlf = "INSERT INTO `users` ( `name`, `email`, `passw`, `dt`) 
                            VALUES ('$name', '$email', '$passh', current_timestamp());";
                            $resultf = mysqli_query($con, $sqlf);
    
                                  if($resultf){

                                      header("location:/forum/index.php?success=trueup&error=false");
                                      exit();
                                              }           
                                                   }


                                                          }
else{

    $error = "Password_not_match";
}
header("location:/forum/index.php?success=false&error=$error");
}



?>

<!-- Modal -->
<div class="modal fade" id="signup" tabindex="-1" role="dialog" aria-labelledby="signupLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="signupLabel">iDiscuss Signup Here</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="include/signup.php" method="post">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" id="exampleInputEmail1"
                            aria-describedby="emailHelp">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="text" name="email" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" name="passw" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Confirm Password</label>
                        <input type="password" name="passc" class="form-control" id="exampleInputPassword1">
                    </div>

                    <button type="submit" class="btn btn-warning col-md-12">Signup</button>
                </form>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>