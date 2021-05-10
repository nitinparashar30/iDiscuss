<?php
include "db.php";
if(isset($_POST['email']))
{

    $email = $_POST['email'];
    $passe = $_POST['passw'];

    $sql = "SELECT * FROM `users` WHERE `email` = '$email'";
    $result = mysqli_query($con, $sql);
    $count = mysqli_num_rows($result);
    if($count>0)
    {

      $row = mysqli_fetch_array($result);

      $name   = $row['name'];
      $email  = $row['email'];
      $userid   = $row['sno'];
      $passw   = $row['passw'];

      if(password_verify($passe, $passw)){

      header("location:/forum/index.php?success=truein&error=false");
      session_start();
      $_SESSION['name'] = $name;
  $_SESSION['email'] = $email;
  $_SESSION['userid'] = $userid ;
  $_SESSION['login'] = true;
      
      exit(); 
     
      
    
    }
                    else{
                        $error = "PASSWORD_INCORRECT";
                    }
    }
        else
             {
                 $error = "USER_NOT_EXIST";
               
             }
             header("location:/forum/index.php?success=false&error=$error");

}



?>




    <!-- Modal -->
    <div class="modal fade" id="signin" tabindex="-1" role="dialog" aria-labelledby="signinLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="signinLabel">iDiscuss Signin Here</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                   <form action="include/signin.php" method="post">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="text" name="email" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp">
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                                else.</small>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" name="passw" class="form-control" id="exampleInputPassword1">
                        </div>

                        <button type="submit" class="btn btn-success col-md-12">Signin</button>
                    </form>
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>
