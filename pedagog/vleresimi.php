<?php
$id_lenda1=$_GET['id_lenda'];
include  "./includes/vleresimi1.inc.php" ;
if(isset($_SESSION['rol_id'])){
 	if ($_SESSION['rol_id']!=='2') {

 		header("Location: ../log-in.php");
 	}
 }else{
 	
 	header("Location: ../log-in.php");
 }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Vleresimi</title>
	<link rel="stylesheet" href="./css/vleresim.css">
	<style type="text/css">
	.container{
	padding-top: 50px;
	background: #1a1a1a;
	opacity: 0.9;
	margin-top: 100px;
}

h5{
	width: 100%;
	text-align: center;
}
.row{
margin: 10px;
padding: 10px;
 	align-items: center;

}

.wor{
 	padding: 0px 500px 0px 500px;

}

.h {
	margin-left: 50px;
	margin-right: 10px;
	text-align: right; 
}

.ewq {
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

</style>
</head>
<body>
	<?php
	include "header.php" ;
	?>
<div class="container">
	<div class="row"><h5>Vendos menyren e vleresimit per lenden</h5></div>
	<form action="includes/vleresimi.inc.php?id_lenda=<?php echo $_GET['id_lenda']?>" method="post">
			<?php
			if($resultcheck6>0){
				while ($rows6=mysqli_fetch_assoc($result6)) {
	?>
		<div class="row"><div class="col"><h6 class="h">Pike projekti:</h6></div><div class="col"><input type="text" name="pike_projekt" ></div><div class="col"><h6>Pike aktuale projekti: <?php echo $rows6['pike_projekt'] ?></h6></div></div>
		<div class="row"><div class="col"><h6 class="h">Pike laboratori:</h6></div><div class="col"><input type="text" name="pike_laborator" ></div><div class="col"><h6>Pike aktuale laboratori: <?php echo $rows6['pike_laborator'] ?></h6></div></div>
		<div class="row"><div class="col"><h6 class="h">Pike kologiumi:</h6></div><div class="col"><input type="text" name="pike_kologium" ></div><div class="col"><h6>Pike aktuale kologiumi: <?php echo $rows6['pike_kologium'] ?></h6></div></div>
		<div class="row"><div class="col"><h6 class="h">Pike seminari:</h6></div><div class="col"><input type="text" name="pike_seminar" ></div><div class="col"><h6>Pike aktuale seminari: <?php echo $rows6['pike_seminar'] ?></h6></div></div>
		<div class="row"><div class="col"><h6 class="h">Pike provimi:</h6></div><div class="col"><input type="text" name="pike_provim" ></div><div class="col"><h6>Pike aktuale provimi: <?php echo $rows6['pike_provim'] ?></h6 class="h"></div></div>
<?php }
		}
	?>
		<div class="row wor"><button class="ewq" type="submit" name="vendos_vleresim">Submit</button></div>
	</form>
</div>
<?php 
include "footer.php" ;
?>
</body>
</html>