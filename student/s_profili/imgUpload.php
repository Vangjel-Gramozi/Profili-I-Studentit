<?php 
	$servername = 'localhost';
	$dbUsername = 'root';
	$dbPassword = '';
	$dbName = 'profili-i-studentit';

    $connection = mysqli_connect($servername, $dbUsername, $dbPassword, $dbName);
    if(!$connection ) {
        die ("Database connection failed: " . mysqli_connect_error());
    } 
?>
<?php	session_start(); ?>

 <?php 
 	if (isset($_POST['upload'])) {
 		$id = $_SESSION['id'];
 		$target = "../../Img/".basename($_FILES['image']['name']);
 		$image = $_FILES['image']['name'];

 		$queryCheck = mysqli_query($connection, "SELECT * FROM image WHERE idPerson = '$id'");

 		if (mysqli_num_rows($queryCheck) > 0) {
 			$queryUpdate = mysqli_query($connection, "UPDATE image SET image = '$image' WHERE idPerson = '$id'");
 			if (!$queryUpdate) {
 				exit("ERROR Update!");
 			}else{
 				header("Location: s_profili_skeleti.php");
 			}
 		}else{
 			$queryUpdate = mysqli_query($connection, "INSERT INTO image (image, idPerson) VALUES ('$image', '$id')");
 			if (!$queryUpdate) {
 				exit("ERROR INSERT!");
 			}else{
 				header("Location: s_profili_skeleti.php");
 			}
 		}

 		

 		/*if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
 			$msg = "image u upload-ua !";
 		}else{
			$msg = "image nuk u upload-ua !";
 		}*/


 	}
  ?>