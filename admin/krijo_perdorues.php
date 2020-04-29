<!DOCTYPE html>
<html>
<head>
	<title>Homepage Adim</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
	<div class="continer">	
		<div class="col-sm-6">
			<h1 class="text-center">Krijo Perdorues</h1>
			<form action="includes/proceso_shtim_perdoruesi.php" method="post">
				<div class="form-group">
					<label for="emri">Emer</label>
					<input type="text" name="emri" class="form-control" id="emri">
				</div>
				<div class="form-group">
					<label for="mbiemri">Mbiemer</label>
					<input type="text" name="mbiemri" class="form-control" id="mbiemri">
				</div>
				<div class="form-group">
					<label for="atesia">Atesia</label>
					<input type="text" name="atesia" class="form-control" id="atesia">
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
					<input type="date" name="datelindja" class="form-control" id="datelindja">
				</div>
				<div class="form-group">
					<label for="roli">Lloji i perdoruesit</label>
					<select name="roli">
					<option disabled selected value="">Zgjidh nje rol</option> 
				        <?php
				           trego_rolet();
				        ?>
				    </select>
				</div>

				<input type="submit" name="submit" class="btn btn-primary" value="Krijo Perdorues">
			</form>
		</div>
	</body>
	</html>