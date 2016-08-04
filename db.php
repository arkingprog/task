<?php

$dsn = 'pgsql:'
    . 'host=ec2-54-243-199-161.compute-1.amazonaws.com;'
    . 'dbname=d5fcpstur336nu;'
    . 'user=qohbebycdegvas;'
    . 'port=5432;'
    . 'sslmode=require;'
    . 'password=4Kgkd9mTCYGpMSjsgQqhK3BsSB';

try{
$db=new PDO($dsn);
} catch (PDOException $e) {
    die('Подключение не удалось: ' . $e->getMessage());
}
