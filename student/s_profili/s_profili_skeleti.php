<?php	session_start(); ?>

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


	<link rel="stylesheet" type="text/css" href="s_profili_style.css">
</head>
<body>
	<div class="container">
		<div class="row big_diva">
			<div class="col medium_diva nje">
				<div class="foto_diva"><img src="vetlla.jpg"></div>
				<div class="btn_diva">
					<a href="#">Nrdrysho Foton</a> <br>
					<a href="s_profili_ndrysho_pass.php">Nrdrysho Passwordin</a>
				</div>
			</div>
			<div class="col medium_diva dy">
				<div class="small_diva">
					<h4>Informacion Personal:</h4>
					<p>Emer Mbiemer:  <?php echo $_SESSION['emer'] . " " . $_SESSION['mbiemer']; ?>
					<br>Atesia:  <?php echo $_SESSION['atesia'];?>
					<br>Email:  <?php echo $_SESSION['email'];?>
					<br>Datelindja:  <?php echo $_SESSION['datelindje'];?></p>
				</div>
				<div class="small_diva">
					<h4>Informacion Akademik:</h4>
					<?php $id = $_SESSION['id'];
					$query = "SELECT g.emer_grupi, g.viti, d.emri FROM dega d INNER JOIN grupi g ON d.id_dega = g.id_dega INNER JOIN grupi_student gs ON gs.id_grup = g.id_grupi INNER JOIN perdorues p ON gs.id_student=p.id WHERE p.id='$id' ";
					$result = mysqli_query($connection,$query);
					$row = mysqli_fetch_assoc($result);
					?>
					<p>Viti: <?php echo $row['viti']; ?>
					<br>Dega: <?php  echo $row['emri']; ?>
					<br>Grupi: <?php echo $row['emer_grupi']; ?>
					<br>Statusi: <?php echo $_SESSION['statusi'];?></p>
				</div>
			</div>
		</div>
	</div>
</body>

<?php include '../footer.php'; ?>

</html>



