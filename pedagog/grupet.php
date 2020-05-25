<?php include "./includes/grupet.inc.php" ?>
<!DOCTYPE html>
<html>
<head>
	<title>Grupet mesimore</title>
	<style type="text/css">
	.container{
	padding-top: 50px;
	background: #1a1a1a;
	opacity: 0.9;
	margin-top: 100px;
}

.qwe {
	border: none;
	text-transform: uppercase;
	background: #f12020;
 	opacity: 0.9;
 	padding: 10px;
 	color: white;
 	margin-top: 20px;
 	margin-bottom: 20px;
 	border-radius: 5px;
 	text-align: center;
}

h4{
	width: 100%;
	text-align: center;
}
.wor{
 	padding: 0px 500px 0px 500px;

}

.qwe:hover {
	color: #1a1a1a;
	text-decoration: none;
}
</style>
</head>
<body>
		<?php
	include "header.php" ;
	?>
	<div class="container">
<div class="row"><h4>Grupet mesimore</h4></div>
<div class="row wor">
<?php
	if($resultcheck4>0){
		while ($rows4=mysqli_fetch_assoc($result4)) {
			$id_grupii=$rows4['id_grupi'];
			$_SESSION[$rows4['emri']]=$rows4['id_grupi'];
			?>
				<a class="qwe" href="regjister.php?id_lenda=<?php echo $_GET['id_lenda']?>&id_grupi=<?php echo $id_grupii ?>"> <?php echo $rows4['emri'].' Viti: '.$rows4['viti'].'  Grupi: '.$rows4['emer_grupi'].'   ';?> </a> <br><br>
		<?php }
	}
	if(isset($_SESSION['rol_id'])){
 	if ($_SESSION['rol_id']!=='2') {

 		header("Location: ../log-in.php");
 	}
 }else{
 	
 	header("Location: ../log-in.php");
 }
	?></div></div>
<?php 
include "footer.php" ;
?>
</body>
</html>