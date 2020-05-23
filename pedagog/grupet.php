<?php include "./includes/grupet.inc.php" ?>
<!DOCTYPE html>
<html>
<head>
	<title>Grupet mesimore</title>
</head>
<body>
<h1>Grupet mesimore</h1>
<?php
	if($resultcheck4>0){
		while ($rows4=mysqli_fetch_assoc($result4)) {
			$id_grupii=$rows4['id_grupi'];
			?>
				<a href="regjister1.php?id_lenda=<?php echo $_GET['id_lenda']?>&id_grupi=<?php echo $id_grupii ?>"> <?php echo $rows4['emri'].'  '.$rows4['viti'].'   '.$rows4['emer_grupi'].'   ';?> </a> <br><br>
		<?php }
	}
	?>

</body>
</html>