<?php 
require '../includes/connect_db.php';
// $submit = preg_match("/^input_id[0-9]+$/", $_POST[name]);	
// if (isset($_POST['input_id1'])) {
if (isset($_POST['submit'])){
	$emri = $_POST['emri'];
	$mbiemri = $_POST['mbiemri'];
	if (empty($emri) || empty($mbiemri)) {
		echo "<span>Plotesoni te gjitha fushat</span>";
		$errorEmpty = true;
	} else {
		if (!preg_match("/^[a-zA-Z]+$/", $emri) || !preg_match("/^[a-zA-Z]+$/", $mbiemri)) {
			$errorChar = true;
			echo "<span>Nuk lejohet perdorimi i numrave dhe shkronjave me hapesire</span>";
		} else {
			$errorEmpty = false;
			$errorChar = false;

			$emri = mysqli_real_escape_string($connection, strtolower($emri));
			$mbiemri = mysqli_real_escape_string($connection, strtolower($mbiemri));

			// $query = "INSERT INTO perdorues (emer, mbiemer, gjini, datelindje, rol_id, atesia, email, statusi, password) VALUES ('$emri', '$mbiemri', '$gjinia', '$datelindja', '$rolet', '$atesia', '$email', '$statusi', '$hashed_password')";




			echo print_r($_POST);	

		}
	}
} else {
	header("Location: admin.php");
	exit();
}

