<?php
  include 'header.php';
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
        <div class="bs-example">
            <form action="" method="post">

              <div class="form-group">
                  <label for="inputname">Name</label>
                  <input type="text" class="form-control input-lg" name="fName" placeholder="First Name" style="width:400px;"  required><br>
                  <input type="text" class="form-control input-lg" name="lName" placeholder="Last Name" style="width:400px;"  required>
              </div>

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
      $fName = mysqli_real_escape_string($con,$_POST['fName']);
      $lName = mysqli_real_escape_string($con,$_POST['lName']);
      $username = mysqli_real_escape_string($con,$_POST['username']);
      $email = mysqli_real_escape_string($con,$_POST['email']);
      $password = mysqli_real_escape_string($con,$_POST['password']);
      $confirmPassword = mysqli_real_escape_string($con,$_POST['confirmPassword']);
      $phone = mysqli_real_escape_string($con,$_POST['phone']);

      $HashedPassword=password_hash($password,PASSWORD_DEFAULT);
      $HashedConfirmPassword=password_hash($confirmPassword,PASSWORD_DEFAULT);

      $insert= "INSERT INTO customer(fName,lName,username,email,password,confirmPassword,phone) VALUES(?,?,?,?,?,?,?)";

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
        mysqli_stmt_bind_param($stmt,"ssssssi",$fName,$lName,$username,$email,$HashedPassword,$HashedConfirmPassword,$phone);
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
  </body>
</html>