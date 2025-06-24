<?php
session_start();
require_once '../db/db.php';

function getAlbums($conn) {
    $albums = [];
    $sql = "SELECT a.*, COUNT(p.id) as photo_count FROM albums a LEFT JOIN photos p ON a.id = p.album_id GROUP BY a.id ORDER BY a.created_at DESC";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
        $albums[] = $row;
    }
    return $albums;
}

function getPhotos($conn, $album_id) {
    $photos = [];
    $sql = "SELECT p.*, u.first_name, u.last_name FROM photos p LEFT JOIN users u ON p.uploaded_by = u.id WHERE p.album_id = ? ORDER BY p.uploaded_at DESC";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $album_id);
    $stmt->execute();
    $result = $stmt->get_result();
    while ($row = $result->fetch_assoc()) {
        $photos[] = $row;
    }
    return $photos;
}

$show_album = isset($_GET['album']);
$albums = getAlbums($conn);
$photos = [];
if ($show_album) {
    $photos = getPhotos($conn, intval($_GET['album']));
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Галерея</title>
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
                <a href="gallery.php" class="active">Галерея</a>
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
    <section class="gallerey">
        <div class="albumBlock">
            <?php if (!$show_album): ?>
                <h2>Альбомы</h2>
                <button id="showAddAlbumForm" type="button">Добавить альбом</button>
                <form id="addAlbumForm" action="../php/add_album.php" method="post" class="add-album-form" style="display:none; margin-bottom: 20px;">
                    <input type="text" name="album_name" placeholder="Название альбома" required>
                    <textarea name="album_description" placeholder="Описание альбома" required></textarea>
                    <button type="submit">Добавить</button>
                </form>
                <div class="albums-list">
                    <?php foreach ($albums as $album): ?>
                        <div class="album-item">
                            <h3><?= htmlspecialchars($album['name']) ?></h3>
                            <div class="album-desc" style="font-size: 0.95em; color: #555; margin-bottom: 5px;">
                                <?= nl2br(htmlspecialchars($album['description'] ?? '')) ?>
                            </div>
                            <p>Фотографий: <?= $album['photo_count'] ?></p>
                            <a href="?album=<?= $album['id'] ?>">Открыть</a>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php else: ?>
                <a href="gallery.php">← Назад к альбомам</a>
                <h2>Фотографии альбома</h2>
                <div class="photos-list">
                    <?php foreach ($photos as $photo): ?>
                        <div class="photo-item">
                            <img src="../uploads/<?= htmlspecialchars($photo['file_path']) ?>" alt="Фото" style="max-width:200px;">
                            <p>Загрузил: <?= htmlspecialchars($photo['last_name'] . ' ' . $photo['first_name']) ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>
                <?php if(isset($_SESSION['login'])): ?>
                <form action="../php/upload_photo.php" method="post" enctype="multipart/form-data" class="upload-photo-form">
                    <input type="hidden" name="album_id" value="<?= intval($_GET['album']) ?>">
                    <input type="file" name="photo" accept="image/*" required>
                    <button type="submit">Загрузить фото</button>
                </form>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    </section>
</body>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var btn = document.getElementById('showAddAlbumForm');
        var form = document.getElementById('addAlbumForm');
        if(btn && form) {
            btn.addEventListener('click', function() {
                form.style.display = (form.style.display === 'none') ? 'block' : 'none';
            });
        }
    });
</script>
</html>