<?php 
session_start();
include "../includes/connect_db.php" ;
$query1="SELECT emer FROM jep_mesim_lende 
INNER JOIN lenda 
ON jep_mesim_lende.id_lende=lenda.id_lenda 
where id_pedagog= '".$_SESSION['id']."'";
$result=mysqli_query($connection,$query1);
$resultcheck=mysqli_num_rows($result);


 if(isset($_SESSION['rol_id'])){
 	if ($_SESSION['rol_id']!=='2') {

 		header("Location: log_in.php");
 	}
 }else{
 	
 	header("Location: log_in.php");
 }
?>