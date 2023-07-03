function registerUser() {
    var password = document.getElementById('password').value;

    if (password.length < 8) {
        alert('Пароль должен содержать минимум 8 символов!');
        return false;
    }

    return false;
}
