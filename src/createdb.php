<?php

$host = 'mysqldb';
$dbname = 'robofin'; //CREATE DATABASE в файле создания
$user = 'root';
$password = 'password';
try {
    $dbh = new PDO("mysql:host=$host", $user, $password, array(PDO::MYSQL_ATTR_LOCAL_INFILE => true),);
    $sql = file_get_contents($_SERVER['DOCUMENT_ROOT'].'/data/1-init.sql');
    $dbh->exec($sql); //Создаем БД и таблицы
  	unset($sql);
    echo 'Таблицы созданы';
    $sql = file_get_contents($_SERVER['DOCUMENT_ROOT'].'/data/2-pull-data.sql');
    $dbh->exec($sql); //Заполняем данным
  	unset($sql);
    echo 'Данные записаны';
} catch(Exception $e) {
    echo $e;
}