<?php
include ('db.php');
$sql='
drop table users;
create table users(
id  SERIAL NOT NULL  PRIMARY KEY,
login VARCHAR (50) UNIQUE NOT NULL, 
email VARCHAR (50) UNIQUE NOT NULL,
last_name VARCHAR (50) NOT NULL,
first_name VARCHAR (50) NOT NULL,
age int NOT NULL,
password VARCHAR (100) NOT NULL
)';
$db->exec($sql);