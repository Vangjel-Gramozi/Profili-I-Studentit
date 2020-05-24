<?php 
session_start();
$id_grupi=$_GET['id_grupi'];
$id_lenda=$_GET['id_lenda'];
include "../includes/connect_db.php" ;
echo $_GET['id_grupi'];
echo $_GET['id_lenda'];
echo $id_grupi;
echo $id_lenda;


$query7="SELECT p.id, p.emer , p.mbiemer,n.pike_projekt,n.pike_laborator, n.pike_kologium, n.pike_seminar, n.pike_provim FROM perdorues p INNER JOIN grupi_student gs ON p.id= gs.id_student INNER JOIN nota n ON n.id_student=p.id WHERE gs.id_grup='$id_grupi'";
$result7=mysqli_query($connection,$query7);
$resultcheck7=mysqli_num_rows($result7);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Regjister</title>
	<link rel="stylesheet" href="./css/regjister.css">
</head>
<body>
	<h1>Grupi</h1>
		<div id="container">
				<div id="rreshti">
					<div id="cell">id studenti</div>
					<div id="cell">emer</div>
					<div id="cell">mbiemer</div>
					<div id="cell">Pike projekti</div>
					<div id="cell">Pike laborator</div>
					<div id="cell">Pike kologium</div>
					<div id="cell">Pike seminar</div>
					<div id="cell">Pike provim</div>
					<div id="cell">Pike totale</div>
					<div id="cell">Mungesa</div>
				</div>
						<?php
		while ($rows7=mysqli_fetch_assoc($result7)) {
			?>
			<div id="rreshti">
				<div id="cell"><?php echo $rows7['id']; ?></div>
				<div id="cell"><?php echo $rows7['emer']; ?></div>
				<div id="cell"><?php echo $rows7['mbiemer']; ?></div>
				<div id="cell"><?php echo $rows7['pike_projekt']; ?></div>
				<div id="cell"><?php echo $rows7['pike_laborator']; ?></div>
				<div id="cell"><?php echo $rows7['pike_kologium']; ?></div>
				<div id="cell"><?php echo $rows7['pike_seminar']; ?></div>
				<div id="cell"><?php echo $rows7['pike_provim']; ?></div>
				<div id="cell"><?php echo $rows7['pike_provim']+$rows7['pike_projekt']+$rows7['pike_laborator']+$rows7['pike_kologium']+$rows7['pike_seminar']; ?></div>

			</div>
				

			
		<?php }?>
		</div>
		<button class="button" id="a" type="button" name="studenti">Edito student</button>
		 <div class="popup">
    	
        <div class="popup_content">
        	
        	<form action="edit_nota1.php" method="post">
        		<img src="./images/close3.png" alt="close" class="close" >
        		<img src="./images/student.jpg" alt="Admin"><br>
        		<input type="hidden" name="id_lenda" value=<?php echo $id_lenda?>>
        		<input type="hidden" name="id_grupi" value=<?php echo $id_grupi?>>
        		ID studenti:<input type="text" name="id_student" required ><br>
        		Pike projekti:<input type="text" name="pike_projekt" ><br>
        		Pike laborator:<input type="text" name="pike_laborator" ><br>
        		Pike kologium:<input type="text" name="pike_kologium" ><br>
        		Pike seminar:<input type="text" name="pike_seminar" ><br>
        		Pike provimi:<input type="text" name="pike_provim" ><br>
        		<button type="submit" name="submit">Submit</button><br>
        	</form>
        </div>	

<script>
	
    document.getElementById("a").addEventListener("click",function(){ 
		document.querySelector(".popup").style.display="flex";
	})
      
	document.querySelector(".close").addEventListener("click",function(){
		document.querySelector(".popup").style.display="none";
	
	})

	
</script>
</body>
</html>