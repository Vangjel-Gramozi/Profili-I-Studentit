<?php 
session_start();
$id_grupi=$_GET['id_grupi'];
$id_lenda=$_GET['id_lenda'];
include "../includes/connect_db.php" ;
if(isset($_SESSION['rol_id'])){
 	if ($_SESSION['rol_id']!=='2') {

 		header("Location: ../log-in.php");
 	}
 }else{
 	
 	header("Location: ../log-in.php");
 }
$query7="SELECT p.id, p.emer , p.mbiemer,n.pike_projekt,n.pike_laborator, n.pike_kologium, n.pike_seminar, n.pike_provim FROM perdorues p INNER JOIN grupi_student gs ON p.id= gs.id_student INNER JOIN nota n ON n.id_student=p.id WHERE gs.id_grup='$id_grupi' AND n.id_lenda = '$id_lenda'";

$result7=mysqli_query($connection,$query7);
$resultcheck7=mysqli_num_rows($result7);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Regjister</title>
	<link rel="stylesheet" href="./css/regjister.css">

<style type="text/css">
	.containe{
	padding-top: 50px;
	background: #1a1a1a;
	opacity: 0.9;
	margin-top: 100px;
	width: 80%;
	margin: 100px 10% 0 10%
}
td{
	margin: 20px;
	padding: 10px;
}
.qwe {
	border: none;
	text-transform: uppercase;
	background: #f12020;
 	opacity: 0.9;
 	padding: 10px;
 	color: white;
 	margin: 50px 45% 50px 45%;
 	border-radius: 5px;
 	text-align: center;
}h4{
	margin-top: 50px;
	width: 100%;
	text-align: center;
	color: black;
}
/*

.wor{
 	padding: 0px 500px 0px 500px;

}
*/
.qwe:hover {
	color: #1a1a1a;
	text-decoration: none;
}

/*@media (min-width: 1200px){
.container {
    max-width: 1800px;
}}*/
</style>

</head>
<body>
		<?php
	include "header.php" ;
	?>
	
	<h4>Lista e studenteve</h4>
		<table class="containe">
			 <tr colspan="9"></tr>
				<tr>
					<td>Id studenti</td>
					<td>Emer</td>
					<td>Mbiemer</td>
					<td>Pike projekti</td>
					<td>Pike laborator</td>
					<td>Pike kologium</td>
					<td>Pike seminar</td>
					<td>Pike provim</td>
					<td>Pike totale</td>
				</tr>
				
						<?php
		while ($rows7=mysqli_fetch_assoc($result7)) {
			?>
			<tr>
				<td><?php echo $rows7['id']; ?></td>
				<td><?php echo $rows7['emer']; ?></td>
				<td><?php echo $rows7['mbiemer']; ?></td>
				<td><?php echo $rows7['pike_projekt']; ?></td>
				<td><?php echo $rows7['pike_laborator']; ?></td>
				<td><?php echo $rows7['pike_kologium']; ?></td>
				<td><?php echo $rows7['pike_seminar']; ?></td>
				<td><?php echo $rows7['pike_provim']; ?></td>
				<td><?php echo $rows7['pike_provim']+$rows7['pike_projekt']+$rows7['pike_laborator']+$rows7['pike_kologium']+$rows7['pike_seminar']; ?></td>

			</tr>
				

			
		<?php }


		?></table>
		<div class="row"><button class="qwe" id="a" type="button" name="studenti">Edito student</button></div>
		
		 <div class="popup">
    	
        <div class="popup_content">
        	
        	<form action="edit_nota1.php" method="post">
        		<img src="./images/close3.png" alt="close" class="close" >
        	
        		<input type="hidden" name="id_lenda" value=<?php echo $id_lenda?>>
        		<input type="hidden" name="id_grupi" value=<?php echo $id_grupi?>>
        		ID studenti:<input type="text" name="id_student" required ><br>
        		Pike projekti:<input type="text" name="pike_projekt" ><br>
        		Pike laborator:<input type="text" name="pike_laborator" ><br>
        		Pike kologium:<input type="text" name="pike_kologium" ><br>
        		Pike seminar:<input type="text" name="pike_seminar" ><br>
        		Pike provimi:<input type="text" name="pike_provim" ><br>
        		Mungesa:<input type="checkbox" name="checkbox"><br>
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
