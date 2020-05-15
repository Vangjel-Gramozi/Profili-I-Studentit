<?php 
require '../includes/connect_db.php';
// echo print_r($_POST);

if (isset($_POST['submit'])){
	$id = $_POST['id'];
	$emri = $_POST['emri'];
	$mbiemri = $_POST['mbiemri'];
	$atesia = $_POST['atesia'];
	$email = $_POST['email'];
	// $gjinia = $_POST['gjinia'];
	$datelindja = $_POST['datelindja'];
	// $roli = $_POST['rol_id'];
	$flag = false;

	if (empty($emri) || empty($mbiemri) || empty($atesia) || empty($datelindja) || empty($email)) {
		echo "Nuk duhen inpute bosh";
		// echo $_POST['gjinia'];
		$errorEmpty = true;
	} else {
		if (!preg_match("/^[a-zA-Z]+$/", $emri) || !preg_match("/^[a-zA-Z]+$/", $mbiemri) || !preg_match("/^[a-zA-Z]+$/", $atesia)) {
			$errorChar = true;
			echo "Nuk lejohet perdorimi i numrave dhe shkronjave me hapesire";
		} else {
			// kontrollo per email ekzistues
			$errorEmpty = false;
			$errorChar = false;
			// echo print_r($_POST);

			$emri = mysqli_real_escape_string($connection, strtolower($emri));
			$mbiemri = mysqli_real_escape_string($connection, strtolower($mbiemri));
			$email = mysqli_real_escape_string($connection, strtolower($email));
			$id = mysqli_real_escape_string($connection, $id);

			$query = "SELECT email FROM perdorues WHERE email = '$email'";
			$result = mysqli_query($connection,$query);

			$query2 = "SELECT id, email FROM perdorues WHERE id = '$id' AND email = '$email'";
			$result2 = mysqli_query($connection,$query2);

			$query3 = "SELECT rol_id FROM perdorues WHERE id = '$id'";
			$result3 = mysqli_query($connection,$query3);
			$row = mysqli_fetch_assoc($result3);
			// echo ($row['rol_id']);
			// nuk ekziston emial
			if (mysqli_num_rows($result) == 0 ) {
				// be kontroll per email te sakte
				if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
					if ($row['rol_id'] == 1) {
						if(strpos($email, '@fshnstudent.info') !== false){
							echo "emaili i ri: " . $email;
							$flag = true;
						} else {
							echo "Email-i nuk eshte email studenti. Vendosni '@fshnstudent.info'";
						}
					} else if ($row['rol_id'] == 2) {
						if(strpos($email, '@fshnpedagog.info') !== false){
							echo "emaili i ri: " . $email;
							$flag = true;
						} else {
							echo "Email-i nuk eshte email pedagogu. Vendosni '@fshpedagog.info'";
						}
					} else if ($row['rol_id'] == 3) {
						if(strpos($email, '@fshnsekretare.info') !== false){
							echo "emaili i ri: " . $email;
							$flag = true;
						} else {
							echo "Email-i nuk eshte email sekretare. Vendosni '@fshsekretare.info'";
						}
					}  else if ($row['rol_id'] == 4) {
						if(strpos($email, '@fshnadmin.info') !== false){
							echo "emaili i ri: " . $email;
							$flag = true;
						} else {
							echo "Email-i nuk eshte email admini. Vendosni '@fshadmin.info'";
						}
					}
				} else {
					echo "Email jo i vlefshem";
				}
				// eshte emaili i perdoruesit qe po editojme te dhenat
			} else if (mysqli_num_rows($result2) == 1 ) {
				if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
					echo "Ska ndryshime ne email<br>";
					$flag = true;

				} else {
					echo "Email jo i vlefshem";
				}
			}else {
				echo "Email i zene";
			}
			
			if ($flag) {
				$query = 
					"UPDATE perdorues
					SET emer='$emri', mbiemer='$mbiemri',atesia='$atesia',email='$email',datelindje='$datelindja'
					WHERE id = '$id'";
				$result = mysqli_query($connection,$query);
				if ($result) {
					echo "Te dhenat u perditesuan";
				} else {
					die("Query failed") . mysqli_error($connection);
				}
				
			} else {
				echo " Te dhena jo te sakta";
			}
			
			

			// if ((mysqli_num_rows($result) == 1 || mysqli_num_rows($result) == 0) && mysqli_num_rows($result2) == 1) {

			// 	echo "Email-i eshte ok";
			// 	// $data = array();
			// 	// while ($row = mysqli_fetch_assoc($result)) {       
			// 	// 	$data[] = $row;
			// 	// }
			// 	//  echo json_encode($data);
			// } else {
			// 	$error = '
			// 	{
			// 		"error" : "Email-i eshte ekzistent"
			// 	}';
			// 	echo $error;
			// }




			// $query = "UPDATE perdorues SET emer = '$emri', mbiemer = '$mbiemeri' WHERE id = '$id'";




			// echo json_encode($_POST);	

		}
	}
} else {
	header("Location: admin.php");
	exit();
}

