<?php

namespace models;

use core\Core;
use core\Utils;
use DateInterval;
use DateTime;

class Passport_Zak
{
    private static $tableName = 'zak_pass';

    public static function registerPassport($name, $surname, $city_of_birth, $sex, $date_of_birth, $img)
    {
        $name .= '/' . Utils::transliterateName($name);
        $surname .= '/' . Utils::transliterateName($surname);
        $city_of_birth .= '/' . Utils::transliterateName($city_of_birth);

        if ($sex == 'Чоловік') {
            $sex .= "/Male";
        }
        if ($sex == 'Жінка') {
            $sex .= "/Female";
        }
        var_dump($sex);
        $gr = "Україна/Ukraine";
        $end_date = Utils::generateDate10YearsLater();
        $num = Utils::generateRandomSetOfNumbers();

        $organs = Organ::getOrgans();

        $organ = $organs[array_rand($organs)];

        $result = Core::getInstance()->context->table(self::$tableName)->insert([
            "user" => $_SESSION['user']['id'],
            "name" => $name,
            "surname" => $surname,
            "city_of_birth" => $city_of_birth,
            "sex" => $sex,
            "date_of_birth" => $date_of_birth,
            "end_date" => $end_date,
            "num" => $num,
            "conf" => 0,
            "img" => $img,
            "gr" => $gr,
            "organ" => $organ['code'],
        ])->execute();

        return $result;
    }

    public static function getLastUserPassById($id)
    {
        $users = Core::getInstance()->context->table(self::$tableName)->select()->where([
            "user" => $id
        ])->execute();
        return $users[count($users) - 1];
    }

    public static function getPassports()
    {
        $users = User::getUsers();

        $passportsArray = [];

        foreach ($users as $user) {
            $pass = self::getLastUserPassById($user['id']);
            if (!empty($pass) && $pass['conf'] == 1) {
                $passportsArray[] = $pass;
            }
        }

        return $passportsArray;
    }

    public static function getUnconfPassports()
    {
        $users = User::getUsers();

        $passportsArray = [];

        foreach ($users as $user) {
            $pass = self::getLastUserPassById($user['id']);
            if (!empty($pass) && $pass['conf'] == 0) {
                $passportsArray[] = $pass;
            }
        }

        return $passportsArray;
    }

    public static function ConfPass($id)
    {
        $editParams = ["conf" => 1];

        Core::getInstance()->context->table(self::$tableName)->update($editParams)->where([
            "id" => $id
        ])->execute();
    }
}
