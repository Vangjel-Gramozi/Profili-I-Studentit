<?php 
	if (isset($_POST['submit'])) {
		require '../../includes/connect_db.php';
		$emri = $_POST['emri'];
		$mbiemri = $_POST['mbiemri'];
		$gjinia = $_POST['gjinia'];
		$datelindja = $_POST['datelindja'];
		$roli = $_POST['roli'];
		$atesia = $_POST['atesia'];
		// $email = gjenero_email($emri,$mbiemri,$roli);

		if (empty($emri) ||empty($mbiemri) ||empty($gjinia) ||empty($datelindja) ||empty($roli) ||empty($atesia)) {
			header("Location :../krijo_perdorues.php?error=emptyfields&emri=".$emri."&mbiemri".$mbiemri);
			exit();
		} else if (!preg_match("/^[a-zA-Z]*$/", $emri) || !preg_match("/^[a-zA-Z]*$/", $mbiemri) || !preg_match("/^[a-zA-Z]*$/", $atesia)) {
			header("Location :../krijo_perdorues.php?error=invalidfields");
			exit();
		} else {
			$sql = "SELECT emer, mbiemer, rol_id FROM perdorues WHERE emer=? AND mbiemer=? AND rol_id=?";
			// prepared statement
			$stmt = mysqli_stmt_init($connection);
			if (!mysqli_stmt_prepare($stmt, $sql)) {
				header("Location :../krijo_perdorues.php?error=sqlerror");
				exit();
			} else {
				mysqli_stmt_bind_param($stmt,"ssi",$emri,$mbiemri,$rol_id);
				mysqli_stmt_execute($stmt);
				mysqli_stmt_store_result($stmt);
				$resultCheck = mysqli_stmt_num_rows($stmt);
		
				$email = gjenero_email($emri,$mbiemri,$roli,$resultCheck);
				if ($roli == 1) {
					$statusi = "i_rregullt";
					$sql = "INSERT INTO perdorues (emer, mbiemer, gjini, datelindje, rol_id, atesia, email, statusi) VALUES (?,?,?,?,?,?,?,?)";
					$stmt = mysqli_stmt_init($connection);
					if (!mysqli_stmt_prepare($stmt, $sql)) {
						header("Location :../krijo_perdorues.php?error=sqlerror");
						exit();
					} else {
						mysqli_stmt_bind_param($stmt,"ssssisss",$emri,$mbiemri,$gjinia,$datelindja,$rol_id,$atesia,$email,$statusi);
						mysqli_stmt_execute($stmt);
						$resultCheck = mysqli_stmt_num_rows($stmt);
						header("Location :../krijo_perdorues.php?signup=sucess");
						exit();
					}
				}  else {
					$sql = "INSERT INTO perdorues (emer, mbiemer, gjini, datelindje, rol_id, atesia, email) VALUES (?,?,?,?,?,?,?)";
					$stmt = mysqli_stmt_init($connection);
					if (!mysqli_stmt_prepare($stmt, $sql)) {
						header("Location :../krijo_perdorues.php?error=sqlerror");
						exit();
					} else {
						mysqli_stmt_bind_param($stmt,"ssssiss",$emri,$mbiemri,$gjinia,$datelindja,$rol_id,$atesia,$email);
						mysqli_stmt_execute($stmt);
						$resultCheck = mysqli_stmt_num_rows($stmt);
						header("Location :../krijo_perdorues.php?signup=sucess");
						exit();
					}
				}
				
			}
			
		}
		// mysqli_stmt_close($stmt);
		// mysqli_close($connection);

	} else {
		header("Location :../krijo_perdorues.php?");
		exit();
	}
	


function gjenero_email($emer,$mbiemer,$roli, $nr){
	global $connection;
	$email = $emer . '.' . $mbiemer;
	if ($nr != 0) {
		$email = $email . ($nr+2);
	} 
	$email = $email . "@fshn";
	
	if ($roli == 0) {
		$email = $email . 'admin.com';
	} else if ($roli == 1) {
		$email = $email . 'student.com';
	} else if ($roli == 2) {
		$email = $email . 'pedagog.com';
	} else {
		$email = $email . 'sekretare.com';
	}
return $email;
}




 ?>