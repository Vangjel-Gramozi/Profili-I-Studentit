<link rel="stylesheet" href="./css/footer.css">
<footer>
	<p>Profili i Studentit  Copyright &copy; </p>
</footer>
<?php
	if(isset($_SESSION['rol_id'])){
 	if ($_SESSION['rol_id']!=='2') {

 		header("Location: ../log-in.php");
 	}
 }else{
 	
 	header("Location: ../log-in.php");
 }