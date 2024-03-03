<?php

namespace core;

use DateTime;
use Exception;
use models\User;

class Utils
{
    public static function IsNotAdminThrowError()
    {
        if (!User::isAdmin()) {
            throw new Exception("Forbidden", 403);
        }
    }
    public static function Encrypt($data)
    {
        return md5($data);
    }
    public static function transliterateName($name)
    {
        $ukrainianToLatin = array(
            'а' => 'a', 'б' => 'b', 'в' => 'v', 'г' => 'h', 'ґ' => 'g',
            'д' => 'd', 'е' => 'e', 'є' => 'ie', 'ж' => 'zh', 'з' => 'z',
            'и' => 'y', 'і' => 'i', 'ї' => 'i', 'й' => 'i', 'к' => 'k',
            'л' => 'l', 'м' => 'm', 'н' => 'n', 'о' => 'o', 'п' => 'p',
            'р' => 'r', 'с' => 's', 'т' => 't', 'у' => 'u', 'ф' => 'f',
            'х' => 'kh', 'ц' => 'ts', 'ч' => 'ch', 'ш' => 'sh', 'щ' => 'shch',
            'ь' => '', 'ю' => 'iu', 'я' => 'ia',
            'А' => 'A', 'Б' => 'B', 'В' => 'V', 'Г' => 'H', 'Ґ' => 'G',
            'Д' => 'D', 'Е' => 'E', 'Є' => 'Ye', 'Ж' => 'Zh', 'З' => 'Z',
            'И' => 'Y', 'І' => 'I', 'Ї' => 'Yi', 'Й' => 'Y', 'К' => 'K',
            'Л' => 'L', 'М' => 'M', 'Н' => 'N', 'О' => 'O', 'П' => 'P',
            'Р' => 'R', 'С' => 'S', 'Т' => 'T', 'У' => 'U', 'Ф' => 'F',
            'Х' => 'Kh', 'Ц' => 'Ts', 'Ч' => 'Ch', 'Ш' => 'Sh', 'Щ' => 'Shch',
            'Ь' => '', 'Ю' => 'Yu', 'Я' => 'Ya',
        );

        $transliteratedName = strtr($name, $ukrainianToLatin);
        return $transliteratedName;
    }

    public static function generateDate10YearsLater()
    {
        $currentDate = new DateTime(); // Отримуємо поточну дату та час
        $currentDate->modify('+10 years'); // Додаємо 10 років
        return $currentDate->format('Y-m-d'); // Повертаємо дату у форматі "Рік-Місяць-День"
    }

    public static function generateRandomSetOfNumbers()
    {
        $randomSet = '';
        for ($i = 0; $i < 8; $i++) {
            $randomSet .= mt_rand(0, 9); // Генеруємо випадкове число в діапазоні від 0 до 9 та додаємо його до рядка
        }
        return $randomSet;
    }

    public static function convertDateStringToDate($dateString) {
        // Розбиваємо рядок на складові дати
        list($day, $month, $year) = explode('/', $dateString);
    
        // Перевіряємо, чи введені значення є числами
        if (!is_numeric($day) || !is_numeric($month) || !is_numeric($year)) {
            return null; // Повертаємо null у разі некоректних даних
        }
    
        // Створюємо об'єкт DateTime із отриманих значень
        $date = DateTime::createFromFormat('d/m/Y', "$day/$month/$year");
    
        // Перевіряємо, чи дата була коректна
        if ($date === false) {
            return null; // Повертаємо null у разі некоректної дати
        }
    
        return $date;
    }

    public static function splitStringBySlash($inputString) {
        $parts = explode('/', $inputString);
        return $parts;
    }
}
