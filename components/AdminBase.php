<?php


abstract class AdminBase
{
    public static function checkAdmin()
    {

        $userId = Admin::checkLogged();

        if ($user = Admin::getUserById($userId)) {
            return true;
        }

        die('Access denied');
    }

}
