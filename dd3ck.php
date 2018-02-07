<html>
<head>
	<title>Product Confirmation</title>
</head>
<body>
<?php
include 'connect.php';
session_start();
if (isset($_POST['upload']))
{
	$target = "pimages/".basename($_FILES['image']['name']);
	$image = $_FILES['image']['name'];
	$cat=$_POST['cat'];
	$subcat=$_POST['subcat'];
	$subcat3=$_POST['cat3'];
	$des =  mysqli_real_escape_string ($con,$_POST['des']);
	$price=$_POST['price'];
	$model=mysqli_real_escape_string ($con,$_POST['model']);
	$quantity=$_POST['quantity'];
	$sql = "INSERT INTO product_details(category,type,brand,price,model_no,image,quantity,des) VALUES ('$cat','$subcat','$subcat3','$price','$model','$image','$quantity','$des')";
	mysqli_query($con,$sql);
	if (move_uploaded_file($_FILES['image']['tmp_name'], $target))
	{
		echo '<script>alert("Product inserted into Database")</script>';
		echo 'Product succesfully added to your account.';
		echo 'Please wait for the confirmation from our backend team!';
	}
	else
	{
		echo"Failed to upload your product";
    }
}
?>
</body>
</html>
