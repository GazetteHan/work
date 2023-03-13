<?php

session_start();
include_once "init.php";
//var_dump($_SESSION);
//unset($_SESSION);
$user = new User;

//$anotherUser = new User(13);

echo "<br>";
if ($user->isLoggedIn()) {
    echo "Привет " . $user->data()->username;
    echo '<a href="logout.php">Выйти</a>';
    echo '<br>';
    echo '<a href="update.php">Обновить имя</a>';
} else {
    echo "Не авторизирован!";
    echo '<a href="registration.php">Регистрация</a><br>';
    echo '<a href="login.php">Войти</a>';
}
?>
