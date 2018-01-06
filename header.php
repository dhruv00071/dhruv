<!DOCTYPE HTML>
<html>
<head>
      <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>E-commerce</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="css/index1.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
      crossorigin="anonymous"></script>
</head>
<body>

    <nav class="navbar navbar-expand-lg" "navbar navbar-light" style="background-color:#000000;">
      <a class="navbar-brand" href="#">

        <img src="D:\web\icon.svg" width="50" height="50" alt="">
      </a>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Offers</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Products
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Toys</a>
          <a class="dropdown-item" href="#">Electronics</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Contact us</a>
        </div>
      </li>
      <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2"  type="search" placeholder="Search" aria-label="Search" style="width:500px; margin: 0 auto">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      </form>
    </ul>

    <form class="form-inline my-2 my-lg-0">
  <a class="nav-link" href="registration.php">Register <span class="sr-only">(current)</span></a>
    </form>
    <form class="form-inline my-2 my-lg-0">
  <a class="nav-link" href="login.php">Login <span class="sr-only">(current)</span></a>
    </form>
    <form class="form-inline my-2 my-lg-0">
  <a class="nav-link" href="sell.php">Sell <span class="sr-only">(current)</span></a>
    </form>
    <form class="form-inline my-2 my-lg-0">
  <a class="nav-link" href="#">My Cart <span class="sr-only">(current)</span></a>
    </form>
    <form class="form-inline my-2 my-lg-0" method="post">
  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Profile
        </a>
    </form>
</nav>
<form action="" method="post">
<div class="profile">
<?php
    session_start();
    if(isset($_SESSION['u_id']))
    {
        echo "<img class='image' src='default-profile-dp.png' width='50' height='50'>";
        echo "<div class='dropdown-divider'></div>";
        echo "Welcome ".$_SESSION['u_fName']." ".$_SESSION['u_lName']."<br>";
        echo '<input type="submit" name="logOut" value="Log Out">';
    }
    else
    {
        echo	'<p>You are not logged in</p>
              <div class="dropdown-divider"></div>
              <input type="submit" name="logIn" value="Log In">';
    }
?>
</div>
</form>
  <form method="post" action="" enctype="multipart/form-data">
    <div class="image123">
      <input type="file" name="file">
      <input type="submit" name="upload" value="Upload">
    </div>
  </form>

    <script src="js/header.js">    </script>
   <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
</body>
</html>
<?php
if(isset($_POST['logOut']))
{
    session_unset();
    session_destroy();
    header('location:index.php');
}
if(isset($_POST['logIn'])) 
{
    header('location:login.php');
}
?>