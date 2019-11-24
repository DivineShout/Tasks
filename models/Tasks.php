<?php

/**
 * Created by PhpStorm.
 * User: vetko
 * Date: 14.05.2019
 * Time: 22:52
 */
class Tasks
{
    const SHOW_BY_DEFAULT = 3;

    public static function createTask($name_user, $email, $content, $status)
    {
        $db = Db::getConnection();
        $sql = 'INSERT INTO tasks (name_user, email, content, status) '
            . 'VALUES (:name_user, :email, :content, :status)';
        $result = $db->prepare($sql);
        $result->bindParam(':name_user', $name_user, PDO::PARAM_STR);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':content', $content, PDO::PARAM_STR);
        $result->bindParam(':status', $status, PDO::PARAM_STR);

        return $result->execute();
    }

    public static function deleteTaskById($id)
    {
        $db = Db::getConnection();
        $sql = 'DELETE FROM tasks WHERE id = :id';
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        return $result->execute();
    }

    public static function getTasksListByPlaginator( $page = 1)
    {

        $page = intval($page);
        $offset = ($page - 1) * self::SHOW_BY_DEFAULT;
        $db = Db::getConnection();
        $tasks = array();
        $result = $db->query("SELECT id, name_user, email, content, status FROM tasks "
            . "ORDER BY id DESC "
            . "LIMIT ".self::SHOW_BY_DEFAULT
            . ' OFFSET '. $offset);
        $i = 0;
        while ($row = $result->fetch()) {
            $tasks[$i]['id'] = $row['id'];
            $tasks[$i]['name_user'] = $row['name_user'];
            $tasks[$i]['email'] = $row['email'];
            $tasks[$i]['content'] = $row['content'];
            $tasks[$i]['status'] = $row['status'];
            $i++;
        }
        return $tasks;
    }

    public static function getTotalTasks()
    {
        $db = Db::getConnection();
        $result = $db->query('SELECT count(id) AS count FROM tasks ');
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $row = $result->fetch();
        return $row['count'];
    }

    public static function getTaskById($id)
    {
        if ($id) {
            $db = Db::getConnection();
            $sql = 'SELECT * FROM tasks WHERE id = :id';

            $result = $db->prepare($sql);
            $result->bindParam(':id', $id, PDO::PARAM_INT);
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $result->execute();

            return $result->fetch();
        }
    }

    public static function updateTaskById($id, $option)
    {

        $db = Db::getConnection();
        $sql = "UPDATE tasks
            SET   
                name_user = :name_user,
                email = :email,
                content = :content,
                status = :status
                WHERE id= :id";

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':name_user', $option['name_user'], PDO::PARAM_STR);
        $result->bindParam(':email', $option['email'], PDO::PARAM_STR);
        $result->bindParam(':content', $option['content'], PDO::PARAM_STR);
        $result->bindParam(':status', $option['status'], PDO::PARAM_STR);
        return $result->execute();
    }

    public static function checkName($name_user)
    {
        $script = htmlspecialchars($name_user, ENT_QUOTES);
        return $script;
    }

    public static function checkContent($content)
    {
        $script = htmlspecialchars($content, ENT_QUOTES);
        return $script;
    }


}