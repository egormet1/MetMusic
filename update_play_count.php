<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "MetMusic";

// Создаем соединение
$conn = new mysqli($servername, $username, $password, $dbname);

// Проверяем соединение
if ($conn->connect_error) {
  die("Ошибка подключения: " . $conn->connect_error);
}

// Получаем ID трека из запроса
$trackId = $_POST['trackId'];

// Увеличиваем счетчик прослушиваний
$sql = "UPDATE tracks SET play_count = play_count + 1 WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $trackId);
$stmt->execute();

$stmt->close();
$conn->close();
?>
