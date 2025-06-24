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

// Создаем таблицу альбомов
$sql_albums = "CREATE TABLE IF NOT EXISTS albums (
    id INT(11) NOT NULL AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id)
)";
$conn->query($sql_albums);

// Создаем таблицу фотографий
$sql_photos = "CREATE TABLE IF NOT EXISTS photos (
    id INT(11) NOT NULL AUTO_INCREMENT,
    album_id INT(11) NOT NULL,
    file_path VARCHAR(255) NOT NULL,
    uploaded_by INT(11) NULL,
    uploaded_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id),
    FOREIGN KEY (album_id) REFERENCES albums(id) ON DELETE CASCADE,
    FOREIGN KEY (uploaded_by) REFERENCES users(id) ON DELETE SET NULL
)";
$conn->query($sql_photos);

$conn->close();
?> 