<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Новость</title>
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

    <main class="news-detail-container">
        <?php
        require_once '../php/db.php';
        
        if(isset($_GET['id'])) {
            $id = $_GET['id'];
            $sql = "SELECT * FROM news WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $result = $stmt->get_result();
            
            if($row = $result->fetch_assoc()) {
                echo '<article class="news-detail">';
                echo '<h1>' . $row['title'] . '</h1>';
                echo '<p class="news-date">' . date('d.m.Y', strtotime($row['date'])) . '</p>';
                echo '<img src="' . $row['image'] . '" alt="' . $row['title'] . '">';
                echo '<div class="news-content">' . $row['content'] . '</div>';
                echo '</article>';
            } else {
                echo '<p>Новость не найдена</p>';
            }
        } else {
            echo '<p>Новость не найдена</p>';
        }
        ?>
    </main>
</body>
</html> 