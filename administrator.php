<?php session_start(); ?>
<?php 
	if (isset($_SESSION['rol_id'])) {
		if ($_SESSION['rol_id'] !== '4') {
			header("Location: log-in.php");
		}
	}else{
		header("Location: log-in.php");
	}
 ?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h1>Administrator</h1>
	<?php foreach ($_SESSION as $key => $value) {
		echo $key ."=>". $value ."<br>";
	} ?>
</body>
</html>