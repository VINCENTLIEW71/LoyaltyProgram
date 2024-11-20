<?php 

	require "web_dbconnect.php";

    $state = $_POST["state"];
    $country = $_POST["country"];
    
		$query = "select * from postcode_area where state = '$state' and country = '$country'";

		$result = mysqli_query($conn , $query);

		echo "<select class='w3-select w3-border'><option value='none' >Select Area</option>";

		while($row = mysqli_fetch_assoc($result)) {

			echo "<option value='$row[ID]'>".$row["name"]."</option>";

		}

		echo "</select>";



	//}

?>