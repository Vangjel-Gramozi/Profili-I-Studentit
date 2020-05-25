	<?php session_start(); ?>
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

<?php 
	if (isset($_POST['apliko'])){
		$id = $_SESSION['id'];
		$tipi = $_POST['tipi'];
		$sasia = $_POST['sasia'];

		$query = "INSERT INTO dokument (id_student, lloji, nr_kopjeve) VALUES ('$id','$tipi','$sasia')";

		$user_query = mysqli_query($connection, $query);
		if (!$user_query) {
			exit("Error");
		} else {
			header ("Location: s_dokument_skeleti.php");
			exit();
		}
	}

 ?>