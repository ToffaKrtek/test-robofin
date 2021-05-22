<?php
// $pdo = new PDO('mysql:host=mysql;dbname=test', 'root', 'password');
// $update_sql = file_get_contents('create tables.sql');
// $pdo->exec($update_sql);
// unset($update_sql);
try {
  $pdo = new PDO('mysql:host=mysqldb;dbname=robofin', 'root', 'password');
  $allTable =$pdo->query('SHOW TABLES');

while($result = $allTable->fetch()) {
     echo $result[0] . '<br />';
}
} catch  (Exception $e){
  echo $e->getMessage();
}
