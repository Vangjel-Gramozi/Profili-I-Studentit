<?php include "../includes/connect_db.php" ?>
<!DOCTYPE html>
<html>
<head>
	<title>Homepage Adim</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.5.0.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
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
						emri: emri,
						mbiemri: mbiemri,
						atesia: atesia,
						gjinia: gjinia,
						datelindja: datelindja,
						rolet: rolet,
						submit: submit
					});
				});
		});


	</script>
</head>
<body>
	<div class="continer">	
		<div class="col-sm-6">
			<h1 class="text-center">Krijo Perdorues</h1>
			<form action="valido_perdorues.php" method="post">
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
					<input type="radio" name="gjinia" value="m">
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
	</body>
	</html>
