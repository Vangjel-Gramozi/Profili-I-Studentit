<?php include '../includes/header.php'; ?>
<link rel="stylesheet" type="text/css" href="../includes/style.css">
</head>
<body>

	
<?php include '../includes/navbar.php'; ?>	

	<script type="text/javascript" src="shiko_perdorues.js"></script>
<!-- 	<script type="text/javascript" src="search_perdorues.js"></script> -->
	<div class="container">
		<div class="row wor"><h1 class="center">Perdoruesit</h1></div>
		<p id="p_message" class="row wor"></p>
		<div class="row wor">
			<div class="col "><a href="krijo_perdorues.php" class="btn" id="krijo_perdorues">Krijo Perdorues</a></div>	
			<form action = "../includes/search.php" method="POST" id="search">
				<div class="col">
							<input class="zxc" type="text" name="search_field" placeholder="Search..." id="search_field">
							<select name="search_column" id="search_column">
								<option value="emer">Emer</option>
								<option value="mbiemer">Mbiemer</option>
								<option value="atesia">Atesia</option>
								<option value="gjini">Gjinia</option>
								<option value="datelindje">Datelindja</option>
								<option value="email">Email</option>
							</select>
							<input class="btn fas fa-search qwer" type="submit" name="search_submit" value="&#xf002" id="search_submit">
				</div>
			</form>
		</div>
			<div id="search_results"></div>
		<div id="perdoruesit">
			<div class = 'row rrjesht' >
				<div class = 'col kolone'>ID</div>
				<div class = 'col kolone'>Emer</div>
				<div class = 'col kolone'>Atesia</div>
				<div class = 'col kolone'>Mbiemer</div>
				<div class = 'col kolone'>Gjini</div>
				<div class = 'col kolone'>Datelindje</div>
				<div class = 'col kolone'>Roli</div>
				<!-- <div class = 'col kolone'>Statusi</div> -->
				<div class = 'col-3 kolone email'>Email</div>
				<div class = 'col kolone'>Menaxho</div>
			</div>
		</div>	
			<div class="row wor">
				<div class="col"><button id="trego_perdorues" class="btn">Trego me shume perdorues</button></div>
				<div class="col qwe"><button id="kthehu_mbrapa" class="btn hidden">Kthehu ne faqen kryesore</button></div>
		</div>
	</div>


<?php include '../includes/footer.php'; ?>