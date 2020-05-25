<?php 
require '../../includes/connect_db.php';
// echo print_r($_POST);

if (isset($_POST['submit'])){
	$id = $_POST['id'];
	$emer = $_POST['emer'];
	$kredite = $_POST['kredite'];
	$ore_totale = $_POST['ore_totale'];
	$viti_i_lendes = $_POST['viti_i_lendes'];
	$id_dega = $_POST['id_dega'];
	// $gjinia = $_POST['gjinia'];
	// $email = $_POST['email'];
	// $roli = $_POST['rol_id'];
	$flag = false;

	if (empty($emer) || empty($kredite) || empty($ore_totale) || empty($viti_i_lendes)) {
		echo "Nuk duhen inpute bosh";
		// echo $_POST['gjinia'];
		$errorEmpty = true;
	} else {
		if (!preg_match('/^[a-z0-9 .\-]+$/i', $emer) || !preg_match("/^[0-9]+$/", $kredite) || !preg_match("/^[0-9]+$/", $ore_totale) || !preg_match("/^[0-9]+$/", $viti_i_lendes)) {
			$errorChar = true;
			echo "Vlera jo te sakta";
		} else {
			// kontrollo per email ekzistues
			$errorEmpty = false;
			$errorChar = false;
			// echo print_r($_POST);

			$id = mysqli_real_escape_string($connection, $id);
			$emer = mysqli_real_escape_string($connection, strtolower($emer));
			$kredite = mysqli_real_escape_string($connection, $kredite);
			$ore_totale = mysqli_real_escape_string($connection, $ore_totale);
			$viti_i_lendes = mysqli_real_escape_string($connection, $viti_i_lendes);

	
			$query1 = "SELECT emer, id_dega, viti_i_lendes FROM lenda WHERE emer = '$emer' AND id_dega = '$id_dega' AND viti_i_lendes = '$viti_i_lendes'";
			$result1 = mysqli_query($connection,$query1);

			// nuk ekziston lenda ose eshte lende e nje dege tjeter
			if (mysqli_num_rows($result1) == 0) {
				$flag = true;
			} 	
				// eshte lende qe po editojme te dhenat
			
			if ($flag) {
				// echo "ok";
				$query = 
					"UPDATE lenda
					SET emer='$emer', kredite='$kredite', ore_totale='$ore_totale',viti_i_lendes='$viti_i_lendes'
					WHERE id_lenda = '$id'";
				$result = mysqli_query($connection,$query);
				if ($result) {
					echo "Te dhenat u perditesuan";
				} else {
					die("Query failed") . mysqli_error($connection);
				}
			}	else {
				echo "Ekziston nje lende ne kete dege me kete emer";
			}
		}
	}
} else {
	header("Location : ../perdorues/admin.php");
	exit();
}

