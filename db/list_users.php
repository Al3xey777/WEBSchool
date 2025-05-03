<?php
require_once('db.php');

// Получаем список всех пользователей
$sql = "SELECT id, login, first_name, last_name, middle_name, birth_date, email, registration_date FROM users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h3>Список пользователей:</h3>";
    echo "<table border='1'>";
    echo "<tr>
            <th>ID</th>
            <th>Логин</th>
            <th>Фамилия</th>
            <th>Имя</th>
            <th>Отчество</th>
            <th>Дата рождения</th>
            <th>Email</th>
            <th>Дата регистрации</th>
          </tr>";
    
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["login"] . "</td>";
        echo "<td>" . $row["last_name"] . "</td>";
        echo "<td>" . $row["first_name"] . "</td>";
        echo "<td>" . $row["middle_name"] . "</td>";
        echo "<td>" . $row["birth_date"] . "</td>";
        echo "<td>" . $row["email"] . "</td>";
        echo "<td>" . $row["registration_date"] . "</td>";
        echo "</tr>";
    }
    
    echo "</table>";
} else {
    echo "В базе данных нет пользователей";
}

$conn->close();
?> 