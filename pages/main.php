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
    <title>Сайт учителя начальных классов</title>
</head>
<body>
    <header>
        <div class="header-content">
            <div class="logo">
                <h1>Учитель начальных классов – Ирина Петрова</h1>
            </div>
            <nav class="main-menu">
                <a href="main.php" class="active">Главная</a>
                <a href="aboutme.php">Обо мне</a>
                <a href="myclasses.php">Мои классы</a>
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

    <section class="banner">
        <div class="banner-content">
            <?php if(isset($_SESSION['login'])): ?>
                <h2>Добро пожаловать, <span class="user-name"><?= $_SESSION['first_name'] ?></span>!</h2>
                <p>Я, Ирина Петрова, помогаю детям полюбить учёбу и раскрыть их потенциал.</p>
            <?php else: ?>
                <h2>Добро пожаловать на мой сайт!</h2>
                <p>Я, Ирина Петрова, помогаю детям полюбить учёбу и раскрыть их потенциал.</p>
            <?php endif; ?>
        </div>
    </section>

    <section class="welcome">
        <div class="welcome-content">
            <div class="welcome-text">
                <?php if(isset($_SESSION['login'])): ?>
                    <h3>Здравствуйте, <span class="user-name"><?= $_SESSION['last_name'] . ' ' . $_SESSION['first_name'] . ' ' . ($_SESSION['middle_name'] ? $_SESSION['middle_name'] : '') ?></span>!</h3>
                    <p>Мы рады видеть Вас на нашем сайте. Здесь вы найдёте полезные материалы для детей и родителей, расписание занятий и последние новости класса.</p>
                <?php else: ?>
                    <h3>Рада приветствовать вас на своей странице!</h3>
                    <p>Здесь вы найдёте полезные материалы для детей и родителей, расписание занятий и последние новости класса.</p>
                <?php endif; ?>
            </div>
            <div class="teacher-photo">
                <img src="../images/teacher.jpg" alt="Фото учителя">
            </div>
        </div>
    </section>

    <section class="quick-links">
        <div class="quick-links-content">
            <a href="#" class="quick-link">
                <i class="fas fa-book"></i>
                <span>Методические материалы</span>
            </a>
            <a href="#" class="quick-link">
                <i class="fas fa-calendar-alt"></i>
                <span>Расписание уроков</span>
            </a>
            <a href="#" class="quick-link">
                <i class="fas fa-bullhorn"></i>
                <span>Последние объявления</span>
            </a>
            <a href="#" class="quick-link">
                <i class="fas fa-envelope"></i>
                <span>Связаться со мной</span>
            </a>
        </div>
    </section>

    <section class="news">
        <h3>Последние новости</h3>
        <div class="news-content">
            <?php if(isset($_SESSION['login'])): ?>
            <div class="user-info-block">
                <h4>Ваша информация:</h4>
                <ul class="user-info-list">
                    <li><strong>Имя:</strong> <?= $_SESSION['first_name'] ?></li>
                    <li><strong>Фамилия:</strong> <?= $_SESSION['last_name'] ?></li>
                    <?php if(!empty($_SESSION['middle_name'])): ?>
                    <li><strong>Отчество:</strong> <?= $_SESSION['middle_name'] ?></li>
                    <?php endif; ?>
                    <li><strong>Дата рождения:</strong> <?= date('d.m.Y', strtotime($_SESSION['birth_date'])) ?></li>
                    <li><strong>Email:</strong> <?= $_SESSION['email'] ?></li>
                </ul>
            </div>
            <?php endif; ?>
            <div class="news-item">
                <span class="news-date">15.10.2024</span>
                <p>Родительское собрание в 18:00.</p>
            </div>
            <div class="news-item">
                <span class="news-date">10.10.2024</span>
                <p>Конкурс осенних поделок. Фото в галерее!</p>
            </div>
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