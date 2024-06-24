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
$stmt = $conn->prepare("INSERT INTO tracks (NameTrack, TimeTrack, ArtistTrack, janr_id) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $name, $description, $price, $img);

// Устанавливаем параметры и выполняем
$name = $_POST['NameTrack'];
$description = $_POST['TimeTrack'];
$price = $_POST['ArtistTrack'];
$img = $_POST['janr_id'];

echo "New records created successfully";

$stmt->close();
$conn->close();
?>