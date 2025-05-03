<?php
require_once('db.php');

// Проверяем структуру таблицы
$sql = "DESCRIBE users";
$result = $conn->query($sql);

if ($result === FALSE) {
    echo "Ошибка при получении информации о таблице: " . $conn->error;
} else {
    echo "<h3>Структура таблицы users:</h3>";
    echo "<table border='1'><tr><th>Поле</th><th>Тип</th><th>Null</th><th>Key</th><th>Default</th><th>Extra</th></tr>";
    
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["Field"] . "</td>";
        echo "<td>" . $row["Type"] . "</td>";
        echo "<td>" . $row["Null"] . "</td>";
        echo "<td>" . $row["Key"] . "</td>";
        echo "<td>" . $row["Default"] . "</td>";
        echo "<td>" . $row["Extra"] . "</td>";
        echo "</tr>";
    }
    
    echo "</table>";
}

$conn->close();
?> 