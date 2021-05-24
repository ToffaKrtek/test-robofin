<?php
include_once(ROOT.'/models/App.php');
include_once(ROOT.'/components/Pagination.php');
    class AppController {

        public static function actionList() {
            $app = new App;
            $title = 'Список сотрудников';

            //пагинация
            $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
            $perpage = 10;
            $offset = $perpage * ($page - 1);
            $list_type = 'show_all';

            if(isset($_GET['list_type'])) {
                $list_type = isset($_GET['list_type']) ? $_GET['list_type'] : 'show_all';
                switch ($list_type){
                    case 'show_all':
                        $title = 'Список сотрудников';
                        $total = $app->countStaff($list_type);
                        $staff = $app->getAll($offset, $perpage);
                        $pagination = new Pagination($page, $perpage, $total[0]);  
                        require_once(ROOT.'/views/all.php');
                        return true;
                        break;
                    case 'show_fired':
                        $title = 'Список уволенных сотрудников';
                        $total = $app->countStaff($list_type);
                        $staff = $app->getFiredStaff($offset, $perpage);
                        $pagination = new Pagination($page, $perpage, $total[0]);  
                        require_once(ROOT.'/views/fired.php');
                        return true;
                    case 'show_probation':
                        $title = 'Список сотрудников на испытателном сроке';
                        $total = $app->countStaff($list_type);
                        $staff = $app->getProbationStaff($offset, $perpage);
                        $pagination = new Pagination($page, $perpage, $total[0]);  
                        require_once(ROOT.'/views/probation.php');
                        return true;
                    case 'show_chiefs':
                        $title = 'Список последних нанятых сотрудников в каждом отделе';
                        $total = $app->countStaff($list_type);
                        $staff = $app->getChiefs($offset, $perpage);
                        $pagination = new Pagination($page, $perpage, $total[0]);  
                        require_once(ROOT.'/views/chief.php');
                        return true;
                    default:
                        $title = 'Список сотрудников';
                        $total = $app->countStaff($list_type);
                        $staff = $app->getAll($offset, $perpage);
                        $pagination = new Pagination($page, $perpage, $total[0]);  
                        require_once(ROOT.'/views/all.php');
                        return true;
                }
            }
            else {
                $total = $app->countStaff($list_type);
                $staff = $app->getAll($offset, $perpage);
                $pagination = new Pagination($page, $perpage, $total[0]);
                require_once(ROOT.'/views/all.php');
                return true;
            }
              
        }
    }