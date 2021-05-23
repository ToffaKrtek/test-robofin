<?php
    class App {
        // Статичные методы
        // Общая выдача без каких-либо фильтров (но с пагинацией)
        function getAll($offset, $perpage){
            
            try {
                $db = DB::getConnect();
                $sql = "SELECT * FROM user ORDER BY last_name LIMIT $perpage OFFSET $offset";
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
        function getFiredStaff($offset, $perpage) {
            try {
                $db = DB::getConnect();
                $sql = "SELECT * FROM ((user INNER JOIN user_dismission ON user.id = user_dismission.user_id) 
                        INNER JOIN dismission_reason ON reason_id = dismission_reason.id) 
                        ORDER BY last_name LIMIT $perpage OFFSET $offset";
                $result = $db->query($sql);
            }  catch( Exception $e) {
                print_r($e);
                return $e;
            }
            return $result->fetchAll();
        }

        // Получаем список сотрудников с испытательным сроком (3 месяца от текущего дня)
        function getProbationStaff($offset, $perpage) {
            try {
                $db = DB::getConnect();
                $sql = "SELECT user.first_name, user.last_name, user.middle_name, user.created_at, position.name as position, department.description as department
                        FROM (((user INNER JOIN user_position ON user.id = user_position.user_id) 
                        INNER JOIN position ON user_position.position_id = position.id)
                        INNER JOIN department ON user_position.department_id = department.id) 
                        WHERE user.created_at >= DATE_SUB(CURRENT_DATE, INTERVAL 3 MONTH) 
                        ORDER BY last_name LIMIT $perpage OFFSET $offset";
                $result = $db->query($sql);
            }  catch( Exception $e) {
                print_r($e);
                return $e;
            }
            return $result->fetchAll();
        }

         // Получаем список из последних нанятых сотрудников в каждом отделе
         function getChiefs($offset, $perpage) {
            try {
                $db = DB::getConnect();
                $sql = "SELECT user.first_name, user.last_name, user.middle_name, user.created_at, position.name as position, department.description as department
                        FROM (((user INNER JOIN user_position ON user.id = user_position.user_id) 
                        INNER JOIN position ON user_position.position_id = position.id)
                        INNER JOIN department ON user_position.department_id = department.id) 
                        WHERE user.created_at >= DATE_SUB(CURRENT_DATE, INTERVAL 3 MONTH) 
                        ORDER BY last_name LIMIT $perpage OFFSET $offset";
                $result = $db->query($sql);
            }  catch( Exception $e) {
                print_r($e);
                return $e;
            }
            return $result->fetchAll();
        }
    }