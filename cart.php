<?php
	include 'header.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>E-commerce</title>
</head>
<body>
<div>
	<form method="post" action="">
		<table align="center" class="table table-hover">
		<tr>
			<th>Type</th>
			<th>Brand</th>
			<th>Model No.</th>
			<th>Price</th>
			<th>Delete</th>
		</tr>
		<tr>
		<?php
			include 'connect.php';
            $u_email=$_SESSION['u_email'];
            $u_username=$_SESSION['u_username']; 
			$select="SELECT * from cart where username='$u_username' and email='$u_email'";
			$query=mysqli_query($con,$select);
			while($row=mysqli_fetch_array($query))
			{
				$type = $row['type'];
                $brand = $row['brand'];
                $model_no = $row['model_no'];
                $price = $row['price'];
                $getId = $row['item_id'];
			?>
			<td><?php echo $type?></td>
			<td><?php echo $brand?></td>
			<td><?php echo $model_no?></td>
			<td><?php echo $price?></td>
			<td><a href="delete.php?delete=<?php echo $getId?>">Delete</a></td>
			</tr>
		<?php } ?>
		
		</table>
	</form>
</div>
</body>
</html>