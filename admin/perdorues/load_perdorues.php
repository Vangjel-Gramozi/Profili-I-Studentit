<?php 
include '../../includes/connect_db.php';
if (isset($_POST['startCount']) && isset($_POST['userCount'])) {
	$startCount = $_POST['startCount'];
	$userCount = $_POST['userCount'];
	// merr kolonen me te cilen do te besh sort
	// selekto vetem ato te dhena qe te duhen	
	$query = "SELECT * FROM perdorues ORDER BY id LIMIT $startCount,$userCount";
	$result = mysqli_query($connection,$query);

	if (mysqli_num_rows($result) > 0) {
	$data = array();
		while ($row = mysqli_fetch_assoc($result)) {
			// $data['emer'] = $row['emer'];
			// $data['atesia'] = $row['atesia'];
			// $data['mbiemer'] = $row['mbiemer'];
			// $data['email'] = $row['email'];
			// $data['gjini'] = $row['gjini'];
			// $data['datelindje'] = $row['datelindje'];
			// $data['rol_id'] = $row['rol_id'];
			// $data['statusi'] = $row['statusi'];              
			$data[] = $row;
			// if ($row['password']) {
			// 	$data['password'] = NULL;
			// }
		}
		 echo json_encode($data);
	} else {
		$empty = '
		{
			"error" : "Nuk ka perdorues"
		}';
		echo $empty;
	}
} else {
	header("Location : admin.php");
	exit();
}
