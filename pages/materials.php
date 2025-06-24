<?php
session_start();
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <title>Материалы</title>
</head>
<body>
<header>
        <div class="header-content">
            <div class="logo">
                <h1>Учитель начальных классов – Ольга Александровна</h1>
            </div>
            <nav class="main-menu">
                <a href="main.php">Главная</a>
                <a href="aboutme.php">Обо мне</a>
                <a href="myclasses.php">Мои классы</a>
                <a href="materials.php" class="active">Материалы</a>
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

    <section class="banner">
        <div class="banner-content">
            <h2>Учебные материалы</h2>
            <p>Здесь вы найдете все необходимые материалы для обучения</p>
        </div>
    </section>

    <section class="welcome">
        <div class="welcome-content">
            <div class="welcome-text">
                <h3>Методические материалы и расписание</h3>
                <p>На этой странице собраны все необходимые материалы для обучения, расписание уроков и домашние задания.</p>
            </div>
        </div>
    </section>
    <section class="quick-links">
        <div class="quick-links-content">
            <a href="metmaterials.php" class="quick-link">
                <i class="fas fa-book"></i>
                <span>Методические материалы</span>
            </a>
            <a href="../pages/schedule.php" class="quick-link">
                <i class="fas fa-calendar-alt"></i>
                <span>Расписание уроков</span>
            </a>
            <a href="homework.php" class="quick-link">
                <i class="fas fa-tasks"></i>
                <span>Домашнее задание</span>
            </a>
            <a href="academic-perf.php" class="quick-link">
                <i class="fas fa-chart-line"></i>
                <span>Журнал успеваемости</span>
            </a>
        </div>
    </section>
    <footer>
        <div class="footer-content">
            <div class="copyright">
                © 2024 Ирина Петрова
            </div>
            <div class="contacts">
                <a href="mailto:teacher@example.com"><i class="fas fa-envelope"></i></a>
                <a href="tel:+79001234567"><i class="fas fa-phone"></i></a>
                <a href="#"><i class="fab fa-vk"></i></a>
                <a href="#"><i class="fab fa-telegram"></i></a>
            </div>
            <div class="school-link">
                <a href="#">Официальный сайт школы</a>
            </div>
        </div>
    </footer>
</body>
</html>