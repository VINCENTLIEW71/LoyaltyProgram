<?php 

	require "web_dbconnect.php";



	$country = $_POST["country"];



		$query = "select * from postcode_state where country = '$country'";

		$result = mysqli_query($conn , $query);

		echo "<select class='w3-select w3-border'><option value='none' >Select State</option>";

		while($row = mysqli_fetch_assoc($result)) {

			echo "<option value='$row[ID]'>".$row["name"]."</option>";

		}

		echo "</select>";



	

?>