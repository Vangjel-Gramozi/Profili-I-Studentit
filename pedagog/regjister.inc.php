<?php 
session_start();
include "../includes/connect_db.php" ;
// $id_grup=$_GET['id_grupi'];
// $id = $_GET['id_grup'];
// $id_lenda = $_GET['id_lenda'];
// echo print_r($_GET['id_grup']);
$query7="SELECT p.id, p.emer , p.mbiemer FROM perdorues p INNER JOIN grupi_student gs ON p.id= gs.id_student WHERE gs.id_grup= '$id_grupi' ";
$result7=mysqli_query($connection,$query7);
$resultcheck7=mysqli_num_rows($result7);
if (mysqli_num_rows($result7) >= 0) {
	$data = array();
		while ($row7 = mysqli_fetch_assoc($result7)) {
			$data[] = $row7;
		}
		 echo json_encode($data);
	} else {
		$empty = '
		{
			"error" : "Nuk ka perdorues"
		}';
		echo $empty;
	}
?>