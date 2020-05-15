<?php 
require '../includes/connect_db.php';

if (isset($_POST['submit'])){
	$id = $_POST['id'];
	$emri = $_POST['emri'];
	$mbiemri = $_POST['mbiemri'];
	$atesia = $_POST['atesia'];
	$email = $_POST['email'];
	$gjinia = $_POST['gjinia'];
	$datelindja = $_POST['datelindja'];

	if (empty($emri) || empty($mbiemri)) {
		$error = '
		{
			"error" : "Nuk duhet inpute bosh"
		}';
		echo $error;
		$errorEmpty = true;
	} else {
		if (!preg_match("/^[a-zA-Z]+$/", $emri) || !preg_match("/^[a-zA-Z]+$/", $mbiemri)) {
			$errorChar = true;
			$error = '
			{
				"error" : "Nuk lejohet perdorimi i numrave dhe shkronjave me hapesire"
			}';
			echo $error;
		} else {
			$errorEmpty = false;
			$errorChar = false;

			$emri = mysqli_real_escape_string($connection, strtolower($emri));
			$mbiemri = mysqli_real_escape_string($connection, strtolower($mbiemri));
			$email = mysqli_real_escape_string($connection, strtolower($email));
			$id = mysqli_real_escape_string($connection, $id);

			$query = "SELECT email FROM perdorues WHERE email = '$email'";
			$result = mysqli_query($connection,$query);
			$query2 = "SELECT id, email FROM perdorues WHERE id = '$id' AND email = '$email'";
			$result2 = mysqli_query($connection,$query2);
			if ((mysqli_num_rows($result) == 1 || mysqli_num_rows($result) == 0) && mysqli_num_rows($result2) == 1) {
				$error = '
				{
					"error" : "Email-i eshte ok"
				}';
				echo $error;
				// $data = array();
				// while ($row = mysqli_fetch_assoc($result)) {       
				// 	$data[] = $row;
				// }
				//  echo json_encode($data);
			} else {
				$error = '
				{
					"error" : "Email-i eshte ekzistent"
				}';
				echo $error;
			}




			// $query = "UPDATE perdorues SET emer = '$emri', mbiemer = '$mbiemeri' WHERE id = '$id'";




			// echo json_encode($_POST);	

		}
	}
} else {
	header("Location: admin.php");
	exit();
}

