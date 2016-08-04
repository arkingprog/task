<?php
include ('db.php');
$sql = 'select first_name,last_name,email from users';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Users</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
<h2>Список пользователей</h2>
<ul>
    <?php
    foreach ($db->query($sql) as $row) {
    echo '<li>'.$row['first_name'].' '.$row['last_name'].', '.$row['email'];
    }
    ?>
</ul>
</div>
</body>
</html>

