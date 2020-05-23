<?php 
include '../includes/connect_db.php';
if (!isset($_POST['dega'])) {
	header("Location : admin.php");
	exit();
} else {
	$id = $_POST['dega'];
	$query = "SELECT d.emri FROM dega d INNER JOIN lenda l ON d.id_dega=l.id_dega WHERE l.id_dega = '$id'";
	$result = mysqli_query($connection,$query);

	if(!$result) {
		die("Query failed") . mysqli_error();
	}

	$row = mysqli_fetch_assoc($result);
	// echo print_r($row);
	echo $row['emri'];
}
?>