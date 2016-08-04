<?php
include ('db.php');
$sql='create table users(
id  SERIAL NOT NULL  PRIMARY KEY,
login VARCHAR (50),
email VARCHAR (50),
last_name VARCHAR (50),
first_name VARCHAR (50),
age int,
password VARCHAR (100)
)';
$db->exec($sql);