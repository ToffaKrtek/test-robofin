<?php

  class DB
  {
    public static function getConnect()
    {
      $paramsPath = ROOT.'/config.php';
      $params = include($paramsPath);
      $db = new PDO($params['dsn'], $params['user'], $params['pass'],[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
      return $db;
    }
  }
