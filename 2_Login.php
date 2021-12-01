<?php
     $login = false;
     $showError = false;
     if ($_SERVER["REQUEST_METHOD"] == "POST")
     {
          include "database_connection.php";
          $username = $_POST["username"];
          $password = $_POST["password"];

          // $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
          $sql = "SELECT * FROM users WHERE username='$username'";
          $result = mysqli_query($con, $sql);
          $num = mysqli_num_rows($result);
          if ($num == 1) {
               while ($row = mysqli_fetch_assoc($result)) {
                    if (password_verify($password, $row['password'])) {
                         $login = true;
                         session_start();
                         $_SESSION['loggedin'] = true;
                         $_SESSION['username'] = $username;
                         header("location: 3_Welcome.php");
                    }
                    else 
                         $showError = true;
               }     
          }
          else 
               $showError = true;
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

    <title>LogIn</title>
  </head>
  <body>
    <?php require "navBar.php"?>
    <?php
     if($login)
     {
          echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Success!</strong> You are logged in.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
     }
     if($showError)
     {
          echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Error!</strong> Invalid data has been inserted.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
     }
     ?>
    <div class="container">
          <h1 class="text-center my-3">LogIn To Our Website</h1>
          <form action="/phpCodes/34_Login_System/2_Login.php" method="post">
               <div class="form-group col-md-5">
                    <label for="username">User Name</label>
                    <input type="text" maxlength="20" class="form-control" id="username" name="username">
               </div><br>
               <div class="form-group col-md-5">
                    <label for="password">Password</label>
                    <input type="password" maxlength="20" class="form-control" id="password" name="password">
               </div><br>
               <button type="submit" class="btn btn-primary">LogIn</button>
          </form>
    </div>

    <!-- Optional JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>