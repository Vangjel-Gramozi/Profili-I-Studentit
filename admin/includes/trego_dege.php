<?php 
include '../../includes/connect_db.php';
if (!isset($_POST['dega'])) {
	header("Location : ../perdorues/admin.php");
	exit();
} else {
	$id = $_POST['dega'];
	$table = $_POST['table'];
	// print_r($_POST);
	$query = "SELECT d.emri FROM dega d INNER JOIN $table t ON d.id_dega=t.id_dega WHERE t.id_dega = '$id'";
	$result = mysqli_query($connection,$query);

	if(!$result) {
		die("Query failed") . mysqli_error();
	}

	$row = mysqli_fetch_assoc($result);
	// echo print_r($row);
	echo $row['emri'];
}
?>