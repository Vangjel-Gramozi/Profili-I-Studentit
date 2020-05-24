<?php 
include '../includes/connect_db.php';
?>
<?php 
if (isset($_POST['submit'])) {
	$id_lenda=$_POST['id_lenda'];
	$id_grupi=$_POST['id_grupi'];
	$id_student=$_POST['id_student'];
	$pike_projekt = $_POST['pike_projekt'];
	$pike_laborator = $_POST['pike_laborator'];
	$pike_kologium = $_POST['pike_kologium'];
	$pike_seminar = $_POST['pike_seminar'];
	$pike_provim = $_POST['pike_provim'];


	$query="SELECT * FROM nota WHERE id_student='$id_student' AND id_lenda='$id_lenda'";
	$pedagogquery=mysqli_query($connection,$query);
	$row=mysqli_fetch_assoc($pedagogquery);
	if (mysqli_num_rows($pedagogquery)==0) {
		$queryinsert="INSERT INTO nota  VALUES ('$id_student','$id_lenda', '$pike_projekt','$pike_laborator','$pike_kologium','$pike_seminar','$pike_provim')";
		$pedagogqueryinsert=mysqli_query($connection,$queryinsert);
		header("Location:  regjister.php?id_lenda=".$id_lenda."&id_grupi=".$id_grupi);

	}else{
		$querycheck=mysqli_query($connection,"SELECT * FROM nota WHERE id_student='$id_student' AND id_lenda='$id_lenda'");
		$rowcheck=mysqli_fetch_assoc($querycheck);
		if(empty($pike_projekt)){
			$pike_projekt=$rowcheck['pike_projekt'];
		}
		if(empty($pike_laborator)){
			$pike_laborator=$rowcheck['pike_laborator'];
		}
		if(empty($pike_kologium)){
			$pike_kologium=$rowcheck['pike_kologium'];
		}
		if(empty($pike_seminar)){
			$pike_seminar=$rowcheck['pike_seminar'];
		}
		if(empty($pike_provim)){
			$pike_provim=$rowcheck['pike_provim'];
		}

		$queryupdate="UPDATE nota SET pike_projekt ='$pike_projekt', pike_laborator ='$pike_laborator', pike_kologium='$pike_kologium', pike_seminar ='$pike_seminar', pike_provim ='$pike_provim' WHERE id_student='$id_student' && id_lenda='$id_lenda'";
		$pedagogqueryupdate=mysqli_query($connection,$queryupdate);
		header("Location:  regjister.php?id_lenda=".$id_lenda."&id_grupi=".$id_grupi);
	}
}
