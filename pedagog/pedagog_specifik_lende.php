<?php 
include "../includes/connect_db.php" ;
include "./includes/pedagog_lende.inc.php"
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
				<li ><a href="pedagog_specifik_lende.php" ><i class="fas fa-book"></i><?php echo $rows['emer'].'<br>';?> </a></li>	 
		<?php }
	}
	?>			
			</ul>
	</div>
	<form action="includes/log_out.inc.php" method="POST">
		<div class="button1">
		<button>Log Out</button>
	</div>


	<div class="lende">
		<a class="lende_me_zgjedhje" href="#">Kapacitet per lende me zgjedhje</a><br>
	</div>
	<div class="lende">
		<a href="#">menyra e vleresimit per lenden</a><br>
	</div>
	<div class="lende">
		<a href="#">grupet mesimore</a><br>
	</div>
	
		
</body>
<?php 
include "footer.php" ;
?>
</html>