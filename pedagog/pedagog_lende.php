<?php include "./includes/pedagog_lende.inc.php" ?>
<!DOCTYPE html>
<html>
<head>
	<title>Pedagoge Lende|Profili i Studentit</title>
	<link rel="stylesheet" href="./css/pedagog_lende.css">
</head>
<body>
	<?php
	include "header.php" ;
	?>
	
	<h1>Lendet:</h1>
	<?php
	if($resultcheck>0){
		while ($rows=mysqli_fetch_assoc($result)) {
			$emer_lende=$rows['emer'];
			$_SESSION[$emer_lende]=$rows['id_lenda'];
			?>
				<a href="pedagog_specifik_lende.php?id_lenda=<?php echo $_SESSION[$emer_lende]?>"><?php echo $emer_lende.'<br>';?> </a> 
		<?php }
	}
	?>

</body>
<?php 
include "footer.php" ;
echo print_r($_SESSION);
?>
</html>
