<?php 

	require "web_dbconnect.php";



	$state = $_POST["state"];
	$area = $_POST["area"];

	//$option = $_POST["option"];



	/*switch ($option) {

		case 1 : loadState();

			break;

	}*/

	//function loadState() {

		$query = "select * from postcode where state = '$state' and place_name = '$area'";

		$result = mysqli_query($conn , $query);

		echo "<select class='w3-select w3-border'><option value='none'>Select Postcode</option>";

		while($row = mysqli_fetch_assoc($result)) {

			echo "<option value='$row[ID]'>".$row["postal_code"]."</option>";

		}

		echo "</select>";



	//}

?>