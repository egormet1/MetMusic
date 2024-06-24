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
$login = $_POST['login'];
$email = $_POST['email'];
$password = $_POST['password']; // В будущем следует использовать password_hash
$confirm_password = $_POST['confirm-password'];

// Проверяем, совпадают ли пароли
if ($password !== $confirm_password) {
  die('Пароли не совпадают');
}

// Проверяем, существует ли уже электронная почта
if ($stmt = $conn->prepare("SELECT email FROM accounts WHERE email = ?")) {
  $stmt->bind_param("s", $email);
  $stmt->execute();
  $stmt->store_result();

  if ($stmt->num_rows > 0) {
    echo "Эта почта уже используется";
  } else {
    // Подготавливаем и выполняем SQL-запрос для добавления данных
    if ($stmt = $conn->prepare("INSERT INTO accounts (login, email, password) VALUES (?, ?, ?)")) {
      $stmt->bind_param("sss", $login, $email, $password);
      $stmt->execute();
      // echo "Регистрация успешна";
      header('Location: http://localhost/MetMusic/main.html');
    }
  }
  $stmt->close();
}

$conn->close();
?>
