<?php 
		require '../includes/connect_db.php';

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
			$email = gjenero_email($emri,$mbiemri,$rolet);
			$errorEmpty = false;
			echo "<span>SUCCESS</span>";
			global $connection;
			$emri = mysqli_real_escape_string($connection, strtolower($emri));
			$mbiemri = mysqli_real_escape_string($connection, strtolower($mbiemri));
			$gjinia = mysqli_real_escape_string($connection, strtolower($gjinia));
			$datelindja = mysqli_real_escape_string($connection, $datelindja);
			$rolet = mysqli_real_escape_string($connection, $rolet);
			$atesia = mysqli_real_escape_string($connection, strtolower($atesia));
			$email = mysqli_real_escape_string($connection, strtolower($email));

			if ($rolet == 1) {	
				$statusi = "i_rregullt";
				$query = "INSERT INTO perdorues (emer, mbiemer, gjini, datelindje, rol_id, atesia, email, statusi) VALUES ('$emri', '$mbiemri', '$gjinia', '$datelindja', '$rolet', '$atesia', '$email', '$statusi')";
			}  else {
				$query = "INSERT INTO perdorues (emer, mbiemer, gjini, datelindje, rol_id, atesia, email) VALUES ('$emri', '$mbiemri', '$gjinia', '$datelindja', '$rolet', '$atesia', '$email')";
			}

			$result = mysqli_query($connection,$query);

			if(!$result) {
				die("Query failed") . mysqli_error($connection);
			} else {
				echo " Record Created";
			}
		}
	} else {
		echo "ERROR";
	}
 


	function gjenero_email($emer,$mbiemer,$rolet){
		global $connection;
		$email = $emer . '.' . $mbiemer . '@fshn';
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

 	var errorEmpty = "<?php echo $erroEmpty; ?>";
 	if (erroEmpty == 'true') {
 		// Shto klase per stilizim kur te dhenat te jene gabim
 		// $("#emri", "#mbiemri", "atesia", "gjinia", "datelindja", "#rolet").addClass("");
 	}
 	if (erroEmpty == false) {
 		// $("#emri", "#mbiemri", "#atesia", "input[name='gjinia']", "#datelindja", "#rolet").val(" ");
 		$(form).reset();
 	}
 </script>