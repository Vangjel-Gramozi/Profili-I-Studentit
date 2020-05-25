<?php 
require '../../includes/connect_db.php';
session_start();
	if (isset($_POST['submit'])){
		$id = $_POST['id'];
		if ($_SESSION['id'] == $id) {
			echo "Nuk mund te fshini veten tuaj";
			return;
		} 
		// print_r($_SESSION);	
		
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