<?php
include "../includes/connect_db.php";

function gjenero_email($emer,$mbiemer){
	global $connection;
	$query = "SELECT emer,mbiemer FROM perdorues";

	$result = mysqli_query($connection,$query);
	if(!$result) {
		die("Query failed") . mysqli_error();
	}

	while ($row = mysqli_fetch_assoc($result)) {
		if ($emer === $row['emer'] && $mbiemer === $row['mbiemer']) {
			echo "emar jane njesoj";
			return null;
		} 
		return $emer. '.' . $mbiemer . '@fshn.com';
	}
}

function krijo_perdorues(){
	global $connection;
	if(isset($_POST['submit'])){
		$emri = $_POST['emri'];
		$mbiemri = $_POST['mbiemri'];
		$gjinia = $_POST['gjinia'];
		$datelindja = $_POST['datelindja'];
		$roli = $_POST['roli'];
		$atesia = $_POST['atesia'];
		// $email = gjenero_email($emri,$mbiemri);

    // $emri = mysqli_real_escape_string($connection, $emri);
    // $mbiemri = mysqli_real_escape_string($connection, $mbiemri);


    // $hashFormat = "$2y$10$";
    // $salt = "iusesomecrazystrings22";
    // $hashF_and_salt = $hashFormat . $salt;
    // $password = crypt($password, $hashF_and_salt);
		
		// $query = "INSERT INTO perdorues (emer, mbiemer, gjini, datelindje, rol_id, atesia"
		if ($roli == 1) {
			$statusi = "i_rregullt";
			$query = "INSERT INTO perdorues (emer, mbiemer, gjini, datelindje, rol_id, atesia, statusi) VALUES ('$emri', '$mbiemri', '$gjinia', '$datelindja', '$roli', '$atesia', '$statusi')";
		}  else {
			$query = "INSERT INTO perdorues (emer, mbiemer, gjini, datelindje, rol_id, atesia) VALUES ('$emri', '$mbiemri', '$gjinia', '$datelindja', '$roli', '$atesia')";
		}
		// $query. ") VALUES ('$emri', '$mbiemri', '$gjinia', '$datelindja', '$roli', '$atesia', '$statusi')";

		// echo $roli;
		// echo "$statusi";

		// $query = "INSERT INTO perdorues (emer, mbiemer, gjini, datelindje, rol_id, atesia, statusi) VALUES ('$emri', '$mbiemri', '$gjinia', '$datelindja', '$roli', '$atesia', '$statusi')";

		$result = mysqli_query($connection,$query);

		if(!$result) {
			die("Query failed") . mysqli_error();
		} else {
			echo "Record Created";
		}

	}
}

function trego_rolet(){
	global $connection;
	$query = "SELECT * FROM roli";

	$result = mysqli_query($connection,$query);

	if(!$result) {
		die("Query failed") . mysqli_error();
	}
	while ($row = mysqli_fetch_assoc($result)) {
		$emer = $row['emer'];
		$id = $row['rol_id'];
		echo "<option value={$id}>{$emer}</option>";
	}
}



?>