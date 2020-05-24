$(document).ready(function () {
	// var id_grupi = <?php $_GET['id_grupi'];?>;
	// var id_lenda = <?php $_GET['id_lenda'];?>;

	$("#trego_perdorues").click(function () {
		// $.ajax({
		// 	url : "regjister.inc.php",
		// 	method : "GET",
		// 	data : {
		// 		id : $_GET['id_grupi'],
		// 		id_lenda : $_GET['id_lenda']
		// 	},
		// 	dataType : 'JSON',
		// 	success : function(data,status){
		// 		console.log(data);
		// 		console.log(status);
		// 	}
		// });
		$.get("regjister.inc.php", function(data){
						console.log(data);
					},"json");
	})
});