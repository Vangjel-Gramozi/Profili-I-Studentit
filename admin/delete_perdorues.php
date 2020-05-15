<?php 
require '../includes/connect_db.php';
// session_start();
// if ($_SESSION['rol_id'] !== '4') {
// 	header("Location: ../log-in.php");
// } else {
		// echo print_r($_POST);	
		// echo "string";
	if (isset($_POST['submit'])){
	// 	// echo print_r($_GET);
		// echo print_r($_POST);	
		$id = $_POST['id'];
		$query = "DELETE FROM perdorues WHERE id = '$id'";
		$result = mysqli_query($connection,$query);

		if(!$result) {
			die("Query failed") . mysqli_error($connection);
		} else {
			echo " Perdoruesi u fshi";
		}
	} else {
		header("Location: admin.php");
		exit();
	}
// }