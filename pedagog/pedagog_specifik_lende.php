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
</head>
<body>
	<input type="checkbox" id="check">
	<label for="check">
		<i class="fas fa-bars" id="btn"></i>
		<i class="fas fa-times" id="cancel"></i>
	</label>
<div class="sidebar">
	<header>Profili-i-studentit</header>
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
	<form action="includes/log_out.inc.php" method="POST">
		<div class="button1">
		<button>Log Out</button>
	</div>
<?php
if($resultcheck2>0){
		while ($rows1=mysqli_fetch_assoc($result2)) {
			if($rows1['me_zgjedhje']>='1'){
				?>
				<div class="lende">
					<form action="includes/kapacitet.php?id_lenda=<?php echo $_GET['id_lenda']?>" method="post">
						Kapacitet per lende me zgjedhje:<input type="text" name="kapacitet"> 
						<button type="submit" name="vendos_kapacitet">Submit</button>
					</form>
					<?php echo $rows1['me_zgjedhje']?>
					
				</div>
				<?php
			}
		}
	}
	?>
	
	<div class="lende">
		<a href="vleresimi.php?id_lenda=<?php echo $_GET['id_lenda']?>">menyra e vleresimit per lenden</a><br>
	</div>
	<div class="lende">
		<a href="grupet.php?id_lenda=<?php echo $_GET['id_lenda']?>">grupet mesimore</a><br>
	</div>
	
		
</body>
<?php 
include "footer.php" ;
?>
</html>