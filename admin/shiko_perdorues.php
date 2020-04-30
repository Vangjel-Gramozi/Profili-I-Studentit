<?php include '../includes/connect_db.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Homepage</title>
	<script src="https://code.jquery.com/jquery-3.5.0.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			var count = 2;
			$("#button").click(function(){
				// link to file, data,callback
				count = count + 2;
				$("#p").load("load_perdorues.php", {
					newcount : count
				});
			})
		});
	</script>
</head>
<body>
	<div id="p">
		<?php 
			$query = "SELECT * FROM perdorues LIMIT 2";
			$result = mysqli_query($connection,$query);
			if (mysqli_num_rows($result) > 0) {
				while ($row = mysqli_fetch_assoc($result)) {
					foreach ($row as $key => $value) {
						if ($key !== 'id' && $key !== 'password') {
							echo $value . "		";
						} 
					}
					echo "<br>";
				}
			} else {
				echo "Nuk ka perdorues";
			}
		 ?>
	</div>

	<button id="button">Trego me shume perdorues </button>

</body>
</html>