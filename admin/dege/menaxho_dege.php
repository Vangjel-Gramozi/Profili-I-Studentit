<?php include '../includes/header.php'; ?>
<link rel="stylesheet" type="text/css" href="../includes/style.css">

</head>
<body>
	
	<?php include '../includes/navbar.php'; ?>	

	<script type="text/javascript" src="shiko_dege.js"></script>
	<!-- 	<script type="text/javascript" src="search_perdorues.js"></script> -->

	<div class="container">
		<div class="row wor"><h1 class="center">Deget</h1></div>
		<p id="p_message" class="row wor"></p>
		<div class="row wor">
			<div class="col"><a href="krijo_dege.php" class="btn" id="krijo_dege">Krijo dege</a></div>
			<form action = "search.php" method="POST" id="search">
				<div class="col">
					<input class="zxc" type="text" name="search_field" placeholder="Search..." id="search_field">
					<select name="search_column" id="search_column">
						<option value="kuotat">Kuotat</option>
						<option value="emri">Dega</option>
					</select>
					<input class="btn fas fa-search qwer" type="submit" name="search_submit" value="&#xf002" id="search_submit">
				</div>
			</form>
		</div>
		<div id="search_results"></div>
		<div id="deget">
			<div class = 'row rrjesht' >
				<div class = 'col kolone'>ID</div>
				<div class = 'col kolone'>Dega</div>
				<div class = 'col kolone'>Kuotat</div>
				<div class = 'col kolone'>Menaxho</div>
			</div>
		</div>	
		<div class="row wor">
			<button id="trego_dege" class="btn">Trego me shume dege</button>
			<button id="kthehu_mbrapa" class="btn hidden">Kthehu tek te gjitha deget</button>
		</div>
	</div>

	<?php include '../includes/footer.php'; ?>