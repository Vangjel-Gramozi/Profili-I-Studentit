<?php include '../includes/header.php'; ?>
<link rel="stylesheet" type="text/css" href="../includes/style.css">

</head>
<body>
	
	<?php include '../includes/navbar.php'; ?>	

	<script type="text/javascript" src="shiko_lende.js"></script>
	<!-- 	<script type="text/javascript" src="search_perdorues.js"></script> -->

	<div class="container">
		<div class="row wor"><h1 class="center">Lendet</h1></div>
		<div class="row wor">
			<div class="col"><a href="krijo_lende.php" class="btn" id="krijo_lende">Krijo Lende</a></div>
			<form action = "search.php" method="POST" id="search">
				<div class="col">
					<input class="zxc" type="text" name="search_field" placeholder="Search..." id="search_field">
					<select name="search_column" id="search_column">
						<option value="emer">Emer</option>
						<option value="kredite">Kredite</option>
						<option value="id_dega">Dega</option>
						<option value="ore_totale">Ore Totale</option>
						<option value="viti_i_lendes">Viti i Lendes</option>
						<option value="me_zgjedhje">Kapaciteti per lendet me zgjedhje</option>
					</select>
					<input class="btn fas fa-search qwer" type="submit" name="search_submit" value="&#xf002" id="search_submit">
				</div>
			</form>
		</div>
		<div id="search_results"></div>
		<div id="lendet">
			<div class = 'row rrjesht' >
				<div class = 'col kolone'>ID</div>
				<div class = 'col kolone'>Emer</div>
				<div class = 'col kolone'>Kredite</div>
				<div class = 'col kolone'>Dega</div>
				<div class = 'col kolone'>Ore Totale</div>
				<div class = 'col kolone'>Viti i Lendes</div>
				<div class = 'col kolone'>Kapaciteti per lendet me zgjedhje</div>
				<div class = 'col kolone'>Menaxho</div>
			</div>
		</div>	
		<div  class="row wor">
			<button id="trego_lende" class="btn">Trego me shume lende</button>
			<button id="kthehu_mbrapa" class="btn hidden">Kthehu tek te gjitha lendet</button>
		</div>
	</div>

	<?php include '../includes/footer.php'; ?>