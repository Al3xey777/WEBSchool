<?php
require_once('db.php');

// Логин пользователя, которого нужно удалить
$login_to_delete = "PETUX";

// Используем prepared statement для безопасности
$sql = "DELETE FROM users WHERE login = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $login_to_delete);

if ($stmt->execute()) {
    if ($stmt->affected_rows > 0) {
        echo "Пользователь с логином '$login_to_delete' успешно удален";
    } else {
        echo "Пользователь с логином '$login_to_delete' не найден";
    }
} else {
    echo "Ошибка при удалении пользователя: " . $conn->error;
}

$stmt->close();
$conn->close();
?> 