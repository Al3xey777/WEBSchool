<?php
require_once('../db/db.php');
session_start();

// Защита от SQL-инъекций - используем подготовленные выражения
$login = trim($_POST['login']);
$first_name = trim($_POST['first_name']);
$last_name = trim($_POST['last_name']);
$middle_name = isset($_POST['middle_name']) ? trim($_POST['middle_name']) : null;
$birth_date = $_POST['birth_date'];
$email = trim($_POST['email']);
$pass = $_POST['pass'];
$passrepeat = $_POST['passrepeat'];

// Проверка на пустые обязательные поля
if (empty($login) || empty($pass) || empty($passrepeat) || empty($email) || 
    empty($first_name) || empty($last_name) || empty($birth_date)) {
    die("Все обязательные поля должны быть заполнены");
}

// Проверка совпадения паролей
if ($pass != $passrepeat) {
    die("Пароли не совпадают");
}

// Проверяем, существует ли пользователь с таким логином
$check_sql = "SELECT * FROM users WHERE login = ?";
$check_stmt = $conn->prepare($check_sql);
$check_stmt->bind_param("s", $login);
$check_stmt->execute();
$result = $check_stmt->get_result();

if ($result->num_rows > 0) {
    die("Пользователь с таким логином уже существует");
}

// Хешируем пароль для безопасности
$hashed_password = password_hash($pass, PASSWORD_DEFAULT);

// Используем prepared statement для безопасной вставки
$sql = "INSERT INTO users (login, first_name, last_name, middle_name, birth_date, email, pass) 
        VALUES (?, ?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssssss", $login, $first_name, $last_name, $middle_name, $birth_date, $email, $hashed_password);

if ($stmt->execute()) {
    // Перенаправление на страницу логина
    header("Location: ../pages/login.php?success=1");
    exit();
} else {
    echo "Ошибка: " . $conn->error;
}

$stmt->close();
$conn->close();
?>

