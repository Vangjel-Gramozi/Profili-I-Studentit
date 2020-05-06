<?php 
require '../includes/connect_db.php';
$errorEmpty;
$errorChar;
if (isset($_POST['submit'])) {
	$emri = $_POST['emri'];
	$mbiemri = $_POST['mbiemri'];
	$atesia = $_POST['atesia'];
	$gjinia = $_POST['gjinia'];
	$datelindja = $_POST['datelindja'];
	$rolet = $_POST['rolet'];

	if (empty($emri) || empty($mbiemri) || empty($atesia) || empty($gjinia) || empty($datelindja) || empty($rolet)) {
		echo "<span>Plotesoni te gjitha fushat</span>";
		$errorEmpty = true;
	} else {
		if (!preg_match("/^[a-zA-Z]+$/", $emri) || !preg_match("/^[a-zA-Z]+$/", $mbiemri) || !preg_match("/^[a-zA-Z]+$/", $atesia)) {
			$errorChar = true;
			echo "Vendosni vetem karaktere pa hapesire";
		} else {

			
			$errorEmpty = false;
			$errorChar = false;
			echo "<span>SUCCESS</span>";
			// global $connection;
			$emri = mysqli_real_escape_string($connection, strtolower($emri));
			$mbiemri = mysqli_real_escape_string($connection, strtolower($mbiemri));
			$gjinia = mysqli_real_escape_string($connection, strtolower($gjinia));
			$datelindja = mysqli_real_escape_string($connection, $datelindja);
			$rolet = mysqli_real_escape_string($connection, $rolet);
			$atesia = mysqli_real_escape_string($connection, strtolower($atesia));

			$query_nr_perdoruesish = "SELECT * FROM perdorues WHERE 
										emer = '$emri' AND 
										mbiemer = '$mbiemri' AND 
										rol_id = '$rolet'";
			$result_nr_perdoruesish = mysqli_query($connection,$query_nr_perdoruesish);
			if(!$result_nr_perdoruesish) {
				die("Query nr perdoruesish failed") . mysqli_error($connection);
			}
			$nr_perdoruesish = mysqli_num_rows($result_nr_perdoruesish);



			$email = gjenero_email($emri,$mbiemri,$rolet,$nr_perdoruesish);
			$email = mysqli_real_escape_string($connection, strtolower($email));
			
			$default_password = "student12345";
			$hashed_password = password_hash($default_password,PASSWORD_DEFAULT);

			if ($rolet == 1) {	
				$statusi = "i_rregullt";
				$query = "INSERT INTO perdorues (emer, mbiemer, gjini, datelindje, rol_id, atesia, email, statusi, password) VALUES ('$emri', '$mbiemri', '$gjinia', '$datelindja', '$rolet', '$atesia', '$email', '$statusi', '$hashed_password')";
			}  else {
				$query = "INSERT INTO perdorues (emer, mbiemer, gjini, datelindje, rol_id, atesia, email, password) VALUES ('$emri', '$mbiemri', '$gjinia', '$datelindja', '$rolet', '$atesia', '$email', '$hashed_password')";
			}

			$result = mysqli_query($connection,$query);

			if(!$result) {
				die("Query failed") . mysqli_error($connection);
			} else {
				echo " Record Created";
				// echo errorEmpty;
			}
		}
	}
} else {
	header("Location: admin.php");
	exit();
}

function gjenero_email($emer,$mbiemer,$rolet, $nr_perdoruesish){
	if ($nr_perdoruesish == 0) {
		$email = $emer . '.' . $mbiemer . '@fshn';
	} else {
		$email = $emer . '.' . $mbiemer . $nr_perdoruesish . '@fshn';
	}
	
	if ($rolet == 4) {
		$email = $email . 'admin.info';
	} else if ($rolet == 1) {
		$email = $email . 'student.info';
	} else if ($rolet == 2) {
		$email = $email . 'pedagog.info';
	} else {
		$email = $email . 'sekretare.info';
	}
	return $email;
}
?>


<script type="text/javascript">
 	// $("#emri", "#mbiemri", "atesia", "gjinia", "datelindja", "#rolet").removeClass("");

 	var errorEmpty = "<?php echo $errorEmpty; ?>";
 	var errorChar = "<?php echo $errorChar; ?>";
 	// console.log(errorEmpty);
 	if (errorEmpty == 1) {
 		// Shto klase per stilizim kur te dhenat te jene gabim
 		// $("#emri", "#mbiemri", "atesia", "gjinia", "datelindja", "#rolet").addClass("");
 	}
 	if (errorEmpty == 0 || errorChar == 0) {
 		// $("#emri", "#mbiemri", "#atesia", "input[name='gjinia']", "#datelindja", "#rolet").val(" ");
 		$("#krijo_perdorues")[0].reset();
 	}
 /*	if (errorChar == 1) {
 		$("#message").val("Vendosni vetem karaktere");
 	}*/
 </script>