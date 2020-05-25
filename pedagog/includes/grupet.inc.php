<?php 
session_start();
include "../includes/connect_db.php" ;
$id=$_SESSION['id'];
$id_lenda=$_GET['id_lenda'];
$query4=" SELECT g.id_grupi, g.emer_grupi, g.viti, d.emri FROM grupi g INNER JOIN dega d ON d.id_dega=g.id_dega INNER JOIN jep_mesim_grup j ON g.id_grupi=j.id_grup WHERE id_pedagog='$id' AND id_lenda='$id_lenda'";
$result4=mysqli_query($connection,$query4);
$resultcheck4=mysqli_num_rows($result4);

if(isset($_SESSION['rol_id'])){
 	if ($_SESSION['rol_id']!=='2') {

 		header("Location: ../../log-in.php");
 	}
 }else{
 	
 	header("Location: ../../log-in.php");
 }
?>