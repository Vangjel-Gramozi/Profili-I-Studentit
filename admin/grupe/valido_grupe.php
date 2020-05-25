<?php 
require '../../includes/connect_db.php';
$errorEmpty;
$errorChar;
if (isset($_POST['submit'])) {
	// echo print_r($_POST);
	$emer = $_POST['emer'];
	$viti = $_POST['viti'];
	$dega = $_POST['dega'];

	if (empty($emer) || empty($viti) || empty($dega)) {
		echo "<span class='error'>Plotesoni te gjitha fushat</span>";
		$errorEmpty = true;
		// echo print_r($_POST);

	} else {

			if (!preg_match('/^[a-z]{1}[0-9]{1}$/', $emer)) {
				$errorChar = true;
				echo "<span>Emri i grupit duhet te kete nje shkronje te vogel dhe nje numer</span>";
			} else {

				$errorEmpty = false;
				$errorChar = false;
				// echo "<span>SUCCESS</span>";
				// global $connection;
				$emer = mysqli_real_escape_string($connection, strtolower($emer));
				$viti = mysqli_real_escape_string($connection, $viti);
				$dega = mysqli_real_escape_string($connection, $dega);

				$query_nr_grupesh = "SELECT * FROM grupi WHERE 
											emer_grupi = '$emer' AND 
											id_dega = '$dega' AND 
											viti = '$viti'";

				$result_nr_grupesh = mysqli_query($connection,$query_nr_grupesh);
				// echo print_r($_POST);
				
				if (mysqli_num_rows($result_nr_grupesh) >= 1) {
					echo "<span>Ky grup eshte ekzistente ne kete dege per kete vit</span>";
					die();
					return;
				} 

					$query = "INSERT INTO grupi (emer_grupi, id_dega, viti) VALUES ('$emer','$dega','$viti')";
				
				
				// 	$query = "INSERT INTO perdorues (emer, mbiemer, gjini, datelindje, rol_id, atesia, email, password) VALUES ('$emri', '$mbiemri', '$gjinia', '$datelindja', '$rolet', '$atesia', '$email', '$hashed_password')";
			

				$result = mysqli_query($connection,$query);

				if(!$result) {
					die("Query failed") . mysqli_error($connection);
				} else {
					echo " Grupi u krijua";
				}
			}
		}

} else {
	header("Location : ../perdorues/admin.php");
	exit();
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
 		// setTimeout(function() {
 		//     $('span').fadeOut('fast');
 		// }, 1000); 
 	}
 	if (errorEmpty == 0 || errorChar == 0) {
 		// $("#emri", "#mbiemri", "#atesia", "input[name='gjinia']", "#datelindja", "#rolet").val(" ");
 		$("#krijo_grupe")[0].reset();
 	}
 /*	if (errorChar == 1) {
 		$("#message").val("Vendosni vetem karaktere");
 	}*/
 </script>