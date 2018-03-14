<?php
	include 'connect.php';
	$commentCount = $_POST['commentCount'];
	$selectAll = "SELECT * FROM notification LIMIT $commentCount";
	$queAll = mysqli_query($con,$selectAll);
	if(mysqli_num_rows($queAll)>0)
	{
		while($row=mysqli_fetch_assoc($queAll))
		{
          echo '<li class="dropdown-item">';
          echo $row['message']."<br>";
          echo '</li>';
          echo "<div class='dropdown-divider'></div>";
        }
	}
