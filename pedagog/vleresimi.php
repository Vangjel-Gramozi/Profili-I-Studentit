<?php
$id_lenda1=$_GET['id_lenda'];
include  "./includes/vleresimi1.inc.php" ;
if(isset($_SESSION['rol_id'])){
 	if ($_SESSION['rol_id']!=='2') {

 		header("Location: ../log-in.php");
 	}
 }else{
 	
 	header("Location: ../log-in.php");
 }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Vleresimi</title>
</head>
<body>
	<h1>Vendos menyren e vleresimit per lenden</h1>
	<form action="includes/vleresimi.inc.php?id_lenda=<?php echo $_GET['id_lenda']?>" method="post">
		Pike projekti:<input type="text" name="pike_projekt" ><br>
		Pike laboratori:<input type="text" name="pike_laborator" ><br>
		Pike kologiumi:<input type="text" name="pike_kologium" ><br>
		Pike seminari:<input type="text" name="pike_seminar" ><br>
		Pike provimi:<input type="text" name="pike_provim" ><br>

		<button  type="submit" name="vendos_vleresim">Submit</button>
	</form>
	<?php
			if($resultcheck6>0){
				while ($rows6=mysqli_fetch_assoc($result6)) {
	?>
					<table>
						<tr> <td> <?php echo $rows6['pike_projekt'] ?> </td></tr>
						<tr> <td> <?php echo $rows6['pike_laborator'] ?> </td></tr>
						<tr> <td> <?php echo $rows6['pike_kologium'] ?> </td></tr>
						<tr> <td> <?php echo $rows6['pike_seminar'] ?> </td></tr>
						<tr> <td> <?php echo $rows6['pike_provim'] ?> </td></tr>
					</table> 
		<?php }
		}
	?>
</body>
</html>