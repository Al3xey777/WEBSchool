<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Мои классы</title>
</head>
<body>
<header>
    <div class="header-content">
        <div class="logo">
            <h1>Учитель начальных классов – Ирина Петрова</h1>
        </div>
        <nav class="main-menu">
            <a href="main.php">Главная</a>
            <a href="aboutme.php">Обо мне</a>
            <a href="myclasses.php" class="active">Мои классы</a>
            <a href="materials.php">Материалы</a>
            <a href="gallery.php">Галерея</a>
            <a href="news.php">Новости</a>
            <a href="contacts.php">Контакты</a>
            <?php if(isset($_SESSION['login'])): ?>
                <a href="../php/logout.php" class="login-button">Выход (<span class="user-name"><?= $_SESSION['first_name'] ?></span>)</a>
            <?php else: ?>
                <a href="login.php" class="login-button">Вход</a>
            <?php endif; ?>
        </nav>
    </div>
</header>

<section class="classes-banner">
    <h2>Классы</h2>
    <p>Здесь вы найдете классы в которых я преподавала</p>
</section>

<section class="class-card-section">
    <div class="class-card">
        <div class="class-card-left">
            <div class="class-year">2Б</div>
            <div class="class-years">2024</div>
        </div>
        <div class="class-card-center">
            <div class="class-students">
                <ul>
                    <li>Георгий Рубчинский</li>
                    <li>Данил Ибрагимов</li>
                    <li>Сергей Штром</li>
                    <li>Кирилл Кириллов</li>
                </ul>
            </div>
        </div>
        <div class="class-card-right">
            <div class="class-photo-placeholder">
                <span>Фотография класса</span>
            </div>
        </div>
    </div>
</section>

</body>
</html>