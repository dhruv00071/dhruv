<?php
$con = mysqli_connect('127.0.0.1','root','');
if(!$con)
{
  echo 'Not connected to server';
}
if(!mysqli_select_db($con,'ecommerce'))
{
  echo 'Database Not Selected';
}
$First=$_POST['fname'];
$Last=$_POST['lname'];
$Company=$_POST['cname'];
$Email=$_POST['email'];
$Phone=$_POST['phone'];
$Address1=$_POST['add1'];
$Address2=$_POST['add2'];
$Pin=$_POST['pin'];
$Pan=$_POST['pnumber'];
$Password1=$_POST['password'];
$Password2=$_POST['cpassword'];
$sql="INSERT INTO seller (First,Last,Company,Email,Phone,Address1,Address2,Pin,Pan,Password1,Password2) VALUES('$First','$Last','$Company','$Email','$Phone','$Address1','$Address2','$Pin','$Pan','$Password1','$Password2')";
if(!mysqli_query($con,$sql))
{
  echo 'Not Inserted';
}
else {
  echo 'Inserted';
}


 ?>
