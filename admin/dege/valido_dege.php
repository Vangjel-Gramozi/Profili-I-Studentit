<?php 
require '../../includes/connect_db.php';
$errorEmpty;
$errorChar;
if (isset($_POST['submit'])) {
	// echo print_r($_POST);
	$emer = $_POST['emer'];
	$kuotat = $_POST['kuotat'];

	if (empty($emer) || empty($kuotat)) {
		echo "<span class='error'>Plotesoni te gjitha fushat</span>";
		$errorEmpty = true;
		// echo print_r($_POST);

	} else {

			if (!preg_match("/^[a-zA-Z]+$/", $emer)) {
				$errorChar = true;
				echo "<span>Emri i deges duhet te permbaje vetem karaktere</span>";
			} else {

				$errorEmpty = false;
				$errorChar = false;
				// echo "<span>SUCCESS</span>";
				// global $connection;
				$emer = mysqli_real_escape_string($connection, strtolower($emer));
				$kuotat = mysqli_real_escape_string($connection, $kuotat);

				$query_nr_degesh = "SELECT * FROM dega WHERE emri = '$emer'";

				$result_nr_degesh = mysqli_query($connection,$query_nr_degesh);
				// echo print_r($_POST);
				
				if (mysqli_num_rows($result_nr_degesh) >= 1) {
					echo "<span>Kjo dege eshte ekzistente</span>";
					die();
					return;
				} 

					$query = "INSERT INTO dega (emri, kuotat) VALUES ('$emer','$kuotat')";
				
				
				// 	$query = "INSERT INTO perdorues (emer, mbiemer, gjini, datelindje, rol_id, atesia, email, password) VALUES ('$emri', '$mbiemri', '$gjinia', '$datelindja', '$rolet', '$atesia', '$email', '$hashed_password')";
			

				$result = mysqli_query($connection,$query);

				if(!$result) {
					die("Query failed") . mysqli_error($connection);
				} else {
					echo "Dega u krijua";
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