<?php
session_start();

// Проверка, аутентифицирован ли пользователь
if (!isset($_SESSION['user_id'])) {
    header("Location: login.html");
    exit();
}

// Проверка, является ли пользователь администратором
if ($_SESSION['role'] !== 'admin') {
    echo "Доступ запрещен.";
    exit();
}

// Код страницы для администратора
echo "Привет, " . $_SESSION['username'] . "! Вы вошли как администратор.";