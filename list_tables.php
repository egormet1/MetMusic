<?php


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "MetMusic";

// Создаем соединение
$connection = new mysqli($servername, $username, $password, $dbname);

// Проверяем соединение
if ($connection->connect_error) {
  die("Ошибка подключения: " . $connection->connect_error);
}

// Получаем список таблиц
$result = $connection->query("SHOW TABLES");
if ($result) {
    while ($row = $result->fetch_array()) {
        echo "<a href='view_table.php?table=" . $row[0] . "'>" . $row[0] . "</a><br>";
    }
}
$connection->close();
?>
