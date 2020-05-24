<?php 
require '../../includes/connect_db.php';
// echo print_r($_POST);

if (isset($_POST['submit'])){
	$id = $_POST['id'];
	$emri = $_POST['emri'];
	$kuotat = $_POST['kuotat'];
	$flag = false;

	if (empty($emri) || empty($kuotat)) {
		echo "Nuk duhen inpute bosh";
		// echo $_POST['gjinia'];
		$errorEmpty = true;
	} else {
		if (!preg_match("/^[a-zA-Z]+$/", $emri)) {
			$errorChar = true;
			echo "<span>Emri i deges duhet te permbaje vetem karaktere</span>";
		} else {
			// kontrollo per email ekzistues
			$errorEmpty = false;
			$errorChar = false;
			// echo print_r($_POST);

			$id = mysqli_real_escape_string($connection, $id);
			$emri = mysqli_real_escape_string($connection, strtolower($emri));
			$kuotat = mysqli_real_escape_string($connection, $kuotat);

			$query = "SELECT emri FROM dega WHERE id_dega = '$id'";
			$result = mysqli_query($connection,$query);

			// nuk ekziston dega 
			if (mysqli_num_rows($result) == 0) {
				$flag = true;
			} 	
			// eshte dega qe po editojme te dhenat
			
			if ($flag) {
				// echo "ok";
				$query = 
					"UPDATE dega
					SET emri='$emri',kuotat='$kuotat'
					WHERE id_dega = '$id'";
				$result = mysqli_query($connection,$query);
				if ($result) {
					echo "Te dhenat u perditesuan";
				} else {
					die("Query failed") . mysqli_error($connection);
				}
			}	else {
				echo "Ekziston nje dege me kete emri";
			}
		}
	}
} else {
	header("Location: admin.php");
	exit();
}

