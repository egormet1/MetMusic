<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "MetMusic";

// Создаем соединение
$conn = new mysqli($servername, $username, $password, $dbname);

// Проверяем соединение
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Подготавливаем и привязываем параметры
$stmt = $conn->prepare("INSERT INTO Janr (NameJanr) VALUES (?)");
$stmt->bind_param("s", $name );

// Устанавливаем параметры и выполняем
$name = $_POST['NameJanr'];

echo "New records created successfully";

$stmt->close();
$conn->close();
?>