<?php
	include 'connect.php';
	$get=$_GET['delete'];
	$delete="DELETE FROM cart where item_id='$get'";
	$sql=mysqli_query($con,$delete);
	header('location:cart.php');
?>