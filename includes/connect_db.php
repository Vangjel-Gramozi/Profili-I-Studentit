<?php 
    $connection = mysqli_connect('localhost', 'root', '', 'profili-i-studentit');
    if(!$connection ) {
        die ("Database connection failed");
    }
?>