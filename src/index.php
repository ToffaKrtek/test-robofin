<?php
//
// try {
//   $pdo = new PDO('mysql:host=mysqldb;dbname=robofin', 'root', 'password');
//   $allTable =$pdo->query('SHOW TABLES');
//
// while($result = $allTable->fetch()) {
//      echo $result[0] . '<br />';
// }
// } catch  (Exception $e){
//   echo $e->getMessage();
// }


// Создаем константу ROOT для удобства
define('ROOT', dirname(__FILE__));

// Подключение к БД -- параметры подключения в файле ./config.php
require_once(ROOT. '/components/DB.php');
require_once(ROOT. '/controllers/AppController.php');
require_once(ROOT.'/views/header.php');
AppController::actionList();
require_once(ROOT.'/views/footer.php');