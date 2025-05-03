<?php
require_once('db.php');

// Изменяем размер колонки pass до 255 символов
$sql = "ALTER TABLE users MODIFY COLUMN pass VARCHAR(255) NOT NULL";

if ($conn->query($sql) === TRUE) {
    echo "Колонка 'pass' успешно изменена";
} else {
    echo "Ошибка изменения колонки: " . $conn->error;
}

$conn->close();
?> 