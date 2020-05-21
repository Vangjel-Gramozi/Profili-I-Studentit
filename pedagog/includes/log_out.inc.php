<?php
session_start();
session_unset();
session_destroy();
if(empty($_SESSION['rol_id']) ){
	header("Location: http://localhost/Profili-I-Studentit/log-in.php");
}
?>