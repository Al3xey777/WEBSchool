<?php
session_start();
require_once '../db/db.php';
if (!isset($_SESSION['login'])) {
    header('Location: ../pages/gallery.php');
    exit();
}
if (isset($_POST['album_name']) && trim($_POST['album_name']) !== '') {
    $name = $conn->real_escape_string($_POST['album_name']);
    $description = isset($_POST['album_description']) ? $conn->real_escape_string($_POST['album_description']) : '';
    $sql = "INSERT INTO albums (name, description) VALUES ('$name', '$description')";
    $conn->query($sql);
}
header('Location: ../pages/gallery.php');
exit(); 