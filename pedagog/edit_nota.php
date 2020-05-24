<?php 
require '../includes/connect_db.php';
// echo print_r($_POST);

if (isset($_POST['submit'])){
	$id_lenda=$_POST['id_lenda'];
	$id_grupi=$_POST['id_grupi'];
	$id_student=$_POST['id_student'];
	$pike_projekt = $_POST['pike_projekt'];
	$pike_laborator = $_POST['pike_laborator'];
	$pike_kologium = $_POST['pike_kologium'];
	$pike_seminar = $_POST['pike_seminar'];
	$pike_provim = $_POST['pike_provim'];
	

	$query="SELECT pike_projekt, pike_laborator, pike_kologium, pike_seminar, pike_provim FROM nota WHERE id_student='$id_student' && id_lenda='$id_lenda'";
	
	$result = mysqli_query($connection,$query);
	$row=mysqli_fetch_assoc($result);

	echo $row['pike_provim'];
}
	/*$resultcheck=mysqli_num_rows($result);
		if ($resultcheck>0) {
			$query1 = "UPDATE nota SET pike_projekt ='$pike_projekt', pike_laborator ='$pike_laborator', pike_kologium='$pike_kologium', pike_seminar ='$pike_seminar', pike_provim ='$pike_provim' WHERE id_student='$id_student' && id_lenda='$id_lenda'";
			$result1=mysqli_query($connection,$query1);
			echo "update";
			//header("Location:  regjister.php?id_lenda=".$id_lenda."&id_grupi=".$id_grupi);
		} else {
			$query2="INSERT INTO nota (id_student, id_lenda, pike_projekt, pike_laborator, pike_kologium, pike_seminar, pike_provim) VALUES ('$id_student','$id_lenda', $pike_projekt','$pike_laborator','$pike_kologium','$pike_seminar','$pike_provim')";

			$result2=mysqli_query($connection,$query2);
			echo "insert";
			//header("Location:  regjister.php?id_lenda=".$id_lenda."&id_grupi=".$id_grupi);
			
		}
} else {
	header("Location: regjister.php");
	exit();
}*/