<?php include '../includes/header.php' ?>
<?php include '../includes/navbar.php' ?>

<script type="text/javascript">
	$(document).ready(function() {
				$("#dega").load("../includes/load_deget.php");
				$("form").submit(function(event){
					event.preventDefault();
					var emer = $("#emer").val();
					var viti = $("#viti").val();
					var dega = $("#dega").val();
					var submit = $("#submit").val();
					$("#message").load("valido_grupe.php", {
						emer: emer.trim(),
						viti: viti,
						dega: dega,
						submit: submit
					});
					setTimeout(function() {
					    $("#message").text('');
					}, 3500); 
				});
			});
		</script>
	<link rel="stylesheet" type="text/css" href="../includes/krijo.css">
		
	</head>
	<body>
		<div class="continer row justify-content-center">	
			<div class="col-sm-6">
				<h1 class="text-center">Krijo Grup</h1>
				<form action="valido_grupe.php" method="POST" class="col-lg-6 offset-lg-3" id="krijo_grupe">
					<div class="form-group">
						<label for="emer">Emri</label>
						<input type="text" name="emer" class="form-control" id="emer" min="2" max="2" >
					</div>
					<div class="form-group">
						<label for="viti">Viti</label>
						<input type="number" name="viti" class="form-control" id="viti" min="1" max="3" step="1" >
					</div>
					<div class="form-group">
						<label for="dega">Dega</label>
						<select name="dega" id="dega">
						</select>
					</div>
					<input type="submit" name="submit" class="btn btn-primary" value="Krijo grup" id="submit">
				</form>
				<p id="message"></p>
			</div>
		</div>

			<?php include '../includes/footer.php' ?>
