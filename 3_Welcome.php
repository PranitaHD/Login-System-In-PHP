<?php
  session_start();
  if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true) {
    header("location: 2_Login.php");
    exit;
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

    <title>Welcome</title>
  </head>
  <body>
    <?php require "navBar.php"?>
    <br>
    <div class="container">
      <div class="alert alert-success" role="alert">
        <h4 class="alert-heading">Welcome <?php echo $_SESSION['username']; ?></h4>
        <p>Hey, how are you doing? Welcome to iSecure. You are logged in as <b><?php echo $_SESSION['username']; ?></b>. Steps you have come across, first you signup in our website and then now you are here. Hope you have liked our layouts and features. Thanks! for using <b>iSecure</b>.</p>
        <hr>
        <p class="mb-0">Whenever you need to logout, <a href="/phpCodes/34_Login_System/4_Logout.php">make sure to use this link</a>.</p>
      </div>
    </div>

    <!-- Optional JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>