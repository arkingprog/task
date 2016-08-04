<?php
if (isset($_POST['login'])) {
    $login = $_POST['login'];
}
if (isset($_POST['password'])) {
    $password = $_POST['password'];
}
if (isset($_POST['email'])) {
    $email = $_POST['email'];
}
if (isset($_POST['last_name'])) {
    $last_name = $_POST['last_name'];
}
if (isset($_POST['first_name'])) {
    $first_name = $_POST['first_name'];
}
if (isset($_POST['age'])) {
    $age = $_POST['age'];
}
$error_mas = [];
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    array_push($error_mas, "Email не валидный");
}
if (!filter_var($age, FILTER_VALIDATE_INT, array(
    'options' => array(
        'min_range' => 0,
        'max_range' => 99,
    )))
) {
    array_push($error_mas, "Возраст должен быть числом в диапазоне 0-99");
}
if (!filter_var($last_name, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^[a-zA-Zа-яА-Я'][a-zA-Zа-яА-Я-' ]+[a-zA-Zа-яА-Я']?$/u")))) {
    array_push($error_mas, "Фамилия не коректна");
};
if (!filter_var($first_name, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^[a-zA-Zа-яА-Я'][a-zA-Zа-яА-Я-' ]+[a-zA-Zа-яА-Я']?$/u")))) {
    array_push($error_mas, "Имя не коректно");
};
if (count($error_mas) > 0) {
    $err_msg="";
    foreach ($error_mas as $err) {
        $err_msg.=$err.'<br>';
    }
    exit ($err_msg);

}
if (empty($login) or empty($password) or empty($last_name) or empty($first_name) or empty($age) or empty($email))
{
    exit ("Вы ввели не всю информацию, вернитесь назад и заполните все поля!");
}

$login = stripslashes($login);
$login = htmlspecialchars($login);
$password = stripslashes($password);
$password = htmlspecialchars($password);
$login = trim($login);
$password = trim($password);
include("db.php");
try {
    $sql = "INSERT INTO users (login,email,last_name,first_name,age,password)
    VALUES (:login,:email,:last_name, :first_name,:age,:password)";
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $req = $db->prepare($sql);
    $req->execute(array('login' => $login, 'email' => $email, 'last_name' => $last_name, 'first_name' => $first_name, 'age' => $age, 'password' => $password));
    echo $password;

} catch (PDOException $e) {
    echo($e->getMessage());
}
header("Location: ./index.php");

// если такого нет, то сохраняем данные
//$result2 = mysql_query("INSERT INTO users (login,password) VALUES('$login','$password')");
// Проверяем, есть ли ошибки
//if ($result2 == 'TRUE') {
//    echo "Вы успешно зарегистрированы! Теперь вы можете зайти на сайт. <a href='index . php'>Главная страница</a>";
//} else {
//    echo "Ошибка! Вы не зарегистрированы.";
//}
?>