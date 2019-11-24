<?php


class TasksController extends AdminBase
{
    public function actionIndex($page = 1)
    {
        $tasksPlaginator = Tasks::getTasksListByPlaginator($page);
        $total = Tasks::getTotalTasks();
        $pagination = new Pagination($total, $page, Tasks::SHOW_BY_DEFAULT, 'page-');

        require_once(ROOT . '/views/tasks/index.php');
        return true;
    }

    public function actionCreate()
    {
        $tasksList = array();
        $result = false;

        if (isset($_POST['submit'])) {

            $name_user = Tasks::checkName($_POST['name_user']);
            $email = $_POST['email'];
            $content = Tasks::checkContent($_POST['content']);
            $status = 'В обработке';
            $result = Tasks::createTask($name_user, $email, $content, $status);

        }
        require_once(ROOT . '/views/tasks/create.php');
        return true;
    }

    public function actionLogin()
    {
        if ($userIdd = $_SESSION['admin']) {
            Admin::auth($userIdd);
            header("Location: /admin_panel/");
        } else {

            $login = '';
            $password = '';
            if (isset($_POST['submit'])) {
                $login = $_POST['login'];
                $password = $_POST['password'];
                $errors = false;

                $userId = Admin::checkUserData($login, $password);
                if ($userId == false) {
                    $errors[] = 'Неправильные данные для входа на сайт';
                } else {
                    Admin::auth($userId);
                    header("Location: /");
                }
            }
        }
        require_once(ROOT . '/views/tasks/login.php');
        return true;

    }

    public function actionLogout()
    {
        session_start();
        unset($_SESSION["admin"]);
        header("Location: /");
    }

    public function actionDelete($id)
    {
        self::checkAdmin();
        if (isset($_POST['submit'])) {
            Tasks::deleteTaskById($id);
            header("Location: /");
        }
        require_once(ROOT . '/views/tasks/delete.php');
        return true;
    }

    public function actionUpdate($id)
    {

        self::checkAdmin();
        $taskList = Tasks::getTaskById($id);
        $content = $taskList['content'];
        $status = $taskList['status'];
        if (isset($_POST['submit'])) {

            $option['name_user'] = Tasks::checkName($_POST['name_user']);
            $option['email'] = $_POST['email'];
            $option['content'] = Tasks::checkContent($_POST['content']);
            $option['status'] = $_POST['status'];

                if (preg_match('/(. Отредактировано администратором)/', $status) <> preg_match('/(. Отредактировано администратором)/', $_POST['status'])) {
                    $option['status'] = $_POST['status'] . '. Отредактировано администратором';
                }

            if ($content <> $_POST['content']){
                if (preg_match('/(. Отредактировано администратором)/',$status) <> true ){
                    $option['status'] = $_POST['status'] . '. Отредактировано администратором';
                }
            }
            Tasks::updateTaskById($id, $option);
            header("Location: /");
        }
        require_once(ROOT . '/views/tasks/update.php');
        return true;
    }


}