<?php
$host= 'localhost';
$db='attendance_db';
$user='root';
$pass='';
$charset='utf8mb4';

$dsn="mysql:host=$host;dbname=$db;charset=$charset";

try{
    $pdo = new PDO($dsn, $user, $pass);
    //fungsi setAttribute punya 2 parameter untuk tau error dibagian mana
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
} catch(PDOException $error) {
    //echo "<h2 class='text-danger text-center'>Database not found</h2>";
    throw new PDOException($error->getMessage());
}

require_once 'crud.php';
$crud = new crud($pdo);
?>