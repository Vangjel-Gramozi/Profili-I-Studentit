<script type="text/javascript">
	$(document).ready(function() {
		<?php 
		$startCount = 0; 
		$userCount = 1;
		?>
		var startCount = <?php echo $startCount; ?>;
		var userCount = <?php echo $userCount; ?>;
		$("#trego_perdorues").click(function(){
				// link to file, data,callback
				// count = count + 2;
				$.ajax({
					url:"load_perdorues.php",
					method:"POST",
					data: {
						// mund te kaloj dhe kolonen me te cilen do te bej sort
						startCount : startCount,
						userCount : userCount
					},
					dataType: "JSON",
					success: function(data){
						// shto stilizime ketu
						console.log(data.emer);
						$("#perdoruesit").text(data.emer);
					}
				});
				startCount = startCount + userCount; //1 //2 
				// $("#perdoruesit").load("load_perdorues.php", {
				// 	newcount : count
				// });
			})
	});
</script>
<div class="container">
	<div id="perdoruesit">
		<?php 
		// $query = "SELECT * FROM perdorues LIMIT $startCount,$userCount";
		// $result = mysqli_query($connection,$query);
		// if (mysqli_num_rows($result) > 0) {
		// 	while ($row = mysqli_fetch_assoc($result)) {
		// 		foreach ($row as $key => $value) {
		// 			if ($key !== 'id' && $key !== 'password') {
		// 				echo $value . "		";
		// 			} 
		// 		}
		// 		echo "<br>";
		// 	}
		// } else {
		// 	echo "<span>Nuk ka perdorues</span>";
		// }
		?>
	</div>
	<button id="trego_perdorues" class="btn btn-primary">Trego me shume perdorues </button>
</div>
