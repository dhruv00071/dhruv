<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">

    <style type="text/css">
        .bs-example{
        	margin-left: 750px;
          margin-top:60px;
        }

        label{
          font-size: 150%;
        }
        .btn btn-primary{
          font-size: 150%;
        }
        .button {
      display: inline-block;
      border-radius: 4px;
      background-color: #f4511e;
      border: none;
      color: #FFFFFF;
      text-align: center;
      font-size: 15px;
      padding: 20px;
      width: 100px;
      transition: all 0.5s;
      cursor: pointer;

    }

    </style>
    <script type="text/javascript">
    function Validate() {
        var password = document.getElementById("inputPassword").value;
        var confirmPassword = document.getElementById("inputPasswords").value;
        if (password != confirmPassword) {
            alert("Passwords do not match.");
            return false;
        }
        return true;
    }
</script>

        <!-- Required meta tags -->


        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
      </head>
      <body>
        
        <nav class="navbar navbar-expand-lg" "navbar navbar-light" style="background-color:#000000;">
          <a class="navbar-brand" href="#">

            <img src="D:\web\icon.svg"  width="50" height="50" alt="">
          </a>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="index.html">Home <span class="sr-only">(current)</span></a>
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
      <a class="nav-link" href="registration.html">Register <span class="sr-only">(current)</span></a>
        </form>
        <form class="form-inline my-2 my-lg-0">
      <a class="nav-link" href="login.html">Login <span class="sr-only">(current)</span></a>
        </form>
        <form class="form-inline my-2 my-lg-0">
      <a class="nav-link" href="sell.html">Sell <span class="sr-only">(current)</span></a>
        </form>
        <form class="form-inline my-2 my-lg-0">
      <a class="nav-link" href="#">My Cart <span class="sr-only">(current)</span></a>
        </form>
    </nav>
        <div class="bs-example">
            <form action="" method="post">

              <div class="form-group">
                  <label for="inputusername">Username</label>
                  <input type="text" class="form-control input-lg" id="inputusername" name="username" placeholder="Username" style="width:400px;"  required>
              </div>
              <div class="form-group">
                  <label for="inputusername">Email</label>
                  <input type="email" class="form-control input-lg" id="inputtext" name="email" placeholder="Email" style="width:400px;"  required>
              </div>

                <div class="form-group">
                    <label for="inputPassword">Password</label>
                    <input type="password" class="form-control input-lg" id="inputPassword" name="password" placeholder="Password"  style="width:400px;" required>
                </div>
                <div class="form-group">
                    <label for="inputPassword">Confirm Password</label>
                    <input type="password" class="form-control input-lg" id="inputPassword" name="confirmPassword" placeholder="Confirm Password"  style="width:400px;" required>
                </div>

                <div class="form-group">
                  <label for="inputPhone">Mobile No.</label>
                  <input type="number" class="form-control input-lg" id="inputnumber" name="phone" placeholder="Phone No." style="width:400px;"  required>
              </div>
                <input type="submit" class="button" name="submit" value="Register" >
            </form>
        </div>
<?php

    include 'connect.php';
    if(isset($_POST['submit']))
    {
      //To avoid sql injection
      
      $username = mysqli_real_escape_string($con,$_POST['username']);
      $email = mysqli_real_escape_string($con,$_POST['email']);
      $password = mysqli_real_escape_string($con,$_POST['password']);
      $confirmPassword = mysqli_real_escape_string($con,$_POST['confirmPassword']);
      $phone = mysqli_real_escape_string($con,$_POST['phone']);

      $HashedPassword=password_hash($password,PASSWORD_DEFAULT);
      $HashedConfirmPassword=password_hash($confirmPassword,PASSWORD_DEFAULT);

      $insert= "INSERT INTO customer(username,email,password,confirmPassword,phone) VALUES(?,?,?,?,?)";

    // Prepared Statements
      
    if($password===$confirmPassword)
    {
      $stmt = mysqli_stmt_init($con);
      if(!mysqli_stmt_prepare($stmt,$insert))
      {
        echo '<script language="javascript">';
        echo 'alert("SQL Statement Failed")';
        echo '</script>';
      }
      else
      {
        mysqli_stmt_bind_param($stmt,"ssssi",$username,$email,$HashedPassword,$HashedConfirmPassword,$phone);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_get_result($stmt);
        echo '<script language="javascript">';
        echo 'alert("Data Successfully Saved")';
        echo '</script>';
      }
    }
    else
    {
      echo '<script language="javascript">';
      echo 'alert("Passwords do not match")';
      echo '</script>';
    }
  }

?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
  </body>
</html>