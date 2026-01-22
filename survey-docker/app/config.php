<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$host = 'postgres';
$dbname = 'DEVOPS';
$username = 'postgres';
$password = 'uHj>(cy$W&mcu6,RrcxB/[I';
$port = "5432";

try {
    $dsn = "pgsql:host=$host;port=$port;dbname=$dbname";
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    
} catch (PDOException $e) {
    die("ОШИБКА ПОДКЛЮЧЕНИЯ К БАЗЕ ДАННЫХ: " . $e->getMessage());
}
?>