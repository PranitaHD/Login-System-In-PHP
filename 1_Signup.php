<?php
     $showAlert = false;
     $showError = false;
     if ($_SERVER["REQUEST_METHOD"] == "POST")
     {
          include "database_connection.php";
          $username = $_POST["username"];
          $password = $_POST["password"];
          $cpassword = $_POST["cpassword"];

          // Check whether this username already exists
          $exists = "SELECT * FROM `users` WHERE username='$username'";
          $result = mysqli_query($con, $exists);
          $numExists = mysqli_num_rows($result);
          if ($numExists > 0) 
               $showError = "Username already exists..!!";
          else 
          {
               if(($password == $cpassword))
               {
                    $hash = password_hash($password, PASSWORD_DEFAULT);
                    $sql = "INSERT INTO `users` (`username`, `password`, `date`) VALUES ('$username', '$hash', current_timestamp())";
                    $result = mysqli_query($con, $sql);
                    if ($result) {
                         $showAlert = true;
                    }
               }
               else
                    $showError = "Passwords do not match..!!";
          }
     }
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>SignUp</title>
  </head>
  <body>
    <?php require "navBar.php"?>
    <?php
     if($showAlert)
     {
          echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Success!</strong> Your account has been created.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
     }
     if($showError)
     {
          echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Error!</strong> ' . $showError .
          '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
     }
     ?>
    <div class="container">
          <h1 class="text-center my-3">SignUp To Our Website</h1>
          <form action="/phpCodes/34_Login_System/1_Signup.php" method="post">
               <div class="form-group col-md-5">
                    <label for="username">User Name</label>
                    <input type="text" maxlength="20" class="form-control" id="username" name="username">
               </div><br>
               <div class="form-group col-md-5">
                    <label for="password">Password</label>
                    <input type="password" maxlength="20" class="form-control" id="password" name="password">
               </div><br>
               <div class="form-group col-md-5">
                    <label for="cpassword">Confirm Password</label>
                    <input type="password" class="form-control" id="cpassword" name="cpassword">
                    <small id="emailHelp" class="form-text text-muted">Make sure to enter the same password.</small>
               </div><br>
               <button type="submit" class="btn btn-primary">SignUp</button>
          </form>
    </div>

    <!-- Optional JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>