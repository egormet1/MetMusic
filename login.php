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

// Получаем данные из формы
$email = $_POST['email'];
$password = $_POST['password'];

// Подготавливаем и выполняем SQL-запрос для проверки данных
$stmt = $conn->prepare("SELECT account_id, login, role FROM accounts WHERE email = ? AND password = ?");
$stmt->bind_param("ss", $email, $password);
$stmt->execute();
$result = $stmt->get_result();

if ($row = $result->fetch_assoc()) {
  // Сохраняем данные пользователя в сессии
  $_SESSION['user_id'] = $row['account_id'];
  $_SESSION['user_name'] = $row['login'];
  $_SESSION['user_role'] = $row['role'];
  
  header('Location: http://localhost/MetMusic/lichcab.php');
} else {
  echo "Неверный логин или пароль";
}

$stmt->close();
$conn->close();
?>
