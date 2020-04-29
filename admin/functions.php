<?php 
require '../includes/connect_db.php';

function gjenero_email($emer,$mbiemer,$roli){
	global $connection;
	$email = $emer . '.' . $mbiemer . '@fshn';
	if ($roli == 0) {
		$email = $email . 'admin.info';
	} else if ($roli == 1) {
		$email = $email . 'student.info';
	} else if ($roli == 2) {
		$email = $email . 'pedagog.info';
	} else {
		$email = $email . 'sekretare.info';
	}
return $email;
}

function krijo_perdorues(){
	global $connection;
	if(isset($_POST['submit'])){
		$emri = strtolower($_POST['emri']);
		$mbiemri = strtolower($_POST['mbiemri']);
		$gjinia = strtolower($_POST['gjinia']);
		$datelindja = strtolower($_POST['datelindja']);
		$roli = strtolower($_POST['roli']);
		$atesia = strtolower($_POST['atesia']);
		$email = gjenero_email($emri,$mbiemri,$roli);

    $emri = mysqli_real_escape_string($connection, $emri);
    $mbiemri = mysqli_real_escape_string($connection, $mbiemri);
    $gjinia = mysqli_real_escape_string($connection, $gjinia);
    $datelindja = mysqli_real_escape_string($connection, $datelindja);
    $roli = mysqli_real_escape_string($connection, $roli);
    $atesia = mysqli_real_escape_string($connection, $atesia);
    $email = mysqli_real_escape_string($connection, $email);



    // $hashFormat = "$2y$10$";
    // $salt = "iusesomecrazystrings22";
    // $hashF_and_salt = $hashFormat . $salt;
    // $password = crypt($password, $hashF_and_salt);
		
		if ($roli == 1) {
			$statusi = "i_rregullt";
			$query = "INSERT INTO perdorues (emer, mbiemer, gjini, datelindje, rol_id, atesia, email, statusi) VALUES ('$emri', '$mbiemri', '$gjinia', '$datelindja', '$roli', '$atesia', '$email', '$statusi')";
		}  else {
			$query = "INSERT INTO perdorues (emer, mbiemer, gjini, datelindje, rol_id, atesia, email) VALUES ('$emri', '$mbiemri', '$gjinia', '$datelindja', '$roli', '$atesia', '$email')";
		}

		$result = mysqli_query($connection,$query);

		if(!$result) {
			die("Query failed") . mysqli_error($connection);
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



