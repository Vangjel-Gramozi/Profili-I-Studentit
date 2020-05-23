<?php include 'includes/header.php'; ?>
</head>
<body>
	<style type="text/css">
		.hidden {
			display: none;
		}
		.rrjesht {
			border-top: 1px solid black;
			border-bottom: 1px solid black;
			align-content: left;
			padding: 0.5em;
		}
		.kolone {
			margin: 1px;
			align-content: left;
			display: flex;
			width: 10px;
		}
		.btn {
			/*align: center;*/
			margin: 20px;
		}
		.email {
			width: 100px;
		}
		#trego_perdorues {
			margin-left: 25em;
			align: center;
		}
		#krijo_perdorues {
			font-size: 2em;
		}


		/*----------------------------------*/


		.searchbar{
			margin-bottom: auto;
			margin-top: auto;
			height: 60px;
			background-color: #007bff;
			border-radius: 30px;
			padding: 10px;
		}

		.search_input{
			color: white;
			border: 0;
			outline: 0;
			background: none;
			width: 0;
			caret-color:transparent;
			line-height: 40px;
			transition: width 0.4s linear;
		}

		.searchbar:hover > .search_input{
			padding: 0 10px;
			width: 450px;
			caret-color:gray;
			transition: width 0.1s linear;
		}

		.searchbar:hover > .search_icon{
			background: white;
			color: black;
		}

		.search_icon{
			height: 40px;
			width: 40px;
			float: right;
			display: flex;
			justify-content: center;
			align-items: center;
			border-radius: 50%;
			color:white;
			text-decoration:none;
		}

		.search-margin {
			margin: 20px;
		}
		/*----------------------------------*/
	</style>

<?php include 'includes/navbar.php'; ?>	

	<script type="text/javascript" src="shiko_grupe.js"></script>
<!-- 	<script type="text/javascript" src="search_perdorues.js"></script> -->

	<div class="container">
		<div class="row">
			<a href="krijo_grupe.php" class="btn btn-primary col" id="krijo_grupe">Shto grup</a>
			<form action = "search.php" method="POST" id="search">
				<div class="container col">
					<!-- <div class="d-flex justify-content-center h-100"> -->
						<!-- <div class="searchbar"> -->
							<input type="text" name="search_field" placeholder="Search..." id="search_field">
							<select name="search_column" id="search_column">
								<option value="viti">Viti</option>
								<option value="id_dega">Dega</option>
								<option value="emer_grupi">Emer Grupi</option>
							</select>
							<input type="submit" name="search_submit" value="search" id="search_submit">
							<!-- <a class="search_icon"><i class="fas fa-search"></i></a> -->
						<!-- </div> -->
					<!-- </div> -->
				</div>
			</form>
		</div>
			<div id="search_results"></div>
		<div id="grupet">
			<div class = 'row rrjesht' >
				<div class = 'col kolone'>    </div>  
				<div class = 'col kolone'>  ID  </div>  
				<div class = 'col kolone'>  Emer Grupi  </div>  
				<div class = 'col kolone'>  Dega  </div>  
				<div class = 'col kolone'>  Viti  </div>  
			</div>
		</div>	
		<button id="trego_grupe" class="btn btn-primary">Trego me shume grupe </button>
		<button id="kthehu_mbrapa" class="btn btn-primary hidden">Kthehu ne faqen kryesore </button>
	</div>

<?php include 'includes/footer.php'; ?>