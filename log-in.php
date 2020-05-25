<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
	<title>Profili i Studentit</title>
	<link rel="stylesheet" type="text/css" href="Css/LogInStyle.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
</head>
<body>
  <?php include"includes/navBarLogIn.php"; ?>
	<div class="container">
		<div class="login-content">
			<form action="includes/login_process.php" method="post">
				<h2 class="title">Welcome</h2>
       <div class="input-div one">
        <div class="i">
          <i class="fas fa-user"></i>
        </div>
        <div class="div">
          <input type="text" class="input" id="user" name="email" placeholder="Email">
        </div>
      </div>
      <div class="input-div pass">
        <div class="i"> 
          <i class="fas fa-lock"></i>
        </div>
        <div class="div">
          <input type="password" class="input" id="password" name="password" placeholder="Password">
        </div>
      </div>
      <a href="request_reset.php">Forgot Password?</a>
      <input type="submit" class="btn" value="Login" name="login">
      <?php 
        if (!isset($_GET['fields'])) {
          exit();
        }
        else{
          $logInCheck = $_GET['fields'];
          if ($logInCheck == "empty") {
            echo "<p>Ju lutem plotesoni fushat e kerkuara!</p>";
            exit();
          }
          elseif ($logInCheck == "email") {
            echo "<p>Ju lutem vendosni nje email te vlefshem!</p>";
            exit();
          }
          elseif ($logInCheck == "emailEmpty") {
            echo "<p>Perdoruesi nuk ekziston !</p>";
            exit();
          }elseif ($logInCheck == "passwordError") {
            echo "<p>Email dhe password nuk perputhen !</p>";
            exit();
          }
        }

        ?>
    </form>
  </div>
</div>
<script type="text/javascript" src="JavaScript/LogInJS.js"></script>
</body>
</html>