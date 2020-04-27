<?php include "../includes/connect_db.php" ?>
<?php include "functions/functions.php" ?>
<?php krijo_perdorues(); ?>
<script type="text/javascript" src="functions/krijo_perdorues.js"></script>
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
			<form action="krijo_perdorues.php" method="post">
				<div class="form-group">
					<label for="emri">Emer</label>
					<input type="text" name="emri" class="form-control">
				</div>
				<div class="form-group">
					<label for="mbiemri">Mbiemer</label>
					<input type="text" name="mbiemri" class="form-control">
				</div>
				<div class="form-group">
					<label for="atesia">Atesia</label>
					<input type="text" name="atesia" class="form-control">
				</div>
				<div class="form-group">
					<label for="mashkull">Mashkull</label>
					<input type="radio" name="gjinia" value="m">
					<label for="femer">Femer</label>
					<input type="radio" name="gjinia" value="f">
				</div>
				<div class="form-group">
					<label for="datelindja">Datelindje</label>
					<input type="date" name="datelindja" class="form-control">
				</div>
				<div class="form-group">
					<label for="roli">Lloji i perdoruesit</label>
					<select name="roli"> 
				        <?php
				           trego_rolet();
				        ?>
				    </select>
				</div>
				<div class="form-group">
					<label for="email">Email</label>
					<input type="email" name="email" class="form-control">
				</div>

				<input type="submit" name="submit" class="btn btn-primary" value="Krijo Perdorues">
			</form>
		</div>
	</body>
	</html>