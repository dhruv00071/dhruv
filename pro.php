<?php
$db = mysqli_connect("localhost", "root", "", "ecommerce");
$msg = "";

if (isset($_POST['upload'])) {
  $target = "pimages/".basename($_FILES['image']['name']);


  $image = $_FILES['image']['name'];

  $adtitle =  mysqli_real_escape_string ($db,$_POST['adtitle']);
  $description =  mysqli_real_escape_string ($db,$_POST['description']);

  $sql = "INSERT INTO products (adtitle,description,image) VALUES ('$adtitle', '$description','$image')";
  mysqli_query($db, $sql);

  if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {

            exit();
  }else{
    $msg = "Failed to upload image";
  }
}

$result = mysqli_query($db, "SELECT * FROM products");

?>
