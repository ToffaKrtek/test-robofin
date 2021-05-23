<?php
    class App {
        // Статичные методы
        // Общая выдача без каких-либо фильтров (но с пагинацией)
        function getAll($offset, $perpage, $category){
            $param = '';  // Весьма топорное решение, конечно. Но вроде сразу понятно, что происходит, т.ч. оставил
            switch ($category){
                case 'show_all':
                    $param = '';
                    break;
                case 'show_fired':
                    $param = 'WHERE ';
                    break;
                case 'show_probation':
                    $param = '';
                    break;
                default:
                    $param = '';
                    break;
            }
            try {
                $db = DB::getConnect();
                $sql = "SELECT * FROM user $param ORDER BY last_name LIMIT $perpage OFFSET $offset";
                $result = $db->query($sql);
            }  catch( Exception $e) {
                print_r($e);
                return $e;
            }
            return $result->fetchAll();
        }

        // Получаем кол-во записей -- необходимо для корректной пагинации
        function countStaff($category){
            
            $param = '';  
            switch ($category){
                case 'show_all':
                    $param = '';
                    break;
                case 'show_fired':
                    $param = ' INNER JOIN user_dismission ON user.id = user_dismission.user_id';
                    break;
                case 'show_probation':
                    $param = ' WHERE created_at >= DATE_SUB(CURRENT_DATE, INTERVAL 3 MONTH)';
                    break;
                default:
                    $param = '';
                    break;
            }
            try {
                $db = DB::getConnect();
                $sql = "SELECT COUNT(*) FROM user".$param;
                $result = $db->query($sql);
            }  catch( Exception $e) {
                print_r($e);
                return $e;
            }
            return $result->fetch();
        }

        // Получаем список уволенных сотрудников
        function getFiredStaff($offset, $perpage, $category) {
            $param = '';  
            switch ($category){
                case 'show_all':
                    $param = '';
                    break;
                case 'show_fired':
                    $param = '';
                    break;
                case 'show_probation':
                    $param = '';
                    break;
                default:
                    $param = '';
                    break;
            }
            try {
                $db = DB::getConnect();
                $sql = "SELECT * FROM user INNER JOIN user_dismission ON user.id = user_dismission.user_id $param ORDER BY last_name LIMIT $perpage OFFSET $offset";
                $result = $db->query($sql);
            }  catch( Exception $e) {
                print_r($e);
                return $e;
            }
            return $result->fetchAll();
        }

        // Получаем список сотрудников с испытательным сроком (3 месяца от текущего дня)
        function getProbationStaff($offset, $perpage, $category) {
            $param = '';  
            switch ($category){
                case 'show_all':
                    $param = '';
                    break;
                case 'show_fired':
                    $param = ' ';
                    break;
                case 'show_probation':
                    $param = '';
                    break;
                default:
                    $param = '';
                    break;
            }
            try {
                $db = DB::getConnect();
                $sql = "SELECT * FROM user WHERE created_at >= DATE_SUB(CURRENT_DATE, INTERVAL 3 MONTH) $param ORDER BY last_name LIMIT $perpage OFFSET $offset";
                $result = $db->query($sql);
            }  catch( Exception $e) {
                print_r($e);
                return $e;
            }
            return $result->fetchAll();
        }
    }