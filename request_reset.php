<?php 
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
include 'includes/connect_db.php';

require 'PHPMailer/PHPMailer-master/src/Exception.php';
require 'PHPMailer/PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer/PHPMailer-master/src/SMTP.php';

//shohim nqs perdoruesi ka klikuar submit
if (isset($_POST['submit'])) {

	$emailTo = $_POST['email'];
//shohim nqs perdoruesi e ka plotesuar emailin e kerkuar
	if (empty($emailTo)) {
		header("Location: request_reset.php?signup=empty");
		exit();
	}else{
//shohim nqs perdoreusi ka vendosur nje email te sakte
		if (!filter_var($emailTo, FILTER_VALIDATE_EMAIL)) {
			header("Location: request_reset.php?signup=email");
			exit();
		}else{
//shohim nqs emaili i vendosur eshte ekzistent ne databazen tone
			$emailquery = mysqli_query($connection, "SELECT email FROM perdorues WHERE email = '$emailTo'");
			if (mysqli_num_rows($emailquery) == 0) {
				header("Location: request_reset.php?signup=nonexistent");
				exit();
			}else{
				//dergojme email verifikimi ne emailin e vendosur per ndryshim passwordi
				$code = uniqid(true);
				$query = mysqli_query($connection, "INSERT INTO ndrysho_password(code, email) VALUES('$code','$emailTo')");
				if (!$query) {
					exit("Error");
				}

	// Instantiation and passing `true` enables exceptions
				$mail = new PHPMailer(true);

				try {
    //Server settings
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'stiven.kerthi@fshnstudent.info';                     // SMTP username
    $mail->Password   = 'Stivdan123';                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('stiven.kerthi@fshnstudent.info', 'Profili i Studentit');
    $mail->addAddress($emailTo);     // Add a recipient
    $mail->addReplyTo('no-reply@gmail.com', 'No reply');

    // Content
    $url = "http://". $_SERVER["HTTP_HOST"]. dirname($_SERVER["PHP_SELF"]) . "/forgot_process.php?code=$code";
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Linku i ndryshimit te password ';
    $mail->Body    = "Ju kerkuat ndryshimin e passwordit per emailin " . $emailTo . "." . " Ju lutem klikoni kete <a href = '$url'>link</a>";
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Linku per te ndryshuar password ju dergua ne emailin tuaj.';
} catch (Exception $e) {
	echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
exit();
}

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
	}
</style>
<body>
	<?php include "includes/navBarLogIn.php"; ?>
	<form method="POST">
		<div class="form-group">
			<label for="exampleInputEmail">Adresa Email</label>
			<input class="form-control" type="text" name="email" placeholder="Email" autocomplete="off">
			<br>
			<input class="btn" type="submit" name="submit" value="Reset email">
			<br>
			<div class="njoftim">
				<?php 
				if (!isset($_GET['signup'])) {
					exit();
				}
				else{
					$signupCheck = $_GET['signup'];
					if ($signupCheck == "empty") {
						echo "<p>Ju lutem plotesoni fushen e kerkuar!</p>";
						exit();
					}
					elseif ($signupCheck == "email") {
						echo "<p>Ju lutem vendosni nje email te vlefshem!</p>";
						exit();
					}
					elseif ($signupCheck == "nonexistent") {
						echo "<p>Emaili i vendosur nuk eshte i rregjistruar tek Profili i Studentit!</p>";
						exit();
					}
				}

				?>
			</div>
			
		</div>
	</form>
	<?php
	/* 
		$fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

		if (strpos($fullUrl, "signup=empty") == true) {
			echo "<p>Ju lutem plotesoni fushen e kerkuar!</p>";
			exit();
		}
		elseif (strpos($fullUrl, "signup=email") == true) {
			echo "<p>Ju lutem vendosni nje email te vlefshem!</p>";
			exit();
		}
		elseif (strpos($fullUrl, "signup=nonexistent") == true) {
			echo "<p>Emaili i vendosur nuk eshte i rregjistruar tek Profili i Studentit!</p>";
			exit();
		}
		*/
		?>
	</body>
	</html>