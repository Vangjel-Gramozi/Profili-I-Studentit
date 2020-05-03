<script type="text/javascript">
	$(document).ready(function() {
		var count = 2;
		$("#trego_perdorues").click(function(){
				// link to file, data,callback
				count = count + 2;
				$("#perdoruesit").load("load_perdorues.php", {
					newcount : count
				});
			})
	});
</script>
</head>
<body>
	<div id="perdoruesit">
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
			echo "<span>Nuk ka perdorues</span>";
		}
		?>
	</div>

	<button id="trego_perdorues" class="btn btn-primary">Trego me shume perdorues </button>
