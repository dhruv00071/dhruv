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
  </head>
  <body>

<br>
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" >

  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="forest.jpg" alt="First slide">
    </div>
    <div class="carousel-item ">
      <img class="d-block w-100" src="bri.jpg" alt="Second slide">
    </div>

  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
    </div>
    <div class="card">
      <img src="iphone6.png" alt="Avatar">
      <div class="container">
        <h4 id="iphone"><b>iphone 6</b></h4>
        <p style="font-size:20px">₹30000</p>
      </div>
    </div>
    <?php
    $display="SELECT * FROM product_details";
    $query=mysqli_query($con,$display);
    while($row = mysqli_fetch_assoc($query))
    {
      $model_no = $row['model_no'];
      $image = $row['image'];
      $price = $row['price'];

      echo '    <div class="card">
      <img src="pimages/'.$image.'" alt="Avatar">
      <div class="container">
        <h4><b>'.$model_no.'</b></h4>
        <p style="font-size:20px">₹'.$price.'</p>
      </div>
    </div>';
     } ?>
    <div class="card">
      <img src="tv.jpg" alt="Avatar">
      <div class="container">
        <h4><b>Samsung LED TV</b></h4>
        <p style="font-size:20px">₹120000</p>
      </div>
    </div>
    <div class="card">
      <img src="book.png" alt="Avatar">
      <div class="container">
        <h4><b>Diary of a Wimpy Kid: Trouble Manny</b></h4>
        <p style="font-size:20px">₹499</p>
      </div>
    </div>
    <div class="card">
      <img src="ear.jpg" alt="Avatar">
      <div class="container">
        <h4><b>JBL C100SI In-Ear Headphones with Mic (White)</b></h4>
      <p style="font-size:20px">₹800</p>
      </div>
    </div>
    <script >
    	function drop-profile(){
    		document.getElementById('iphone').innerHTML = "New Content";
    	}
    </script>


   <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
  </body>
</html>
