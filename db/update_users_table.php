<?php
require_once('db.php');

// Добавляем новые поля в таблицу users
$sql_alter = "ALTER TABLE users 
    ADD first_name VARCHAR(50) NULL AFTER login,
    ADD last_name VARCHAR(50) NULL AFTER first_name,
    ADD middle_name VARCHAR(50) NULL AFTER last_name,
    ADD birth_date DATE NULL AFTER middle_name";

if ($conn->query($sql_alter) === TRUE) {
    echo "Таблица users успешно обновлена с новыми полями";
} else {
    echo "Ошибка обновления таблицы: " . $conn->error;
}

$conn->close();
?> 