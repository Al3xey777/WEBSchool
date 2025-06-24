<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/stylecontacts.css">
    <title>Контакты</title>
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
                <a href="materials.php">Материалы</a>
                <a href="gallery.php">Галерея</a>
                <a href="news.php">Новости</a>
                <a href="contacts.php" class="active">Контакты</a>
                <?php if(isset($_SESSION['login'])): ?>
                    <a href="../php/logout.php" class="login-button">Выход (<span class="user-name"><?= $_SESSION['first_name'] ?></span>)</a>
                <?php else: ?>
                    <a href="login.php" class="login-button">Вход</a>
                <?php endif; ?>
            </nav>
        </div>
    </header>
    <div class="contacts-container">
        <section class="contacts-info">
            <h2>Контактная информация</h2>
            <div class="contacts-list">
                <div class="contact-item">
                    <span class="contact-icon">📞</span>
                    <span class="contact-label">Телефон:</span>
                    <a href="tel:+79878801637">+7-987-880-16-37</a>
                </div>
                <div class="contact-item">
                    <span class="contact-icon">✉️</span>
                    <span class="contact-label">Email:</span>
                    <a href="mailto:oamin77@rambler.ru">oamin77@rambler.ru</a>
                </div>
            </div>
            <h3>Социальные сети</h3>
            <div class="contacts-social-block">
                <a class="social-link tg" href="https://t.me/MiniOMini" target="_blank">Телеграм</a>
                <a class="social-link vk" href="https://vk.com/id307976072" target="_blank">ВКонтакте</a>
            </div>
        </section>
    </div>
</body>
</html>