<?php
require_once('db.php');

// Удаляем существующую таблицу
$sql_drop = "DROP TABLE IF EXISTS users";
if ($conn->query($sql_drop) === TRUE) {
    echo "Таблица успешно удалена. ";
} else {
    echo "Ошибка удаления таблицы: " . $conn->error . "<br>";
}

// Создаем таблицу заново с правильной структурой
$sql_create = "CREATE TABLE users (
    id INT NOT NULL AUTO_INCREMENT,
    login VARCHAR(50) NOT NULL UNIQUE,
    pass VARCHAR(255) NOT NULL,
    email VARCHAR(100) NOT NULL,
    registration_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id)
) ENGINE=InnoDB";

if ($conn->query($sql_create) === TRUE) {
    echo "Таблица успешно создана заново.";
} else {
    echo "Ошибка создания таблицы: " . $conn->error;
}

$conn->close();
?> 