<?php 
session_start();
include "../../includes/connect_db.php" ;

if(isset($_POST['vendos_vleresim'])){

$projekt=$_POST['pike_projekt'];
$laborator=$_POST['pike_laborator'];
$kologium=$_POST['pike_kologium'];
$seminar=$_POST['pike_seminar'];
$provim=$_POST['pike_provim'];

$query3="UPDATE jep_mesim_lende SET pike_projekt='$projekt', pike_laborator='$laborator',pike_kologium='$kologium',pike_seminar='$seminar',pike_provim='$provim' WHERE id_lende='".$_GET['id_lenda']."'";

$result3=mysqli_query($connection,$query3);
if(!$result3){
	die("Query deshtoi". mysqli_error($connection));
}else{
	header("Location: ../vleresimi.php?id_lenda=".$_GET['id_lenda']."query=success");
	exit();
}
}
if(isset($_SESSION['rol_id'])){
 	if ($_SESSION['rol_id']!=='2') {

 		header("Location: ../../log-in.php");
 	}
 }else{
 	
 	header("Location: ../../log-in.php");
 }