<!DOCTYPE html>
<?php
include 'header.php';
?>
<html>

	<head>
		<title>Add Product</title>
		   <link rel="stylesheet" type="text/css" href="css/dd3.css">
		    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<script>
			function reload(form)
			{
			var val = form.cat.options[form.cat.options.selectedIndex].value;
			self.location='dd3.php?cat=' + val ;
			}
			function reload3(form)
			{
			var val=form.cat.options[form.cat.options.selectedIndex].value;
			var val2=form.subcat.options[form.subcat.options.selectedIndex].value;
			self.location='dd3.php?cat=' + val + '&cat3=' + val2 ;
			}
		</script>
		<script>
		$(".char-textarea").on("keyup",function(event){
  checkTextAreaMaxLength(this,event);
});

/*
Checks the MaxLength of the Textarea
-----------------------------------------------------
@prerequisite:	textBox = textarea dom element
				e = textarea event
                length = Max length of characters
*/
function checkTextAreaMaxLength(textBox, e) {

    var maxLength = parseInt($(textBox).data("length"));


    if (!checkSpecialKeys(e)) {
        if (textBox.value.length > maxLength - 1) textBox.value = textBox.value.substring(0, maxLength);
   }
  $(".char-count").html(maxLength - textBox.value.length);

    return true;
}
/*
Checks if the keyCode pressed is inside special chars
-------------------------------------------------------
@prerequisite:	e = e.keyCode object for the key pressed
*/
function checkSpecialKeys(e) {
    if (e.keyCode != 8 && e.keyCode != 46 && e.keyCode != 37 && e.keyCode != 38 && e.keyCode != 39 && e.keyCode != 40)
        return false;
    else
        return true;
}

		</script>
	</head>

	<body>
	<div id="wid">
	<?php

		//Getting the data from database for first dropdown
		$quer2="select distinct category from product_overview";
		// End of query for first dropdown

		//for second dropdown check if category is selected
		$cat=$_GET['cat'];
		if(isset($cat) and strlen($cat) > 0)
		{
			$quer="select type from product_overview where category='$cat' ";
		}
		// end of query for second dropdown


		// for Third dropdown we will check if sub category is selected
		$cat3=$_GET['cat3'];
		if(isset($cat3) and strlen($cat3) > 0)
		{
			$quer3="select brand from product_overview where type='$cat3' ";
		}
		// end of query for third dropdown


		echo'<form method="POST" action="dd3ck.php" enctype="multipart/form-data">';

		//echo "<form method=post action='dd3ck.php'>";
		// Starting of first dropdown

		echo "<br><br><select name='cat' onchange=\"reload(this.form)\" class='form-control input-lg'><option value=''>Category</option>";
		foreach (mysqli_query($con,$quer2) as $result2)
		{
			if($result2['category']==@$cat)
			{
				echo "<option selected value='$result2[category]'>$result2[category]</option>"."<BR>";
			}
			else
			{
				echo  "<option value='$result2[category]'>$result2[category]</option>";
			}
		}
		echo "</select>";
		//This will end the first dropdown

		//Starting of second dropdown
		echo "<br><br><select name='subcat' onchange=\"reload3(this.form)\" class='form-control input-lg'><option value=''>Type</option>";
		foreach (mysqli_query($con,$quer) as $result)
		{
			if($result['type']==@$cat3)
			{
				echo "<option selected value='$result[type]'>$result[type]</option>"."<BR>";
			}
			else
			{
				echo  "<option value='$result[type]'>$result[type]</option>";
			}
		}
		echo "</select>";
		//This will end the second dropdown

		//Starting of third dropdown
		echo "<br><br><select name='cat3' class='form-control input-lg'><option value=''>Brand</option>";
		foreach (mysqli_query($con,$quer3) as $result)
		{
			echo  "<option value='$result[brand]'>$result[brand]</option>";
		}
		echo "</select>";
		//This will end the third dropdown

		//echo "<br><br><";
	?>
	<style type="text/css">
	@media only screen and (orientation: portrait){
	form{
		width:300px;
	}
}
	</style>

<form>
	<br><br><input class="form-control input-lg" name='model' type=text placeholder='Model Number'>
	<br><br><input class="form-control input-lg" name='price' type=number placeholder='Price'>
	<br><br><input class="form-control input-lg" name='quantity' type=number placeholder='Quantity'>
	<br><br><textarea  name="des"  data-length=250 class="char-textarea" align:"centre" style="width:340px" placeholder="Write your todays story......" rows="5"></textarea>
<h4><span class="char-count">250</span> chars remaining</h4>
<br><br><input class="form-control input-lg" type="file" name="image">
	<br><br><button type="submit" name="upload" class="button">Upload</button>
</form>

	</div>
	</body>


</html>

<script>
 $(document).ready(function(){
      $('#insert').click(function(){
           var image_name = $('#image').val();
           if(image_name == '')
           {
                alert("Please Select Image");
                return false;
           }
           else
           {
                var extension = $('#image').val().split('.').pop().toLowerCase();
                if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
                {
                     alert('Invalid Image File');
                     $('#image').val('');
                     return false;
                }
           }
      });
 });
 </script>
