<?php
    class App {
        static function getAll($offset, $perpage){
            try {
                $db = DB::getConnect();
                $sql = "SELECT * FROM user LIMIT $perpage OFFSET $offset";
                $result = $db->query($sql);
            }  catch( Exception $e) {
                print_r($e);
                return $e;
            }
            return $result->fetchAll();
        }
        static function count_user($category){
            try {
                $db = DB::getConnect();
                $sql = "SELECT COUNT(id) FROM user";
                $result = $db->query($sql);
            }  catch( Exception $e) {
                print_r($e);
                return $e;
            }
            return $result->fetch();
        }
    }