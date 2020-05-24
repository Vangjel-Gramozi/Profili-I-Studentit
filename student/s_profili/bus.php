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
	if (isset($_POST['submit'])){
			$pass_vjeter = $_POST["password_vjeter"];
			$pass_vjeter_repeat = $_POST["password_vjeter_repeat"];
			$pass_iri = $_POST["password_iri"];
			$pass_iri_repeat = $_POST["password_iri_repeat"];
			$id = $_SESSION['id'];

/*			if(empty($pass_vjeter) || empty($pass_vjeter_repeat) ||empty($pass_iri) ||empty($password_iri_repeat)){
				header("Location: bus.php?password=empty");
				exit();
			}*/
			if ($pass_vjeter != $pass_vjeter_repeat){
				header("Location: s_profili_ndrysho_pass.php?password=notSame");
				exit();
			}
			elseif ($pass_iri != $pass_iri_repeat){
				header("Location: s_profili_ndrysho_pass.php?password=notSameIri");
				exit();
			}
			else{
				$pass_iri = password_hash($pass_iri, PASSWORD_DEFAULT);
				$query_vjeter = mysqli_query($connection,"SELECT password FROM perdorues WHERE id='$id'");
				if (!$query_vjeter){
					die("Query deshtoi". mysqli_error($connection));
				}
				$row = mysqli_fetch_assoc($query_vjeter);
				/*echo $row['password'];*/
				if (password_verify ($pass_vjeter , $row['password'])){
					$query_ere = mysqli_query($connection,"UPDATE perdorues SET password = '$pass_iri' WHERE id='$id'");
					exit("Passwordi u ndryshua!");
				}else{
				header("Location: s_profili_ndrysho_pass.php?password=notSameVjeter");
				exit();
				}
			}
			}

 ?>