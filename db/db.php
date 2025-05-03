<?php
$servername = "localhost";
$username = "root";
$password = "mysql"; // Стандартный пароль для Ampps
$dbname = "registoruser";

try {
    $conn = new mysqli($servername, $username, $password);
    
    // Проверяем, существует ли база данных
    $checkDB = $conn->query("SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = '$dbname'");
    
    if ($checkDB->num_rows == 0) {
        // Создаем базу данных, если она не существует
        $conn->query("CREATE DATABASE IF NOT EXISTS $dbname");
    }
    
    // Выбираем созданную базу данных
    $conn->select_db($dbname);
    
} catch (Exception $e) {
    die("Ошибка подключения к базе данных: " . $e->getMessage());
}
?>
