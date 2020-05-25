	<?php session_start(); ?>
	<?php 
	  if (isset($_SESSION['rol_id'])) {
	    if ($_SESSION['rol_id'] !== '1') {
	      header("Location: ../../log-in.php");
	    }
	  }else{
	    header("Location: ../../log-in.php");
	  }
	 ?>
	<?php include '../navbar.php';?>
	<link rel="stylesheet" type="text/css" href="s_homepage_style.css">
	</head>

	<body>
		<!-- ndoshta nje h2 per pershendetje -->
		<div class="container big_diva">
			<div class="row medium_diva">
				<div class="col small_diva">
					<button class="butona" onclick="window.location.href='../s_profili/s_profili_skeleti.php'">Profili</button>
				</div>
				<div class="col small_diva">
					<button class="butona" onclick="window.location.href='../s_lendet/s_lendet_skeleti_1.php'">Lendet</button>
				</div>
			</div>
			<div class="row medium_diva">
				<div class="col small_diva">
					<button class="butona" onclick="window.location.href='../s_dokument/s_dokument_skeleti.php'">Dokument</button>
				</div>
<!-- 				<div class="col small_diva">
					<button class="butona">Orari</button>
				</div> -->
			</div>
		</div>
	</body>

	  <?php include '../footer.php'; ?>

</html>