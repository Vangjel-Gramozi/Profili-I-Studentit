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

	<link rel="stylesheet" type="text/css" href="s_lendet_style.css">
</head>

<body>

<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="s_lendet_skeleti_1.php">Viti 1</a>
  <a href="s_lendet_skeleti_2.php">Viti 2</a>
  <a href="s_lendet_skeleti_3.php">Viti 3</a>
</div>

<div id="hamb" class="ham" onclick="openNav()">
<i class="fa fa-align-justify"></i>
</div>

<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
  document.getElementById("hamb").style.display="none";
  document.getElementById("con").style.marginTop= "100px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("hamb").style.display="block";
  document.getElementById("con").style.marginTop= "0px";
}
</script>

<div id="con" class="container">
	<div class="row">
		<div class="col">
			Nr.
		</div>
		<div class="col">
			Lenda
		</div>
		<div class="col">
			Kredite
		</div>
		<div class="col">
			Ore Totale
		</div>
		<div class="col">
			Pike P
		</div>
		<div class="col">
			Pike K
		</div>
		<div class="col">
			Pike p
		</div>
		<div class="col">
			Pike L
		</div>
		<div class="col">
			Pike S
		</div>
		<div class="col">
			Pike T
		</div>
	</div>
	<?php $nr = 0; $id = $_SESSION['id'];
					$query = "SELECT l.emer,l.kredite,l.ore_totale,l.viti_i_lendes ,l.me_zgjedhje ,n.pike_projekt, n.pike_laborator, n.pike_kologium, n.pike_seminar, n.pike_provim FROM lenda l INNER JOIN nota n ON l.id_lenda=n.id_lenda INNER JOIN perdorues p on n.id_student=p.id WHERE p.id='$id'";
					$result = mysqli_query($connection,$query);
					while ($row = mysqli_fetch_assoc($result)) {
						$nr++;
						$emer = $row['emer'];
						$kredite = $row['kredite'];
						$ore_totale = $row['ore_totale'];
						$me_zgjedhje = $row['me_zgjedhje'];
						$pike_projekt = $row['pike_projekt'];
						$pike_laborator = $row['pike_laborator'];
						$pike_kologium = $row['pike_kologium'];
						$pike_seminar = $row['pike_seminar'];
						$pike_provim = $row['pike_provim'];
						$viti_i_lendes = $row['viti_i_lendes'];
						
						if($viti_i_lendes==3){
						?>

	<div class="row">
		<div class="col">
			<?php echo "$nr"; ?>
		</div>
		<div class="col">
			<?php echo "$emer"; ?>
		</div>
		<div class="col">
			<?php echo "$kredite"; ?>
		</div>
		<div class="col">
			<?php echo "$ore_totale"; ?>
		</div>
		<div class="col">
			<?php echo "$pike_provim"; ?>
		</div>
		<div class="col">
			<?php echo "$pike_kologium"; ?>
		</div>
		<div class="col">
			<?php echo "$pike_projekt"; ?>
		</div>
		<div class="col">
			<?php echo "$pike_laborator"; ?>
		</div>
		<div class="col">
			<?php echo "$pike_seminar"; ?>
		</div>
		<div class="col">
			Piket T
		</div>
	</div>
					<!-- 	echo print_r($row); -->
				<?php	}
			}
					?>
</div>


</body>

<?php include '../footer.php'; ?>

</html>