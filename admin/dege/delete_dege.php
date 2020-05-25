<?php 
require '../../includes/connect_db.php';
	if (isset($_POST['submit'])){
		$id = $_POST['id'];
		$query = "DELETE FROM dega WHERE id_dega = '$id'";
		$result = mysqli_query($connection,$query);

		if(!$result) {
			die("Ekzistojne grupe dhe lende per kete dege") . mysqli_error($connection);
		} else {
			echo "Dega u fshi";
		}
	} else {
		header("Location : ../perdorues/admin.php");
		exit();
	}