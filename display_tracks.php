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

// Получаем список треков из базы данных
$result = $conn->query("SELECT * FROM tracks ORDER BY  track_id DESC LIMIT 10");

// Проверяем, есть ли треки в базе данных
if($result->num_rows > 0) {
  // Выводим каждый трек
  while($row = $result->fetch_assoc()) {
    echo "<div class='track'>";
    echo "<audio id='music' src='" . $row['Song'] . "'></audio>";
    echo "<img class='track_img' src='pic/albom.png' onclick='togglePlayStop(this.parentNode)'>";
    echo "<div class='play-icon'>▶</div>";
    echo "<div class='stop-icon'>■</div>";
    echo "<div class='track_info'>";
    echo "<div class='track_info_h'>" . $row['NameTrack'] . "</div>";
    echo "<div class='track_info_p'>" . $row['ArtistTrack'] . "</div>";
    echo "</div>";
    echo "<div class='heart' id='heart'>♥</div>";
    echo "<div class='track_time'>" . $row['TimeTrack'] . "</div>";
    echo "</div>";    
  }
} else {
  echo "В чартах пока нет треков.";
}

$conn->close();
?>