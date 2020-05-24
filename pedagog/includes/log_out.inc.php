<?php
session_start();
session_unset();
session_destroy();
if(empty($_SESSION['rol_id']) ){
	header("Location: http://localhost/Profili-I-Studentit/log-in.php");
}
if(isset($_SESSION['rol_id'])){
 	if ($_SESSION['rol_id']!=='2') {

 		header("Location: ../../log-in.php");
 	}
 }else{
 	
 	header("Location: ../../log-in.php");
 }
?>