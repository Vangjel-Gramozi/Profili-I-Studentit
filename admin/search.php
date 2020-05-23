<?php 
require '../includes/connect_db.php';

if (isset($_POST['search_submit'])){

		$search = mysqli_real_escape_string($connection, strtolower($_POST['search_field']));
		$search_column = mysqli_real_escape_string($connection, strtolower($_POST['search_column']));
		$table = mysqli_real_escape_string($connection, $_POST['search_table']);

		if (empty($search)) {
			$empty = '
			{
				"error" : "Error! Kerkim bosh..."
			}';
			echo $empty;
			return;
		} 		

		// if (strcmp($search_column, "id_dega") == 0) {
		// 		// $query2 = "SELECT id_dega FROM dega WHERE emri LIKE '%$search%'";
		// 		// $result2 = mysqli_query($connection,$query);

		// 		// if(!$result2) {
		// 		// 	die("Query failed") . mysqli_error();
		// 		// }
		// 		// while ($row = mysqli_fetch_assoc($result2)) {
		// 		// 	$data[] = $row;
		// 		// }
		// 		// echo json_encode($data);
		// 		// $search = $row['id_dega'];
		// 	$empty = '
		// 	{
		// 		"error" : "Nuk ka rezultate per kerkimin"
		// 	}';
		// 	echo $empty;
		// }
		
		$query = "SELECT * FROM $table WHERE $search_column LIKE '%$search%'";
		$result = mysqli_query($connection,$query);
		$nr = mysqli_num_rows($result);
		if ($nr > 0) {
			$data = array();
			while ($row = mysqli_fetch_assoc($result)) {
				$data[] = $row;
			}
			echo json_encode($data);
		} else {
			$empty = '
			{
				"error" : "Nuk ka rezultate per kerkimin"
			}';
			echo $empty;
		}
		
} else {
	header("Location: admin.php");
	exit();
}