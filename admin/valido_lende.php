<?php 
require '../includes/connect_db.php';
$errorEmpty;
$errorChar;
if (isset($_POST['submit'])) {
	// echo print_r($_POST);
	$emer = $_POST['emer'];
	$kredite = $_POST['kredite'];
	$ore_totale = $_POST['ore_totale'];
	$viti_i_lendes = $_POST['viti_i_lendes'];
	$me_zgjedhje = $_POST['me_zgjedhje'];
	$kuotat = $_POST['kuotat'];
	$dega = $_POST['dega'];

	if (empty($emer) || empty($kredite) || empty($ore_totale) || empty($viti_i_lendes) || empty($dega) || empty($me_zgjedhje)) {
		echo "<span class='error'>Plotesoni te gjitha fushat</span>";
		$errorEmpty = true;
		// echo print_r($_POST);

	} else {

			if (!preg_match('/^[a-z0-9 .\-]+$/i', $emer)) {
				$errorChar = true;
				echo "<span>Vlere jo e sakte per emrin</span>";
			} else {

				$errorEmpty = false;
				$errorChar = false;
				// echo "<span>SUCCESS</span>";
				// global $connection;
				$emer = mysqli_real_escape_string($connection, strtolower($emer));
				$kredite = mysqli_real_escape_string($connection, strtolower($kredite));
				$ore_totale = mysqli_real_escape_string($connection, strtolower($ore_totale));
				$viti_i_lendes = mysqli_real_escape_string($connection, $viti_i_lendes);
				$me_zgjedhje = mysqli_real_escape_string($connection, $me_zgjedhje);
				$kuotat = mysqli_real_escape_string($connection, strtolower($kuotat));
				$dega = mysqli_real_escape_string($connection, strtolower($dega));

				$query_nr_lendesh = "SELECT * FROM lenda WHERE 
											emer = '$emer' AND 
											id_dega = '$dega' AND 
											viti_i_lendes = '$viti_i_lendes'";

				$result_nr_lendesh = mysqli_query($connection,$query_nr_lendesh);
				// echo print_r($_POST);
				
				if (mysqli_num_rows($result_nr_lendesh) >= 1) {
					echo "<span>Kjo lende eshte ekzistente ne kete dege per kete vit</span>";
					die();
					return;
				} 

				if ($me_zgjedhje == 't') {
						$query = "INSERT INTO lenda (emer, kredite, id_dega, ore_totale, viti_i_lendes, me_zgjedhje) VALUES ('$emer', '$kredite', '$dega', '$ore_totale', '$viti_i_lendes', '$kuotat')";
				} else {
					$query = "INSERT INTO lenda (emer, kredite, id_dega, ore_totale, viti_i_lendes) VALUES ('$emer', '$kredite', '$dega', '$ore_totale', '$viti_i_lendes')";
				}
				
				// 	$query = "INSERT INTO perdorues (emer, mbiemer, gjini, datelindje, rol_id, atesia, email, password) VALUES ('$emri', '$mbiemri', '$gjinia', '$datelindja', '$rolet', '$atesia', '$email', '$hashed_password')";
			

				$result = mysqli_query($connection,$query);

				if(!$result) {
					die("Query failed") . mysqli_error($connection);
				} else {
					echo " Lenda u krijua";
				}
			}
		}

} else {
	header("Location: admin.php");
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
 		$("#krijo_lende")[0].reset();
 	}
 /*	if (errorChar == 1) {
 		$("#message").val("Vendosni vetem karaktere");
 	}*/
 </script>