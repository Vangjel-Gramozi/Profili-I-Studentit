<?php 
require '../includes/connect_db.php';

$last_id = mysqli_insert_id($connection);
$query2 = "SELECT * FROM perdorues ORDER BY id DESC LIMIT 1";
$result2 = mysqli_query($connection,$query2);

// if (mysqli_num_rows($result2) > 0) {
	$data = array();
$row = mysqli_fetch_assoc($result2);
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
	
	echo json_encode($row);
// } else {
// 	$empty = '
// 	{
// 		"error" : "Nuk ka perdorues"
// 	}';
// 	echo $empty;
// }