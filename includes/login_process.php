<?php include "connect_db.php"; ?>
<?php session_start();?>

<?php

if (isset($_POST['login'])){

	$email = $_POST['email'];
	$password = $_POST['password'];

	$email = mysqli_real_escape_string($connection, $email);	
	$password = mysqli_real_escape_string($connection, $password);

	if (empty($email) || empty($password)) {
		header("Location: ../log-in.php?fields=empty");
		//echo "Plotesoni vendet bosh !";
		exit();
	}

	elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		header("Location: ../log-in.php?fields=email");
		//echo "Vendosni nje email te sakte";
		exit();
	} else {

		$query = "SELECT * FROM perdorues WHERE email = '$email'";
		$select_user_query = mysqli_query($connection, $query);
		if (!$select_user_query) {
			die("Query deshtoi". mysqli_error($connection));
		}
	/*while ($row = mysqli_fetch_assoc($select_user_query)) {
		$db_id = $row['id'];
		$db_emer = $row['emer'];
		$db_mbiemer = $row['mbiemer'];
		$db_email = $row['email'];
		$db_password = $row['password'];
		$db_gjini = $row['gjini'];
		$db_datelindje = $row['datelindje'];
		$db_rol_id = $row['rol_id'];
		$db_atesia = $row['atesia'];
		$db_statusi = $row['statusi'];
	}*/

	$row = mysqli_fetch_assoc($select_user_query);
	if (!isset($row['email'])) { 
		header("Location: ../log-in.php?fields=emailEmpty");
		exit();
		//echo "Ju nuk jeni rregjistruar sakte.";
	}
	if (!password_verify($password,$row['password'])) {
	 	header("Location: ../log-in.php?fields=passwordError");
	 	exit();
	 } 
	
	elseif ($email == $row['email'] && password_verify($password,$row['password'])) {
		$_SESSION['id'] = $row['id'];
		$_SESSION['emer'] = $row['emer'];
		$_SESSION['mbiemer'] = $row['mbiemer'];
		$_SESSION['email'] = $row['email'];
		$_SESSION['gjini'] = $row['gjini'];
		$_SESSION['datelindje'] = $row['datelindje'];
		$_SESSION['rol_id'] = $row['rol_id'];
		$_SESSION['atesia'] = $row['atesia'];
		$_SESSION['statusi'] = $row['statusi'];
		if ($_SESSION['rol_id'] == 1) {
			header("Location: ../student/s_homepage/s_homepage_skeleti.php");
		}
		elseif ($_SESSION['rol_id'] == 2) {
			header("Location: ../pedagog/pedagog_lende.php");
		}
		elseif ($_SESSION['rol_id'] == 3) {
			header("Location: ../sekretare.php");
		}
		elseif ($_SESSION['rol_id'] == 4) {
			header("Location: ../admin/perdorues/admin.php");
		}
		else {
			header("Location: ../log-in.php");
		}
	}
}
}else{
	header("Location: ../log-in.php");
}

?>
