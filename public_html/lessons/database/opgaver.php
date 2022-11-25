<?php
// henter init.php
require_once($_SERVER['DOCUMENT_ROOT'] . '/assets/incl/init.php');

// 1. hent title på alle sange sorteret stigende
$sql = "SELECT title
        FROM song 
        ORDER BY title ASC";
$stmt = $db->prepare($sql);
$stmt->execute();

$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

// 2.Hent navn på alle artister
$sql = "SELECT id
        FROM song 
        ORDER BY id DESC";
$stmt = $db->prepare($sql);
$stmt->execute();

$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

// var_dump($result);

// 3.Hent id, titel og created_at
// $keyword = "%" .$_GET['keyword'] ."%";

// $sql = "SELECT id, title, created_at
//         FROM song 
//         ORDER BY title ASC
//         WHERE artist_id = :keyword";
        
// $stmt = $db->prepare($sql);
// $stmt->bindParam(':keyword', $keyword);
// $stmt->execute();

// $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

// var_dump($result);

// 4.Hent artist navn ud fra sang id
$keyword = "%" .$_GET['keyword'] ."%";

$sql = "SELECT navn
        FROM song 
        WHERE navn LIKE :keyword";
        
$stmt = $db->prepare($sql);
$stmt->bindParam(':keyword', $keyword);
$stmt->execute();

$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

  var_dump($result);








// 5. Søg i sang
$keyword = "%" .$_GET['keyword'] ."%";

$sql = "SELECT title, content
        FROM song 
        WHERE title LIKE :keyword";
        
$stmt = $db->prepare($sql);
$stmt->bindParam(':keyword', $keyword);
$stmt->execute();

$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

 var_dump($result);
?>