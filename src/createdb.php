<?php

$host = 'mysqldb';
$dbname = 'robofin'; //CREATE DATABASE в файле создания
$user = 'root';
$password = 'password';
try {
    $dbh = new PDO("mysql:host=$host", $user, $password);
    $sql = file_get_contents($_SERVER['DOCUMENT_ROOT'].'/data/1-init.sql');
    $pdo->exec($sql); //Создаем БД и таблицы
  	unset($sql);
    echo 'Таблицы созданы';
    $sql = file_get_contents($_SERVER['DOCUMENT_ROOT'].'/data/2-pull-data.sql');
    $pdo->exec($sql); //Заполняем данным
  	unset($sql);
    echo 'Данные записаны';
} catch(Exception $e) {
    echo $e;
}