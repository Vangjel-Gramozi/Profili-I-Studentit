<?php 
include '../../includes/connect_db.php';
if (isset($_POST['startCount']) && isset($_POST['count'])) {
	$startCount = $_POST['startCount'];
	$count = $_POST['count'];
	// merr kolonen me te cilen do te besh sort
	// selekto vetem ato te dhena qe te duhen	
	$query = "SELECT * FROM dega ORDER BY id_dega LIMIT $startCount,$count";
	$result = mysqli_query($connection,$query);

	if (mysqli_num_rows($result) > 0) {
	$data = array();
		while ($row = mysqli_fetch_assoc($result)) {        
			$data[] = $row;
		}
		 echo json_encode($data);
	} else {
		$empty = '
		{
			"error" : "Nuk ka dege"
		}';
		echo $empty;
	}
} else {
	header("Location : admin.php");
	exit();
}
