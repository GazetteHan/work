<?php

require_once "init.php";

//var_dump($_SESSION);
//unset($_SESSION);
$user = new User();
//$anotherUser = new User(13);

echo "<br>";
if ($user->isLoggedIn()) {
    echo "Привет " . $user->data()->username;
    echo '<a href="logout.php">Выйти</a>';
} else {
    echo "Не авторизирован!";
    echo '<a href="register.php">Регистрация</a><br>';
    echo '<a href="login.php">Войти
</a>';
}
?>