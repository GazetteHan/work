<?php
session_start();

// Подключение к базе данных
$servername = "localhost";
$username = "ваш_имя_пользователя";
$password = "ваш_пароль";
$dbname = "имя_базы_данных";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Ошибка подключения к базе данных: " . $conn->connect_error);
}

// Получение данных из формы
$username = $_POST['username'];
$password = $_POST['password'];

// Поиск пользователя в базе данных
$sql = "SELECT * FROM users WHERE username = '$username'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();

    // Проверка пароля
    if (password_verify($password, $user['password'])) {
        // Установка данных пользователя в сессию
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = $user['role'];

        echo "Аутентификация успешна.";
    } else {
        echo "Неправильное имя пользователя или пароль.";
    }
} else {
    echo "Неправильное имя пользователя или пароль.";
}

// Закрытие соединения с базой данных
$conn->close();