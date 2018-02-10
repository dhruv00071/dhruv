<?php
	include 'header.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>E-commerce</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="css/in.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <style type="text/css">
.a1{
  margin-top: 100px;
}

.button {
    background-color: #FF7F0E; /* Green */
    border: none;
    color: white;
    padding: 16px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    -webkit-transition-duration: 0.4s; /* Safari */
    transition-duration: 0.4s;
    cursor: pointer;
		float: inherit;
		position:absolute;
		border-radius: 4px;
        position: absolute;
        top:40%;
        left: 60%;
}
        .button1 {
    background-color: #1873DF; /* Green */
    border: none;
    color: white;
    padding: 16px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    -webkit-transition-duration: 0.4s; /* Safari */
    transition-duration: 0.4s;
    cursor: pointer;
		float: inherit;
		margin-left: 1200px;
		position:absolute;
		border-radius: 4px;
        position: absolute;
        top:40%;
}
        .button3:hover {
    background-color: #f44336;
    color: white;
	}
	.button2:hover {
	    background-color: #f44336;
	    color: white;
		}

        img{
            width:40%;
            height: auto;
        }
    </style>
  </head>
  <body>
<?php
    $id = $_GET['id'];
    $result = mysqli_query($con,"SELECT * FROM product_details
    WHERE id='$id'") OR DIE(mysqli_error($con));
    while($row= mysqli_fetch_array($result))
    {
			  $id=$row['id'];
        echo "<font size='4' face='Open Sans'>";
    echo "<div id='img_div'>";

    echo "<img  src='pimages/".$row['image']."' class='a1'>";
    echo "<h2>Model: ".$row['model_no']."</h2>" ;
    echo "<h2>Price: ".$row['price']."</h2>" ;
    }
    if(isset($_POST['cart']))
    {
        if(!$_SESSION['u_id'])
        {
            echo '<script>alert("Login First.")</script>';
        }
        else
        {
            $u_id=$_SESSION['u_id'];
            $u_fName=$_SESSION['u_fName'];
            $u_lName=$_SESSION['u_lName'];
            $u_email=$_SESSION['u_email'];
            $u_username=$_SESSION['u_username'];
            $u_address=$_SESSION['u_address'];
            //from url in include in cart.php
            $_SESSION['id']=$id;
echo ('<a  href="cart.php?id=' . $id . '">');
            $getCategory = "Select * from product_details WHERE id='$id'";
            $result=mysqli_query($con,$getCategory);

            $row = mysqli_fetch_assoc($result);

                $type = $row['type'];
                $brand = $row['brand'];
                $model_no = $row['model_no'];
                $price = $row['price'];

            $addCart="INSERT into cart(item_id,fName,lName,username,email,type,brand,model_no,price,address) values(?,?,?,?,?,?,?,?,?,?)";

            $stmt = mysqli_stmt_init($con);

            mysqli_stmt_prepare($stmt,$addCart);
            mysqli_stmt_bind_param($stmt,"isssssssis",$id,$u_fName,$u_lName,$u_username,$u_email,$type,$brand,$model_no,$price,$u_address);
            if(!mysqli_stmt_execute($stmt))
            {
                printf("%s",mysqli_error($con));
            }
            else
            {
                '<script>alert("Successfully added to cart")</script>';
            }
        }
    }
?>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    <form action="" method="post">
        <button class="button button3" name="cart">Add to cart</button>
        <button class="button1 button2" name="buy">Buy now</button>
    </form>
  </body>
</html>
