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

	<link rel="stylesheet" type="text/css" href="s_dokument_style.css">
</head>

<body>
	
	<div class="container">
		<form action="sub.php" method="post">
			<div class="row">
				<h4>Kerko Dokument:</h4>
			</div>
			<div class="row">
				<div class="col">
					<label>Tipi:</label><select name="tipi">
						<option selected="selected">Vertetim</option>
						<option>Liste notash</option>
					</select>
				</div>
				<div class="col">
						<label>Nr. Kopjove:</label><select class="wqe" name="sasia">
							<option selected="selected">1</option>
							<option>2</option>
							<option>3</option>
						</select>
				</div>
				<div class="col">
					<input type="submit" class="ewq" name="apliko" value="Apliko">
				</div>
		</form>
	</div>
	<hr class="new">
	<div class="row">
		<h4>Dokumentet e kerkuara:</h4>
	</div>
	<div class="row">
		<div class="col">Nr.</div>
		<div class="col">Lloji</div>
		<div class="col">Nr kopjeve</div>
		<div class="col">Status</div>
	</div>
<div>
	<?php $nr = 0; $id = $_SESSION['id'];
					$query = "SELECT lloji, status, nr_kopjeve FROM dokument WHERE id_student='$id'";
					$result = mysqli_query($connection,$query);
					while ($row = mysqli_fetch_assoc($result)) {
						$nr++;
						$lloji= $row['lloji'];
						$status= $row['status'];
						$nr_kopjeve= $row['nr_kopjeve'];
						?>

	<div class="row">
		<div class="col">
			<?php echo "$nr"; ?>
		</div>
		<div class="col">
			<?php echo "$lloji"; ?>
		</div>
		<div class="col">
			<?php echo "$nr_kopjeve"; ?>
		</div>
		<div class="col">
			<?php echo "$status"; ?>
		</div>
	</div>
				<?php  }  ?>
</div>
<hr class="new">
		<div class="row">
			<div class="col loc">
				<label>Fatura e pageses:</label>
				<button>Download</button>
			</div>
		</div>
	</div>

</body>

<?php include '../footer.php'; ?>

</html>