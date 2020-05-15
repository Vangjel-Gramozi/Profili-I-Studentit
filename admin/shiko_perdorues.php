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
	<script type="text/javascript" src="shiko_perdorues.js"></script>
	<div class="container">
		<div class="row">
			<a href="krijo_perdorues.php" class="btn btn-primary col" id="krijo_perdorues">Shto Perdorues</a>
			<div class="container h-100 search-margin col">
				<div class="d-flex justify-content-center h-100">
					<div class="searchbar">
						<input class="search_input" type="text" name="" placeholder="Search...">
						<a href="#" class="search_icon"><i class="fas fa-search"></i></a>
					</div>
				</div>
			</div>
		</div>
		<div id="perdoruesit">
			<div class = 'row rrjesht' >
				<div class = 'col kolone'>  ID  </div>  
				<div class = 'col kolone'>  Emer  </div>  
				<div class = 'col kolone'>  Atesia  </div>  
				<div class = 'col kolone'>  Mbiemer  </div>  
				<div class = 'col kolone'>  Gjini  </div>  
				<div class = 'col kolone'>  Datelindje  </div>  
				<div class = 'col kolone'>  Roli  </div>  
				<div class = 'col kolone'>  Statusi  </div>  
				<div class = 'col kolone email'>  Email  </div>  
			</div>
			<?php 
		// $query = "SELECT * FROM perdorues LIMIT $startCount,$userCount";
		// $result = mysqli_query($connection,$query);
		// if (mysqli_num_rows($result) > 0) {
		// 	while ($row = mysqli_fetch_assoc($result)) {
		// 		foreach ($row as $key => $value) {
		// 			if ($key !== 'id' && $key !== 'password') {
		// 				echo $value . "		";
		// 			} 
		// 		}
		// 		echo "<br>";
		// 	}
		// } else {
		// 	echo "<span>Nuk ka perdorues</span>";
		// }
			?>
		</div>	
		<button id="trego_perdorues" class="btn btn-primary">Trego me shume perdorues </button>
	</div>
