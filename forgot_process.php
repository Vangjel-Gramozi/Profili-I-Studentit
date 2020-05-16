<?php 
	include("includes/connect_db.php"); 

	if (!isset($_GET["code"])) {
		exit("Faqja nuk u gjet !");
	}
	$code = $_GET["code"];
	$getEmailQuery = mysqli_query($connection, "SELECT email, code FROM ndrysho_password WHERE code='$code' ");

	if (mysqli_num_rows($getEmailQuery) == 0) {
		exit("Faqja nuk u gjet !");
	}
	if (isset($_POST["password"])) {
		$pw = $_POST["password"];
		$pw = password_hash($pw, PASSWORD_DEFAULT);

		$row = mysqli_fetch_array($getEmailQuery);
		$email = $row["email"];

		$query = mysqli_query($connection, "UPDATE perdorues SET password = '$pw' WHERE email = '$email'");

		if ($query) {
			$query = mysqli_query($connection, "DELETE from ndrysho_password WHERE code = '$code'");
			exit("Password u ndryshua");
		}else{
			exit("Dicka shkoi gabim !");
		}
	}

 ?>

 <form method="POST">
 	<input type="password" name="password" placeholder="New password">
 	<br>
 	<input type="submit" name="submit" value="Update password">
 </form>