	<?php session_start(); ?>

<?php 
	$servername = 'localhost';
	$dbUsername = 'root';
	$dbPassword = '';
	$dbName = 'profili-i-studentit';

    $connection = mysqli_connect($servername, $dbUsername, $dbPassword, $dbName);
    if(!$connection ) {
        die ("Database connection failed: " . mysqli_connect_error());
    } 
?>

	<?php 
	  if (isset($_SESSION['rol_id'])) {
	    if ($_SESSION['rol_id'] !== '1') {
	      header("Location: ../../log-in.php");
	    }
	  }else{
	    header("Location: ../../log-in.php");
	  }
	 ?>

<?php include '../navbar.php';
		include '../header.php';
	?>

	<link rel="stylesheet" type="text/css" href="s_profili_ndrysho_pass_style.css">
</head>

<body>
	<div class="container">
<form action="bus.php" method="POST">
	<div class="form-group">
	<label for="exampleInputPassword">Passwordi i vjeter: </label>
	<br>
 	<input class="form-control" type="password" name="password_vjeter" placeholder="Password">
 	<br>
 	<label for="exampleInputPassword">Perserisni passwordin e vjeter: </label>
 	<br>
 	<input class="form-control" type="password" name="password_vjeter_repeat" placeholder="Repeat Password">
 	<br>
 	<div class="njoftim">
  </div>
  </div>
  	<div class="form-group">
	<label for="exampleInputPassword">Passwordi i ri: </label>
	<br>
 	<input class="form-control" type="password" name="password_iri" placeholder="Password">
 	<br>
 	<label for="exampleInputPassword">Perserisni passwordin: </label>
 	<br>
 	<input class="form-control" type="password" name="password_iri_repeat" placeholder="Repeat Password">
 	<br>
 	<input class="btn" type="submit" name="submit" value="Update password">
 	<div class="njoftim">
  </div>
  </div>
 <?php  
			if (!isset($_GET['password'])) {
			exit();
		}
		else{
			$passwordCheck = $_GET['password'];
			if ($passwordCheck == "notSame") {
				echo "<p>Te dhenat jane vendosur gabim!!!</p>";
				exit();
			}
			elseif ($passwordCheck == "notSameIri") {
				echo "<p>Te dhenat jane vendosur gabim!!!</p>";
				exit();
			}
			elseif ($passwordCheck == "notSameVjeter") {
				echo "<p>Te dhenat jane vendosur gabim!!!</p>";
				exit();
			}
		}

	?>	 
 </form>
</body>
</div>
<?php include '../footer.php'; ?>

</html>