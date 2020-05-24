<?php include '../includes/header.php' ?>
<?php include '../includes/navbar.php' ?>

<script type="text/javascript">
	$(document).ready(function() {
				$("form").submit(function(event){
					event.preventDefault();
					var emer = $("#emri").val();
					var kuotat = $("#kuotat").val();
					var submit = $("#submit").val();
					$("#message").load("valido_dege.php", {
						emer: emer.trim(),
						kuotat: kuotat,
						submit: submit
					});
					setTimeout(function() {
					    $("#message").text('');
					}, 3500); 
				});
			});
		</script>
	</head>
	<body>
		<div class="continer row justify-content-center">	
			<div class="col-sm-6">
				<h1 class="text-center">Krijo Dege</h1>
				<form action="valido_dege.php" method="POST" class="col-lg-6 offset-lg-3" id="krijo_grupe">
					<div class="form-group">
						<label for="emri">Emri</label>
						<input type="text" name="emri" class="form-control" id="emri" >
					</div>
					<div class="form-group">
						<label for="kuotat">Kuotat</label>
						<input type="number" name="kuotat" class="form-control" id="kuotat" min="10" step="1" >
					</div>
					<input type="submit" name="submit" class="btn btn-primary" value="Krijo dege" id="submit">
				</form>
				<p id="message"></p>
			</div>
		</div>

			<?php include '../includes/footer.php' ?>
