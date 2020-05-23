<?php 
require '../includes/connect_db.php';
// echo print_r($_POST);

if (isset($_POST['submit'])){
	$id = $_POST['id'];
	$emer = $_POST['emer'];
	$viti = $_POST['viti'];
	$id_dega = $_POST['id_dega'];
	$flag = false;

	if (empty($emer) || empty($viti)) {
		echo "Nuk duhen inpute bosh";
		// echo $_POST['gjinia'];
		$errorEmpty = true;
	} else {
		if (!preg_match('/^[a-z]{1}[0-9]{1}$/', $emer)) {
			$errorChar = true;
			echo "<span>Emri i grupit duhet te kete nje shkronje te vogel dhe nje numer</span>";
		} else {
			// kontrollo per email ekzistues
			$errorEmpty = false;
			$errorChar = false;
			// echo print_r($_POST);

			$id = mysqli_real_escape_string($connection, $id);
			$emer = mysqli_real_escape_string($connection, strtolower($emer));
			$viti = mysqli_real_escape_string($connection, $viti);

			$query = "SELECT emer_grupi, id_dega FROM grupi WHERE emer_grupi = '$emer' AND id_dega = '$id_dega'";
			$result = mysqli_query($connection,$query);

			$query2 = "SELECT id_grupi, emer_grupi FROM grupi WHERE id_grupi = '$id' AND emer_grupi = '$emer'";
			$result2 = mysqli_query($connection,$query2);

			// nuk ekziston grupi ose eshte lende e nje dege tjeter
			if (mysqli_num_rows($result) == 0 || mysqli_num_rows($result2) == 1) {
				$flag = true;
			} 	
				// eshte grupi qe po editojme te dhenat
			
			if ($flag) {
				// echo "ok";
				$query = 
					"UPDATE grupi
					SET emer_grupi='$emer',viti='$viti'
					WHERE id_grupi = '$id'";
				$result = mysqli_query($connection,$query);
				if ($result) {
					echo "Te dhenat u perditesuan";
				} else {
					die("Query failed") . mysqli_error($connection);
				}
			}	else {
				echo "Ekziston nje grup ne kete dege me kete emer";
			}
		}
	}
} else {
	header("Location: admin.php");
	exit();
}

