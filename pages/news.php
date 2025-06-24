<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Новости</title>
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
                <a href="news.php" class="active">Новости</a>
                <a href="contacts.php">Контакты</a>
                <?php if(isset($_SESSION['login'])): ?>
                    <a href="../php/logout.php" class="login-button">Выход (<span class="user-name"><?= $_SESSION['first_name'] ?></span>)</a>
                <?php else: ?>
                    <a href="login.php" class="login-button">Вход</a>
                <?php endif; ?>
            </nav>
        </div>
    </header>
    
    <main class="news-container">
        <section class="latest-news">
            <h2>Последние новости</h2>
            <div class="news-grid">
                <?php
                require_once '../php/db.php';
                $sql = "SELECT * FROM news ORDER BY date DESC LIMIT 3";
                $result = $conn->query($sql);
                
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo '<div class="news-card">';
                        echo '<img src="' . $row['image'] . '" alt="' . $row['title'] . '">';
                        echo '<h3>' . $row['title'] . '</h3>';
                        echo '<p class="news-date">' . date('d.m.Y', strtotime($row['date'])) . '</p>';
                        echo '<p class="news-preview">' . substr($row['content'], 0, 150) . '...</p>';
                        echo '<a href="news-detail.php?id=' . $row['id'] . '" class="read-more">Читать далее</a>';
                        echo '</div>';
                    }
                }
                ?>
            </div>
        </section>

        <section class="all-news">
            <h2>Все новости</h2>
            <div class="news-grid">
                <?php
                $sql = "SELECT * FROM news ORDER BY date DESC";
                $result = $conn->query($sql);
                
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo '<div class="news-card">';
                        echo '<img src="' . $row['image'] . '" alt="' . $row['title'] . '">';
                        echo '<h3>' . $row['title'] . '</h3>';
                        echo '<p class="news-date">' . date('d.m.Y', strtotime($row['date'])) . '</p>';
                        echo '<p class="news-preview">' . substr($row['content'], 0, 150) . '...</p>';
                        echo '<a href="news-detail.php?id=' . $row['id'] . '" class="read-more">Читать далее</a>';
                        echo '</div>';
                    }
                }
                ?>
            </div>
        </section>
    </main>
    
</body>
</html>