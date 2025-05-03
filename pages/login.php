<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Вход в систему</title>
</head>
<body>
    <div class="auth-container">
        <h2>Вход в систему</h2>
        
        <?php
        // Вывод сообщений
        if (isset($_GET['success']) && $_GET['success'] == 1) {
            echo '<div class="message success">Регистрация успешно завершена! Теперь вы можете войти.</div>';
        }
        
        if (isset($_GET['error'])) {
            if ($_GET['error'] == 'wrong_password') {
                echo '<div class="message error">Неверный пароль. Попробуйте еще раз.</div>';
            } elseif ($_GET['error'] == 'user_not_found') {
                echo '<div class="message error">Пользователь не найден. <a href="registration.php">Зарегистрироваться?</a></div>';
            }
        }
        ?>
        
        <form action="../php/loginpost.php" method="post">
            <div class="form-group">
                <input type="text" name="login" placeholder="Логин" required>
            </div>
            <div class="form-group">
                <input type="password" name="pass" placeholder="Пароль" required>
            </div>
            <div class="form-actions">
                <button type="submit" class="btn-primary">Вход</button>
            </div>
            <div class="form-links">
                <a href="registration.php">Регистрация</a> | 
                <a href="main.php">На главную</a>
            </div>
        </form>
    </div>
</body>
</html>
