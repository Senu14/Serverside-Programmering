<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/assets/incl/init.php');

$artist_id = $_GET['artist_id'];

$sql = "SELECT song.title, artist.name  
        FROM song
        JOIN artist
        ON song.artist_id = artist_id
        WHERE song.artist_id = :artist_id";
        
$statement = $db->prepare($sql);   // kommer fra init php
$statement->bindParam(':artist_id', $artist_id);
$statement->execute();

$rows = $statement->fetchAll(PDO::FETCH_ASSOC);

var_dump($rows);
?>