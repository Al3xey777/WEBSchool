<?php
session_start();
require_once '../db/db.php';
if (!isset($_SESSION['login'])) {
    header('Location: ../pages/gallery.php');
    exit();
}
if (isset($_FILES['photo']) && isset($_POST['album_id'])) {
    $album_id = intval($_POST['album_id']);
    $user_id = $_SESSION['user_id'];
    $upload_dir = '../uploads/';
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }
    $file_name = time() . '_' . basename($_FILES['photo']['name']);
    $target_file = $upload_dir . $file_name;
    if (move_uploaded_file($_FILES['photo']['tmp_name'], $target_file)) {
        $sql = "INSERT INTO photos (album_id, file_path, uploaded_by) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('isi', $album_id, $file_name, $user_id);
        $stmt->execute();
    }
}
header('Location: ../pages/gallery.php?album=' . $album_id);
exit(); 