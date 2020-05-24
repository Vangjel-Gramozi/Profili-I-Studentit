<?php 
require '../../includes/connect_db.php';

	if (isset($_POST['submit'])){
		$id = $_POST['id'];
		$query = "DELETE FROM perdorues WHERE id = '$id'";
		$result = mysqli_query($connection,$query);

		if(!$result) {
			die("Query failed") . mysqli_error($connection);
		} else {
			echo "Perdoruesi u fshi";
		}
	} else {
		header("Location: admin.php");
		exit();
	}