<?php

namespace models;

use core\Core;
use core\Utils;
use DateInterval;
use DateTime;

class Organ
{
    private static $tableName = 'organ';

    public static function getOrgans()
    {
        $organ = Core::getInstance()->context->table(self::$tableName)->select()->execute();
        return $organ;
    }
}
