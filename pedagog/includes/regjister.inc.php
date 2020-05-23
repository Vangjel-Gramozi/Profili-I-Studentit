<?php 
session_start();
$id_grup=$_GET['id_grupi'];
include "../includes/connect_db.php" ;

$query7="SELECT p.id, p.emer , p.mbiemer FROM perdorues p INNER JOIN grupi_student gs ON p.id= gs.id_student WHERE gs.id_grup='$id_grup'";
$result7=mysqli_query($connection,$query7);
$resultcheck7=mysqli_num_rows($result7);
if (mysqli_num_rows($result7) > 0) {
	$data = array();
		while ($row7 = mysqli_fetch_assoc($result7)) {
			$data[] = $row;
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