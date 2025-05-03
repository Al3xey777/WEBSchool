<?php
require_once('../db/db.php');
session_start();

// Защита от SQL-инъекций - используем подготовленные выражения
$login = trim($_POST['login']);
$pass = $_POST['pass'];

// Проверка на пустые поля
if (empty($login) || empty($pass)) {
    die("Логин и пароль должны быть заполнены");
}

// Используем prepared statement для защиты от SQL-инъекций
$sql = "SELECT * FROM users WHERE login = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $login);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    
    // Проверяем пароль
    if (password_verify($pass, $user['pass'])) {
        // Создаем сессию с расширенными данными
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['login'] = $user['login'];
        $_SESSION['first_name'] = $user['first_name'];
        $_SESSION['last_name'] = $user['last_name'];
        $_SESSION['middle_name'] = $user['middle_name'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['birth_date'] = $user['birth_date'];
        
        // Перенаправляем на главную страницу
        header("Location: ../pages/main.php");
        exit();
    } else {
        header("Location: ../pages/login.php?error=wrong_password");
        exit();
    }
} else {
    header("Location: ../pages/login.php?error=user_not_found");
    exit();
}

$stmt->close();
$conn->close();
?>