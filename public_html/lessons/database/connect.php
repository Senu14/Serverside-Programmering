<?php

// Exsamples of tilslutning to database with PDO
$dns = "mysql:host=localhost;dbname=techollage";
$username ='root';
$password ='password';

try{
     $db = new PDO($dns,$username);
}catch(PDOException $err){
     echo "Fejl i tilslutning af database:" .$err;
}
// I commented out coz it dose not work with select


     
?>


