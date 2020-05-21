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
			?>
			<form action="includes/lende_me_zgjedhje.inc.php" method="post">
			<button class="lende" name="specifika" >
				<a href="pedagog_specifik_lende.php"><?php echo $rows['emer'].'<br>';?> </a> 
			</button>
			<br>
			</form>
				 
		<?php }
	}
	?>

</body>
<?php 
include "footer.php" ;
?>
</html>
