<?php
//development connection
$host= 'localhost';
$db='attendance_db';
$user='root';
$pass='';
$charset='utf8mb4';

//remote database connection
// $host= 'remotemysql.com';
// $db='FOvcRYQjWz';
// $user='FOvcRYQjWz';
// $pass='Q3Ys0zn733';
// $charset='utf8mb4';

$dsn="mysql:host=$host;dbname=$db;charset=$charset";

try{
    $pdo = new PDO($dsn, $user, $pass);
    //fungsi setAttribute punya 2 parameter untuk tau error dibagian mana
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
} catch(PDOException $error) {
    throw new PDOException($error->getMessage());
}

require_once 'crud.php';
require_once 'user.php';
$crud = new crud($pdo);
$user = new user($pdo);

$user->insertUser("admin", "password");
?>