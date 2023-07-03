<?php
session_start();

// Проверка, аутентифицирован ли пользователь
if (!isset($_SESSION['user_id'])) {
    header("Location: login.html");
    exit();
}