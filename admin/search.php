<?php 
require '../includes/connect_db.php';
// print_r($_POST);	
if (isset($_POST['search_submit'])){
	// echo json_encode(print_r($_POST));
		$search = mysqli_real_escape_string($connection, strtolower($_POST['search_field']));
		$search_column = mysqli_real_escape_string($connection, strtolower($_POST['search_column']));

		if (empty($search)) {
			$empty = '
			{
				"error" : "Error! Kerkim bosh..."
			}';
			echo $empty;
			// echo "{'error' : 'Vlere bosh per kerkimin'}";
			return;
		} 		
		$query = "SELECT * FROM perdorues WHERE $search_column LIKE '%$search%'";
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