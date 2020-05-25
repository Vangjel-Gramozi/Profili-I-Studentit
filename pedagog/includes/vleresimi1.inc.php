<?php 
session_start();
include "../includes/connect_db.php" ;

$query6="SELECT pike_projekt, pike_laborator, pike_kologium ,pike_seminar,pike_provim FROM jep_mesim_lende WHERE id_lende='$id_lenda1'";

$result6=mysqli_query($connection,$query6);
$resultcheck6=mysqli_num_rows($result6);
if(isset($_SESSION['rol_id'])){
 	if ($_SESSION['rol_id']!=='2') {

 		header("Location: ../../log-in.php");
 	}
 }else{
 	
 	header("Location: ../../log-in.php");
 }