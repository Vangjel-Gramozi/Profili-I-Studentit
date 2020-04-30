<?php 
include '../includes/connect_db.php';
// global $connection;

	$query = "SELECT * FROM roli";
	$result = mysqli_query($connection,$query);

	if(!$result) {
		die("Query failed") . mysqli_error();
	}
		
		echo '<option disabled selected value="" >Zgjidh nje rol</option>';
		while ($row = mysqli_fetch_assoc($result)) {
				$emer = $row['emer'];
				$id = $row['rol_id'];
				echo "<option value={$id}>{$emer}</option>";
		}

 ?>