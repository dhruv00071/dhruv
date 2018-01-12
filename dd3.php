<?php
	include 'header.php';
?>

<html>

	<head>
		<title>Add Product</title>

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
	</head>

	<body>
	
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


		echo "<form method=post action='dd3ck.php'>";
		// Starting of first dropdown

		echo "<br><br><select name='cat' onchange=\"reload(this.form)\" class='form-control input-lg' style='width:400px;'><option value=''>Category</option>";
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
		echo "<br><br><select name='subcat' onchange=\"reload3(this.form)\" class='form-control input-lg' style='width:400px;'><option value=''>Type</option>";
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
		echo "<br><br><select name='cat3' class='form-control input-lg' style='width:400px;'><option value=''>Brand</option>";
		foreach (mysqli_query($con,$quer3) as $result) 
		{
			echo  "<option value='$result[brand]'>$result[brand]</option>";
		}
		echo "</select>";
		//This will end the third dropdown

		//echo "<br><br><";
	?>
	
	<br><br><input type=text placeholder='Model Number' class="form-control input-lg" style="width:400px;">
	<br><br><input type=text placeholder='Price' class="form-control input-lg" style="width:400px;">
	<br><br><input type=submit value='Submit the form data' class="form-control input-lg">
	<form>
	</body>
	
</html>
