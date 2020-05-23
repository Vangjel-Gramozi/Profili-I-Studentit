<?php 
session_start();
include "../includes/connect_db.php" ;
$id=$_SESSION['id'];
$query4="SELECT g.id_grupi, d.emri, g.viti, g.emer_grupi FROM dega d INNER JOIN grupi g ON d.id_dega = g.id_dega INNER JOIN jep_mesim_grup j ON j.id_grup = g.id_grupi INNER JOIN perdorues p ON j.id_pedagog=p.id WHERE p.id=$id";
$result4=mysqli_query($connection,$query4);
$resultcheck4=mysqli_num_rows($result4);
?>