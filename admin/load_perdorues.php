<?php 
include '../includes/connect_db.php';
$newcount = $_POST['newcount'];
$query = "SELECT * FROM perdorues LIMIT $newcount";

$result = mysqli_query($connection,$query);
if (mysqli_num_rows($result) > 0) {
	while ($row = mysqli_fetch_assoc($result)) {
		foreach ($row as $key => $value) {
			if ($key !== 'id' && $key !== 'password') {
				echo $value . "	";
			} 
		}
		echo "<br>";
	}
} else {
	echo "Nuk ka perdorues";
}



?>