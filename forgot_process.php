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
	if (isset($_POST["submit"])) {

		$pw = $_POST["password"];
		$pwRetype = $_POST["repeatPassword"];

		if(empty($pw) || empty($pwRetype)){
			header("Location: forgot_process.php?code=$code&password=empty");
			exit();
		}
		elseif ($pw != $pwRetype) {
			header("Location: forgot_process.php?code=$code&password=notSame");
			exit();
		}
		else{
			$pw = password_hash($pw, PASSWORD_DEFAULT);

			$row = mysqli_fetch_array($getEmailQuery);
			$email = $row["email"];

			$query = mysqli_query($connection, "UPDATE perdorues SET password = '$pw' WHERE email = '$email'");

			if ($query) {
				$query = mysqli_query($connection, "DELETE from ndrysho_password WHERE code = '$code'");
				echo "Password u ndryshua";
				header("location: log-in.php?changes=passwordChanged");
				
			}else{
				exit("Dicka shkoi gabim !");
			}
		}
		
	}

 ?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</head>
<style>
	.form-group{
		margin-top:300px;
		margin-right: 600px;
		margin-left: 600px; 
		padding: 50px;
		border: 1px solid gray;
		border-radius: 25px;
	}

	.btn{
		margin-left: 38%;
		background-color: #82A6E0; 
	}

	.njoftim{
		margin-top: 10px;
		text-align: center;
		color: red;
	}
</style>
<body>
<form method="POST">
	<div class="form-group">
	<label for="exampleInputPassword">Passwordi i ri: </label>
	<br>
 	<input class="form-control" type="password" name="password" placeholder="New password">
 	<br>
 	<label for="exampleInputPassword">Perserisni passwordin: </label>
 	<br>
 	<input class="form-control" type="repeatPassword" name="repeatPassword" placeholder="Repeat Password">
 	<br>
 	<input class="btn" type="submit" name="submit" value="Update password">
 	<div class="njoftim">
 	<?php 
 	if (!isset($_GET['password'])) {
			exit();
		}
		else{
			$passwordCheck = $_GET['password'];
			if ($passwordCheck == "empty") {
				echo "<p>Ju lutem plotesoni fushat e kerkuara!</p>";
				exit();
			}
			elseif ($passwordCheck == "notSame") {
				echo "<p>Password-i i rivendosur eshte gabim!</p>";
				exit();
			}
		}
  ?>
  </div>
  </div>
 </form>
 
</body>
</html>


 
