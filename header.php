<!DOCTYPE HTML>
<html>
<head>

    <title>E-commerce</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/main3.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
      crossorigin="anonymous"></script>
</head>
<body>
<div class="nav">
  <label for="toggle">&#9776;</label>

  <input type="checkbox" id="toggle"/>

  <div class="menu">
    <a href="#">Home</a>
    <a href="#">Deals</a>
    <a href="#">Products</a>

    <a href="#"><span>Contact us</span></a>

</div>
  <input type="text" name="search" class="search" placeholder ="search here">
</div>
<?php
    session_start();
    if($_SESSION['notif']!=="" && isset($_SESSION['u_id']))
    {
      echo $_SESSION['notif'];
    }
    else
    {
      echo "No new notifications";
    }
?>

<form action="" method="post">
<div class="profile">
<?php
  include 'connect.php';
    if(isset($_SESSION['u_id']))
    {
      $u_id=$_SESSION['u_id'];
      if(isset($_POST['upload']))
      {
        $file = $_FILES['file'];
        $fileName = $file['name'];
        $fileSize = $file['size'];
        $fileError = $file['error'];
        $fileType = $file['type'];
        $fileTmpName = $file['tmp_name'];

        $fileExt = explode('.',$fileName);
        $fileActualExt = strtolower(end($fileExt));
        $allowed = array('jpg','jpeg','png');

        if(in_array($fileActualExt, $allowed))
        {
          if($fileError==0)
          {
            if($fileSize<10000000)
            {
              $u_username = $_SESSION['u_username'];
              $u_password = $_SESSION['u_password'];
              $sql = "SELECT * FROM customer where username='$u_username' and password='$u_password'";
              $result = mysqli_query($con,$sql);
              if(mysqli_num_rows($result)>0)
              {
                while($row=mysqli_fetch_assoc($result))
                {
                  $id = $row['id'];
                }
              }
              //$fileNameNew = uniqid('',true).".".$fileActualExt;
              $fileDestination = 'uploads/profile'.$id.'.'.$fileActualExt;
              move_uploaded_file($fileTmpName, $fileDestination);
              echo "<img class='image' src='$fileDestination' width='50' height='50' alt='profile image'>";
              echo "<div class='dropdown-divider'></div>";
              echo "Welcome ".$_SESSION['u_fName']." ".$_SESSION['u_lName']."<br>";
              echo '<input type="submit" name="logOut" value="Log Out">';
            }
            else
            {
              echo '<script language="javascript">';
              echo 'alert("File is too big. It should be less than 10Mb.")';
              echo '</script>';
            }
          }
          else
          {
            echo '<script language="javascript">';
            echo 'alert("Error in file")';
            echo '</script>';
          }
        }
        else
        {
          echo '<script language="javascript">';
          echo 'alert("This Extension is not allowed")';
          echo '</script>';
        }
      }
      else
      {
        echo "<img class='image' src='uploads/download.jpg' width='50' height='50' alt='profile image'>";
        echo "<div class='dropdown-divider'></div>";
        echo "Welcome ".$_SESSION['u_fName']." ".$_SESSION['u_lName']."<br>";
        echo '<input type="submit" name="logOut" value="Log Out">';

      }
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

    <script src="js/header.js"></script>
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
    echo '<script>location.href="index.php"</script>';
}
if(isset($_POST['logIn']))
{
    echo '<script>location.href="login.php"</script>';
}
?>
