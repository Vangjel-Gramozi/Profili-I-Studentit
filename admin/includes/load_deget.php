<?php 
include '../../includes/connect_db.php';

$query = "SELECT * FROM dega";
$result = mysqli_query($connection,$query);

if(!$result) {
	die("Query failed") . mysqli_error();
}

echo '<option disabled selected value="">Zgjidh nje dege</option>';
while ($row = mysqli_fetch_assoc($result)) {
	$emri = $row['emri'];
	$id = $row['id_dega'];
	echo "<option value={$id}>{$emri}</option>";
}

?>