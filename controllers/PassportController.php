<?php

namespace controllers;

use core\Controller;
use core\Core;
use models\Passport;
use models\Passport_Zak;

class PassportController extends Controller
{

    public function gromAction()
    {
        if (isset($_POST["submit"])) {
            $name = $_POST["name"];
            $surname = $_POST["surname"];
            $pb = $_POST["pb"];
            $sex = $_POST["sex"];
            $date_of_birth = $_POST["date_of_birth"];
            $img = $_POST["img"];

            Passport::registerPassport($name, $surname, $pb, $sex, $date_of_birth, $img);
            Core::getInstance()->Redirect("/");
        }
        return $this->render();
    }
    public function zakorAction()
    {
        if (isset($_POST["submit"])) {
            $name = $_POST["name"];
            $surname = $_POST["surname"];
            $city_of_birth = $_POST["city_of_birth"];
            $sex = $_POST["sex"];
            $date_of_birth = $_POST["date_of_birth"];
            $img = $_POST["img"];

            Passport_Zak::registerPassport($name, $surname, $city_of_birth, $sex, $date_of_birth, $img);
            Core::getInstance()->Redirect("/");
        }
        return $this->render();
    }
}
