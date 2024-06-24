<?php
session_start();
// Соединение с базой данных
$db = new mysqli('localhost', 'root', '', 'MetMusic');

// Обработка запроса на регистрацию
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])) {
    $login = $db->real_escape_string($_POST['login']);
    $email = $db->real_escape_string($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Проверка, существует ли уже пользователь с таким логином или email
    $checkUser = $db->query("SELECT * FROM accounts WHERE login = '$login' OR email = '$email'");
    if ($checkUser->num_rows > 0) {
        echo 'Пользователь с таким логином или email уже существует';
    } else {
        // Добавление нового пользователя в базу данных
        $query = "INSERT INTO accounts (login, email, password) VALUES ('$login', '$email', '$password')";
        if ($db->query($query)) {
            echo 'Пользователь успешно зарегистрирован';
        } else {
            echo 'Ошибка при регистрации';
        }
    }
}

// Обработка запроса на авторизацию
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
    $email = $db->real_escape_string($_POST['email']);
    $password = $_POST['password'];

    // Поиск пользователя по email
    $query = "SELECT * FROM accounts WHERE email = '$email'";
    $result = $db->query($query);
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        // Проверка пароля
        if (password_verify($password, $user['password'])) {
            echo 'Доступ предоставлен';
            // Здесь должен быть код для установки сессии или cookie
        } else {
            echo 'Неверный пароль';
        }
    } else {
        echo 'Пользователь не найден';
    }
}

// Закрытие соединения с базой данных
$db->close();
?>