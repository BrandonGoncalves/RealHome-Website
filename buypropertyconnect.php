<?php 
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'realhome_buyrentproperties';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    doe(json_encode(['error'=> 'Database Connectiom Failed: ' . $e->getMessage()]));
}
?>