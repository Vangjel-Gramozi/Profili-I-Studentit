<?php include 'includes/header.php' ?>
<?php include 'includes/navbar.php' ?>

<script type="text/javascript">
	$(document).ready(function() {
				// link to file, data,callback
				$("#rolet").load("load_role.php");
				$("form").submit(function(event){
					event.preventDefault();
					var emri = $("#emri").val();
					var mbiemri = $("#mbiemri").val();
					var atesia = $("#atesia").val();
					var gjinia = $('input[name="gjinia"]:checked').val();
					var datelindja = $("#datelindja").val();
					var rolet = $("#rolet").val();
					var submit = $("#submit").val();
					$("#message").load("valido_perdorues.php", {
						emri: emri.trim(),
						mbiemri: mbiemri.trim(),
						atesia: atesia.trim(),
						gjinia: gjinia,
						datelindja: datelindja,
						rolet: rolet,
						submit: submit
					});
				})
				;
			});
		</script>
	</head>
	<body>
		<div class="continer row justify-content-center">	
			<div class="col-sm-6">
				<h1 class="text-center">Krijo Perdorues</h1>
				<form action="valido_perdorues.php" method="post" class="col-lg-6 offset-lg-3" id="krijo_perdorues">
					<div class="form-group">
						<label for="emri">Emer</label>
						<input type="text" name="emri" class="form-control" id="emri"  >
					</div>
					<div class="form-group">
						<label for="mbiemri">Mbiemer</label>
						<input type="text" name="mbiemri" class="form-control" id="mbiemri" >
					</div>
					<div class="form-group">
						<label for="atesia">Atesia</label>
						<input type="text" name="atesia" class="form-control" id="atesia" >
					</div>
					<div class="form-group">
						<span>Gjinia:</span>
						<input type="radio" name="gjinia" value="m" checked>
						<label for="mashkull">Mashkull</label>
						<input type="radio" name="gjinia" value="f">
						<label for="femer">Femer</label>
					</div>
					<div class="form-group">
						<label for="datelindja">Datelindje</label>
						<input type="date" name="datelindja" class="form-control" id="datelindja" >
					</div>
					<div class="form-group">
						<label for="roli">Lloji i perdoruesit</label>
						<select name="roli" id="rolet">

						</select>
					</div>

					<input type="submit" name="submit" class="btn btn-primary" value="Krijo Perdorues" id="submit">

				</form>
				<p id="message"></p>
			</div>
		</div>

			<?php include 'includes/footer.php' ?>
