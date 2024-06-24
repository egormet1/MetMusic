<?php
session_start();

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


// Проверяем, была ли отправлена форма
if($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Извлекаем информацию из формы
  $nameTrack = $_POST['nameTrack'];
  $artistTrack = $_POST['artistTrack'];
  $timeTrack = $_POST['timeTrack'];
  $janr = $_POST['janr'];
  
  // Обрабатываем загруженный файл
  $songFile = $_FILES['songFile'];
  $songPath = 'muz/' . basename($songFile['name']);
  if(move_uploaded_file($songFile['tmp_name'], $songPath)) {
    // Файл успешно загружен, добавляем информацию о треке в базу данных
    $stmt = $conn->prepare("INSERT INTO tracks (NameTrack, ArtistTrack, Song, TimeTrack, janr_id) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $nameTrack, $artistTrack, $songPath, $timeTrack, $janr);
    $stmt->execute();
    
    // Проверяем, успешно ли добавлена запись
    if($stmt->affected_rows > 0) {
      echo "Трек успешно добавлен!";
    } else {
      echo "Ошибка при добавлении трека.";
    }
    
    $stmt->close();
  } else {
    // Ошибка при загрузке файла
    echo "Ошибка при загрузке файла.";
  }
  
  $conn->close();
}
?>
