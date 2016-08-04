<html>
<head>
    <title>Регистрация</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
<h2>Регистрация</h2>
<form action="reg.php" method="post">
    <p>
        <label>Логин:<br></label>
        <input name="login" type="text" required>
    </p>
    <p>
        <label>Пароль:<br></label>
        <input name="password" type="password" required>
    </p>
    <p>
        <label>Email:<br></label>
        <input name="email" type="email" required>
    </p>
    <p>
        <label>Фамилия:<br></label>
        <input name="last_name" type="text" required pattern="/^[a-zA-Zа-яА-Я'][a-zA-Zа-яА-Я-' ]+[a-zA-Zа-яА-Я']?$/u">
    </p>
    <p>
        <label>Имя:<br></label>
        <input name="first_name" type="text" required pattern="/^[a-zA-Zа-яА-Я'][a-zA-Zа-яА-Я-' ]+[a-zA-Zа-яА-Я']?$/u">
    </p>
    <p>
        <label>Возраст:<br></label>
        <input name="age" type="number" min="0" max="99" required>
    </p>

    <p>
        <input type="submit" name="submit" value="Зарегистрироваться">
    </p></form>

    <a href="users.php">Список пользователей</a>
    <a href="maps.php">Карта Нова Пошта</a>
</div>
</body>
</html>