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
          margin-top:50px;
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
    .inputState{
      margin-right: 200px;
    }
    p
    {
      color:red;
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
                  <label for="">First Name*</label>
                  <input type="text" class="form-control input-lg" id="inputusername" name="fname" placeholder="First Name" style="width:400px;"  required>
              </div>
              <div class="form-group">
                  <label for="">Last Name*</label>
                  <input type="lastname" class="form-control input-lg" id="inputtext"  name="lname" placeholder="Last Name" style="width:400px;"  required>
              </div>
              <div class="form-group">
                  <label for="">Company Name*</label>
                  <input type="text" class="form-control input-lg" id="inputPassword"   name="cname" placeholder="Company Name"  style="width:400px;" required>
              </div>
              <div class="form-group">
                  <label for="number">Email*</label>
                  <input type="text" class="form-control input-lg" id="inputemail"   name="email" placeholder="Email"  style="width:400px;" required>
              </div>

                <div class="form-group">
                    <label for="number">Phone*</label>
                    <input type="text" class="form-control input-lg" id="inputPassword"  name="phone" placeholder="Phone"  style="width:400px;" required>
                </div>

            <div class="form-group">
                <label for="">Address*</label><br>
                <textarea class="form-control input-lg" name="address"></textarea>
            </div>
            <div class="form-group">
                <label for="r">PIN*</label>
                <input type="text" class="form-control input-lg" id="inputpin"  name="pin" placeholder="PIN"  style="width:400px;" required>
            </div>
            <div class="form-group">
                <label for="">PAN Number*</label>
                <input type="text" class="form-control input-lg" id="inputpan"  name="pnumber" placeholder="PAN Number"  style="width:400px;" required>
            </div>
            <div class="form-group">
                <label for="">Password</label>
                <input type="password" class="form-control input-lg" id="inputPassword"  name="password" placeholder="Password"  style="width:400px;" required>
            </div>
            <div class="form-group">
                <label for="">Confirm Password</label>
                <input type="password" class="form-control input-lg" id="inputPassword"  name="cpassword"  placeholder="Confirm Password"  style="width:400px;" required>
            </div>

            <button type="submit" value="insert" class="button">Submit</button>
                  </form>
              </div>
<?php
                  include 'connect.php';
                  if(isset($_POST['submit']))
                  {
                    $First= mysqli_real_escape_string($con,$_POST['fname']);
                    $Last = mysqli_real_escape_string($con,$_POST['lname']);
                    $Company = mysqli_real_escape_string($con,$_POST['cname']);
                    $Email = mysqli_real_escape_string($con,$_POST['email']);
                    $Phone = mysqli_real_escape_string($con,$_POST['phone']);
                    $Address = mysqli_real_escape_string($con,$_POST['address']);
                    $Pin = mysqli_real_escape_string($con,$_POST['pin']);
                    $Pan = mysqli_real_escape_string($con,$_POST['pnumber']);
                    $Password1 = mysqli_real_escape_string($con,$_POST['password']);
                    $Password2 = mysqli_real_escape_string($con,$_POST['cpassword']);
                    $HashedPassword=password_hash($password,PASSWORD_DEFAULT);
                    $HashedConfirmPassword=password_hash($cPassword,PASSWORD_DEFAULT);

                    $insert= "INSERT INTO seller(First,Last,Company,Email,Phone,Address,Pin,Pan,Password1,Password2) VALUES(?,?,?,?,?,?,?,?,?,?)";

                  // Prepared Statements

                  if($password===$cPassword)
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
                      mysqli_stmt_bind_param($stmt,"ssssisisss",$First,$Last,$Company,$Email,$Phone,$Address,$Pin,$Pan,$username,$email,$HashedPassword,$HashedConfirmPassword,$phone);
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
