<?php
require_once('db.php');

// Создаем таблицу пользователей, если она не существует
$sql = "CREATE TABLE IF NOT EXISTS users (
    id INT(11) NOT NULL AUTO_INCREMENT,
    login VARCHAR(50) NOT NULL UNIQUE,
    pass VARCHAR(255) NOT NULL,
    email VARCHAR(100) NOT NULL,
    registration_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id)
)";

if ($conn->query($sql) === TRUE) {
    echo "Таблица 'users' успешно создана или уже существует";
} else {
    echo "Ошибка создания таблицы: " . $conn->error;
}

$conn->close();
?> 