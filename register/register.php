<?php
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
$role = 'user'; // Установка роли по умолчанию

// Проверка, существует ли пользователь с таким же именем
$sql = "SELECT id FROM users WHERE username = '$username'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    echo "Пользователь с таким именем уже существует.";
} else {
    // Хеширование пароля
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Вставка нового пользователя в базу данных
    $sql = "INSERT INTO users (username, password, role) VALUES ('$username', '$hashedPassword', '$role')";
    if ($conn->query($sql) === TRUE) {
        echo "Регистрация успешна.";
    } else {
        echo "Ошибка регистрации: " . $conn->error;
    }
}

// Закрытие соединения с базой данных
$conn->close();