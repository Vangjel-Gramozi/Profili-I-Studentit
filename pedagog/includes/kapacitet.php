<?php 
session_start();
include "../../includes/connect_db.php" ;
if(isset($_SESSION['rol_id'])){
 	if ($_SESSION['rol_id']!=='2') {

 		header("Location: ../../log-in.php");
 	}
 }else{
 	
 	header("Location: ../../log-in.php");
 }

if(isset($_POST['vendos_kapacitet'])){

$kapacitet=$_POST['kapacitet'];
$id_lenda=$_GET['id_lenda'];

$query3="UPDATE lenda SET me_zgjedhje='$kapacitet'  WHERE id_lende='$id_lenda'";

$result3=mysqli_query($connection,$query3);
if(!$result3){
	die("Query deshtoi". mysqli_error($connection));
}else{
	header("Location: ../pedagog_specifik_lende.php?id_lenda=".$id_lenda."query=success");
	exit();
}
}
if(isset($_SESSION['rol_id'])){
 	if ($_SESSION['rol_id']!=='2') {

 		header("Location: ../log-in.php");
 	}
 }else{
 	
 	header("Location: ../log-in.php");
 }