<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Регистрация</title>
</head>
<body>
    <div class="auth-container">
        <h2>Регистрация нового пользователя</h2>
        <form action="../php/registrationpost.php" method="post">
            <div class="form-group">
                <input type="text" name="login" placeholder="Логин" required>
            </div>
            <div class="form-group">
                <input type="text" name="last_name" placeholder="Фамилия" required>
            </div>
            <div class="form-group">
                <input type="text" name="first_name" placeholder="Имя" required>
            </div>
            <div class="form-group">
                <input type="text" name="middle_name" placeholder="Отчество">
            </div>
            <div class="form-group">
                <label for="birth_date">Дата рождения:</label>
                <input type="date" name="birth_date" id="birth_date" required>
            </div>
            <div class="form-group">
                <input type="email" name="email" placeholder="Email" required>
            </div>
            <div class="form-group">
                <input type="password" name="pass" placeholder="Пароль" required>
            </div>
            <div class="form-group">
                <input type="password" name="passrepeat" placeholder="Повторите пароль" required>
            </div>
            <div class="form-actions">
                <button type="submit" class="btn-primary">Регистрация</button>
            </div>
            <div class="form-links">
                <a href="login.php">Уже есть аккаунт</a> | 
                <a href="main.php">На главную</a>
            </div>
        </form>
    </div>
</body>
</html>