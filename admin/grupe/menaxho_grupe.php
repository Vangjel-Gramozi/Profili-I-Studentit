<?php include '../includes/header.php'; ?>
<link rel="stylesheet" type="text/css" href="../includes/style.css">

</head>
<body>
	<?php include '../includes/navbar.php'; ?>	

	<script type="text/javascript" src="shiko_grupe.js"></script>
	<!-- 	<script type="text/javascript" src="search_perdorues.js"></script> -->

	<div class="container">
		<div class="row wor"><h1 class="center">Grupet</h1></div>
		<div class="row wor">
			<div class="col"><a href="krijo_grupe.php" class="btn" id="krijo_grupe">Krijo grup</a></div>
			<form action = "search.php" method="POST" id="search">
				<div class="col">
							<input class="zxc" type="text" name="search_field" placeholder="Search..." id="search_field">
							<select name="search_column" id="search_column">
								<option value="viti">Viti</option>
								<option value="id_dega">Dega</option>
								<option value="emer_grupi">Emer Grupi</option>
							</select>
							<input class="btn fas fa-search qwer" type="submit" name="search_submit" value="&#xf002" id="search_submit">
						</div>
					</form>
				</div>
				<div id="search_results"></div>
				<div id="grupet">
					<div class = 'row rrjesht' >
						<div class = 'col kolone'>ID</div>
						<div class = 'col kolone'>Emer Grupi</div>
						<div class = 'col kolone'>Dega</div>
						<div class = 'col kolone'>Viti</div>
						<div class = 'col kolone'>Menaxho</div>
					</div>
				</div>	
				<div class="row wor">	
					<button id="trego_grupe" class="btn">Trego me shume grupe</button>
					<button id="kthehu_mbrapa" class="btn hidden">Kthehu tek te gjitha grupet</button>
				</div>
			</div>

			<?php include '../includes/footer.php'; ?>