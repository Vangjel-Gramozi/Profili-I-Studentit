<?php 
include "../includes/connect_db.php" ;
include "./includes/pedagog_lende.inc.php";

$query2="SELECT me_zgjedhje FROM lenda WHERE id_lenda ='".$_GET['id_lenda']."'";
$result2=mysqli_query($connection,$query2);
$resultcheck2=mysqli_num_rows($result2);


	
?>

<!DOCTYPE html>
<html>
<head>
	<title>Pedagoge Lende|Profili i Studentit</title>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
	<link rel="stylesheet" href="./css/pedagog_lende.css">

	<style type="text/css">
	.container{
	padding-top: 100px;
	background: #1a1a1a;
	opacity: 0.9;
	margin-top: 100px;
}

h5 {
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

.ewq:hover {
	color: #1a1a1a;
	text-decoration: none;
}


.container{
	padding-bottom: 100px;
}

.qwer {
 	margin-top: 20px;
 	margin-bottom: 20px;
 	margin-left: 150px;

}

.form-control{
	width: 10px;
}


/*.rewq {
	margin-left: 25%;
	width: 0%;
}*/

/*.form-control {
	width: 100%;
}
*/
</style>

</head>
<body>

		<?php
	include "header.php" ;
	?>
	<input type="checkbox" id="check">
	<label for="check">
		<i class="fas fa-bars" id="btn"></i>
		<i class="fas fa-times" id="cancel"></i>
	</label>
<div class="sidebar">
			<ul >
				<li></li>
				<?php
	if($resultcheck>0){
		while ($rows=mysqli_fetch_assoc($result)) {
			?>
				<li ><a href="pedagog_specifik_lende.php?id_lenda=<?php echo $rows['id_lenda']?>" ><i class="fas fa-book"></i><?php echo $rows['emer'].'<br>';?> </a></li>	 
		<?php }
	}
	?>			
			</ul>
	</div>
<div class="container">
	
			<?php
			if($resultcheck2>0){
					while ($rows1=mysqli_fetch_assoc($result2)) {
						if($rows1['me_zgjedhje']>='1'){
							?>
							<div class="lende">
								<form action="includes/kapacitet.php?id_lenda=<?php echo $_GET['id_lenda']?>" method="post">
								<div class="row">	<h5>Kapacitet per lende me zgjedhje:</h5></div><div class="row rewq"><div class="col"></div> <div class="col qwer"><input class="form-control " type="text" name="kapacitet" placeholder="Nr"> </div>
								<div class="col"><button class="ewq" type="submit" name="vendos_kapacitet">Submit</button></div> <div class="col"></div></div>	
								</form>
								<div class="row"><h5>Kapacitet aktual : <?php echo $rows1['me_zgjedhje']?></h5></div>
								
							</div>
							<?php
						}
					}
				}
				?>

				<div class="lende row">
					<a class="qwe" href="vleresimi.php?id_lenda=<?php echo $_GET['id_lenda']?>">Menyra e vleresimit per lenden</a><br>
				</div>
				<div class="lende row">
					<a class="qwe" href="grupet.php?id_lenda=<?php echo $_GET['id_lenda']?>">Grupet mesimore</a><br>
				</div>
</div>
		
</body>
<?php 
include "footer.php" ;
?>
</html>