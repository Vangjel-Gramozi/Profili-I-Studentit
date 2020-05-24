<?php include '../includes/header.php' ?>
<?php include '../includes/navbar.php' ?>

<script type="text/javascript">
		function showKuotat(){
			document.getElementById('kuotat_div').style.display = "block";
		}
		function hideKuotat(){
			document.getElementById('kuotat_div').style.display = "none";
			document.getElementById('kuotat').value = "";
		}
	$(document).ready(function() {
				$("#dega").load("../includes/load_deget.php");
				$("form").submit(function(event){
					event.preventDefault();
					var emer = $("#emer").val();
					var kredite = $("#kredite").val();
					var ore_totale = $("#ore_totale").val();
					var me_zgjedhje = $('input[name="me_zgjedhje"]:checked').val();
					var viti_i_lendes = $("#viti_i_lendes").val();
					var kuotat = $("#kuotat").val();
					var dega = $("#dega").val();
					var submit = $("#submit").val();
					$("#message").load("valido_lende.php", {
						emer: emer.trim(),
						kredite: kredite,
						ore_totale: ore_totale,
						viti_i_lendes: viti_i_lendes,
						me_zgjedhje: me_zgjedhje,
						kuotat: kuotat,
						dega: dega,
						submit: submit
					});
					setTimeout(function() {
					    $("#message").text('');
					}, 3500); 
				});
			});
		</script>
	<link rel="stylesheet" type="text/css" href="../includes/krijo.css">
		
	</head>
	<body>
		<div class="continer row justify-content-center">	
			<div class="col-sm-6">
				<h1 class="text-center">Krijo Lende</h1>
				<form action="valido_lende.php" method="POST" class="col-lg-6 offset-lg-3" id="krijo_lende">
					<div class="form-group">
						<label for="emer">Emri i Lendes</label>
						<input type="text" name="emer" class="form-control" id="emer"  >
					</div>
					<div class="form-group">
						<label for="kredite">Kreditet</label>
						<input type="number" name="kredite" class="form-control" id="kredite" min="1">
					</div>
					<div class="form-group">
						<label for="ore_totale">Ore Totale</label>
						<input type="number" name="ore_totale" class="form-control" id="ore_totale" min="10">
					</div>
					<div class="form-group">
						<label for="viti_i_lendes">Viti i Lendes</label>
						<input type="number" name="viti_i_lendes" class="form-control" id="viti_i_lendes" min="1" max="3" step="1" >
					</div>
					<div class="form-group">
						<span>Lende me Zgjedhje:</span>
						<input type="radio" name="me_zgjedhje" value="t" onclick="showKuotat()">
						<label for="mashkull">Po</label>
						<input type="radio" name="me_zgjedhje" value="f" checked onclick="hideKuotat()">
						<label for="femer">Jo</label>
					</div>
					<div class="form-group" style="display: none" id="kuotat_div">
						<label for="viti_i_lendes">Kuotat</label>
						<input type="number" name="kuotat" class="form-control" id="kuotat" min="1" step="1" >
					</div>
					<div class="form-group">
						<label for="dega">Dega</label>
						<select name="dega" id="dega">
						</select>
					</div>
					<input type="submit" name="submit" class="btn btn-primary" value="Krijo lende" id="submit">
				</form>
				<p id="message"></p>
			</div>
		</div>

			<?php include '../includes/footer.php' ?>
