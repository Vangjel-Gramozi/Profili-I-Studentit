<?php include "./includes/pedagog_lende.inc.php" ?>
<!DOCTYPE html>
<html>
<head>
	<title>Pedagoge Lende|Profili i Studentit</title>
	<!-- <link rel="stylesheet" href="./css/pedagog_lende.css"> -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</head>

<style type="text/css">
	.container{
	padding-top: 50px;
	background: #1a1a1a;
	opacity: 0.9;
	margin-top: 100px;
}

h1 {
	width: 100%;
	text-align: center;
}
.row.{
	align-content: center;
}

.qwe {
	text-transform: uppercase;
	background: #f12020;
 	opacity: 0.9;
 	padding: 10px;
 	color: white;
 	margin-top: 20px;
 	margin-bottom: 20px;
 	margin-right: 35%;
 	margin-left: 35%;
 	border-radius: 5px;
 	width: 100%;
 	text-align: center;
}

.qwe:hover {
	color: #1a1a1a;
	text-decoration: none;
}

.container{
	padding-bottom: 100px;
}

</style>

<body>
	<?php
	include "header.php" ;
	?>
	
	<div class="container">
	<div class="row"><h1>Lendet:</h1></div>
	
		<?php
			if($resultcheck>0){
				while ($rows=mysqli_fetch_assoc($result)) {
					$emer_lende=$rows['emer'];
					$_SESSION[$emer_lende]=$rows['id_lenda'];
					?>
					<div class="row">	<a class="qwe" href="pedagog_specifik_lende.php?id_lenda=<?php echo $_SESSION[$emer_lende]?>" ><?php echo $emer_lende.'<br>';?> </a> </div>
		<?php }
				}?>
	
	</div>
</body>
<?php 
include "footer.php" ;
?>
</html>
