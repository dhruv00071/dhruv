<?php
  include 'header.php';
  include_once 'connect.php';
  if(isset($_POST['login']))
  {
      $username = mysqli_real_escape_string($con,$_POST['username']);
      $password = mysqli_real_escape_string($con,$_POST['password']);

      $sql="SELECT * FROM customer WHERE username='$username' OR email='$username'";
      $result=mysqli_query($con,$sql);
      $resultCheck=mysqli_num_rows($result);
      if($resultCheck < 1){
        echo '<script language="javascript">';
        echo 'alert("Please start by signing up")';
        echo '</script>';
      }
      else{
        if($row=mysqli_fetch_assoc($result))
        {
        //De-Hashing the password
          $DeHashedPassword = password_verify($password,$row['password']);
          if($DeHashedPassword == false)
          {
            echo '<script language="javascript">';
            echo 'alert("Password is not correct")';
            echo '</script>';
          }
          elseif($DeHashedPassword == true)
          {
            //Log in the user here
            $_SESSION['u_id'] = $row['id'];
            $_SESSION['u_fName'] = $row['fName'];
            $_SESSION['u_lName'] = $row['lName'];
            $_SESSION['u_email'] = $row['email'];
            $_SESSION['u_username'] = $row['username'];
            $_SESSION['u_password'] = $row['password'];
            $_SESSION['u_address'] = $row['address'];
            echo '<script>location.href="index.php?login=success"</script>';
            exit();
          }
        }
      }
     /* if(isset($_COOKIE('email')) and isset($_COOKIE('password')))
      {
        $email = $_COOKIE['email'];
        $password = $_COOKIE['password'];

      }*/
  }
?>
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

        <!-- Required meta tags -->
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
      </head>
      <body>
        <div class="bs-example">
            <form action="" method="post">

              <div class="form-group">
                  <label for="inputusername">Username</label>
                  <input type="lastname" class="form-control input-lg" name="username" placeholder="Username/E-mail" style="width:400px;"  required>
              </div>

                <div class="form-group">
                    <label for="inputPassword">Password</label>
                    <input type="password" class="form-control input-lg" name="password" placeholder="Password"  style="width:400px;" required>
                </div>

                 <div class="form-group">
                    <input type="checkbox" name="rememberMe" value="Remember Me">
                    <label for="rememberme">Remember Me</label>
                </div>

                 <div class="form-group">
                    <p>Haven't registered yet ? <a href="registration.php">Sign up now</a></p>
                </div>

                <button type="submit" class="button" name="login">Login</button>
            </form>
        </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
  </body>
</html>