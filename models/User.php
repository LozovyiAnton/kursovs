<?php

namespace models;

use core\Core;
use core\Utils;

class User
{
    protected static $tableName = "user";

    public static function getUser($login)
    {
        $users = Core::getInstance()->context->table(self::$tableName)->select()->where([
            "email" => $login
        ])->execute();
        return $users[0];
    }

    public static function getUserById($id)
    {
        $users = Core::getInstance()->context->table(self::$tableName)->select()->where([
            "id" => $id
        ])->execute();
        return $users[0];
    }

    public static function getUsers()
    {
        $users = Core::getInstance()->context->table(self::$tableName)->select()->execute();
        return $users;
    }

    public static function registerUser($name, $surname, $email, $password, $gender, $img, $city)
    {
        $result = Core::getInstance()->context->table(self::$tableName)->insert([
            "name" => $name,
            "surname" => $surname,
            "email" => $email,
            "password" => Utils::Encrypt($password),
            "gender" => $gender,
            "img" => $img,
            "city" => $city,
            "role" => 0,
        ])->execute();
        return $result;
    }

    public static function loginUser($user)
    {
        $_SESSION["user"] = $user;
    }

    public static function getLoginedUser()
    {
        return $_SESSION["user"];
    }
    public static function logoutUser()
    {
        unset($_SESSION["user"]);
    }

    public static function isAdmin()
    {
        if ($_SESSION['user']["role"] == 1) {
            return true;
        }
        return false;
    }

    public static function editUser($login, $img)
    {
        $editParams = ["login" => $login, "img" => $img];

        Core::getInstance()->context->table(self::$tableName)->update($editParams)->where([
            "id" => $_SESSION['user']['id']
        ])->execute();
        self::loginUser(self::getUser($login));
    }
}
