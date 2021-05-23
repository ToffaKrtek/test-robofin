<?php
include_once(ROOT.'/models/App.php');
include_once(ROOT.'/components/Pagination.php');
    class AppController {

        public static function actionList() {
            
            $title = 'Список сотрудников';
            //пагинация
            $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
            $perpage = 10;
            $offset = $perpage * ($page - 1);

            $category = isset($_GET['category']) ? $_GET['category'] : 'all';
            $total = App::count_user($category);
            $staff = App::getAll($offset, $perpage);
            $pagination = new Pagination($page, $perpage, $total[0]);
           
            require_once(ROOT.'/views/index.php');  
            return true;
        }
    }