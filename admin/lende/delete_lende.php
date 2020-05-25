<?php 
require '../../includes/connect_db.php';
	if (isset($_POST['submit'])){
		$id = $_POST['id'];
		$query = "DELETE FROM lenda WHERE id_lenda = '$id'";
		$result = mysqli_query($connection,$query);

		if(!$result) {
			die("Query failed") . mysqli_error($connection);
		} else {
			echo "Lenda u fshi";
		}
	} else {
		header("Location : ../perdorues/admin.php");
		exit();
	}