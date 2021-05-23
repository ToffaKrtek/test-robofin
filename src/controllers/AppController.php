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
                        $total = $app->countStaff($list_type);
                        $staff = $app->getAll($offset, $perpage, $list_type);
                        $pagination = new Pagination($page, $perpage, $total[0]);
                        // require_once(ROOT.'/views/index.php');  
                        break;
                    case 'show_fired':
                        $total = $app->countStaff($list_type);
                        $staff = $app->getFiredStaff($offset, $perpage, $list_type);
                        $pagination = new Pagination($page, $perpage, $total[0]);
                        break;
                    case 'show_probation':
                        $total = $app->countStaff($list_type);
                        $staff = $app->getProbationStaff($offset, $perpage, $list_type);
                        $pagination = new Pagination($page, $perpage, $total[0]);
                        break;
                    default:
                        $total = $app->countStaff($list_type);
                        $staff = $app->getAll($offset, $perpage, $list_type);
                        $pagination = new Pagination($page, $perpage, $total[0]);
                        break;
                }
            }
            else {
                $total = $app->countStaff($list_type);
                $staff = $app->getAll($offset, $perpage, $list_type);
                $pagination = new Pagination($page, $perpage, $total[0]);
            }
            require_once(ROOT.'/views/index.php');  
            return true;
        }
    }