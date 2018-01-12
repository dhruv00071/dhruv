<?php
	include 'connect.php';
?>

<h1>Search Page</h1>

<div>
	<?php

		if(isset($_POST['search']))
		{
			$search = mysqli_real_escape_string($con,$_POST['text-search']);
			$sql="SELECT * FROM customer WHERE fName LIKE '%$search%' OR username LIKE '%$search%'";
			$result = mysqli_query($con,$sql);
			$query_result = mysqli_num_rows($result);
			echo "<h1>There Are Results ".$query_result."</h1>";
			if($query_result > 0)
			{
				while($row=mysqli_fetch_assoc($result))
				{
					$fName = $row['fName'];
					$username = $row['username'];
					$lName = $row['lName'];
					echo $fName." ".$username." ".$lName;				
				}
			}
			else{
				echo "<h1>No Results Found</h1>";
			}
		}
	?>
</div>