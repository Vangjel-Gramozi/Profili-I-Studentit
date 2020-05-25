<?php 
require '../../includes/connect_db.php';

if (isset($_POST['search_submit'])){

	$search_column = mysqli_real_escape_string($connection, strtolower($_POST['search_column']));
	$table = mysqli_real_escape_string($connection, $_POST['search_table']);
	$search = mysqli_real_escape_string($connection, strtolower($_POST['search_field']));


	if (empty($search)) {
		$empty = '
		{
			"error" : "Error! Kerkim bosh..."
		}';
		echo $empty;
		return;
	} 		
	if ($search_column == 'id_dega') {
		// SELECT g.* FROM grupi g INNER JOIN dega d ON g.id_dega=d.id_dega WHERE d.emri LIKE '%i%'
		$query2 = "SELECT t.* FROM $table t INNER JOIN dega d ON t.id_dega=d.id_dega WHERE d.emri LIKE '%$search%'";
		$result2 = mysqli_query($connection,$query2);
		$nr = mysqli_num_rows($result2);
		if ($nr > 0) {
			$data = array();
			while ($row = mysqli_fetch_assoc($result2)) {
				$data[] = $row;
			}
			echo json_encode($data);
			return;
		} else {
			$empty = '
			{
				"error" : "Nuk ka rezultate per kerkimin"
			}';
			echo $empty;
			return;
		}
	} 

		
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
	header("Location : ../perdorues/admin.php");
	exit();
}