<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Обо мне</title>
</head>
<body>
<header>
        <div class="header-content">
            <div class="logo">
                <h1>Учитель начальных классов – Ольга Александровна</h1>
            </div>
            <nav class="main-menu">
                <a href="main.php">Главная</a>
                <a href="aboutme.php" class="active">Обо мне</a>
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
    <section class="about-me">
        <div class="container">
                </br>
            <h2>Обо мне</h2>
            <p>Здравствуйте! Меня зовут Ольга Александровна, я учитель начальных классов с более чем 15-летним опытом работы в сфере образования. Моя главная цель — создать для детей тёплую, дружелюбную атмосферу, в которой каждый ребёнок сможет раскрыть свои способности и полюбить учёбу.</p>
            <h3>Мой подход к обучению</h3>
            <ul>
                <li>Индивидуальный подход к каждому ученику</li>
                <li>Использование современных методик и интерактивных технологий</li>
                <li>Развитие творческих способностей и критического мышления</li>
                <li>Формирование у детей уверенности в себе и самостоятельности</li>
            </ul>
            <h3>Достижения</h3>
            <ul>
                <li>Победитель конкурса «Учитель года» в 2020 году</li>
                <li>Мои ученики регулярно занимают призовые места на олимпиадах и конкурсах</li>
                <li>Организатор школьных мероприятий и творческих проектов</li>
            </ul>
            <h3>О себе</h3>
            <p>Я уверена, что начальная школа — это фундамент для дальнейшего успешного обучения. Стараюсь поддерживать интерес к знаниям, помогать детям раскрывать свои таланты и учить их дружить, уважать друг друга и работать в команде. В свободное время люблю читать, заниматься рукоделием и путешествовать.</p>
        </div>
    </section>
</body>
</html>