<?php 
session_start();
$id_grup=$_GET['id_grupi'];
include "../includes/connect_db.php" ;

$query7="SELECT p.id, p.emer , p.mbiemer FROM perdorues p INNER JOIN grupi_student gs ON p.id= gs.id_student WHERE gs.id_grup='$id_grup'";
$result7=mysqli_query($connection,$query7);
$resultcheck7=mysqli_num_rows($result7);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Regjister</title>
</head>
<body>
	<h1>Grupi</h1>
		<table>
				<tr>
					<td>id studenti</td>
					<td>emer</td>
					<td>mbiemer</td>
				</tr>
						<?php
		while ($rows7=mysqli_fetch_assoc($result7)) {
			?>
			<tr>
				<td><?php echo $rows7['id']; ?></td>
				<td><?php echo $rows7['emer']; ?></td>
				<td><?php echo $rows7['mbiemer']; ?></td>
			</tr>
		<?php }?>
		</table>
</body>
</html>