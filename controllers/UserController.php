<?php

namespace controllers;

use core\Controller;
use core\Core;
use core\Utils;
use Exception;
use models\User;

class UserController extends Controller
{

    public function loginAction()
    {
        if (isset($_POST["submit"])) {
            $login = $_POST["email"];
            $password = Utils::Encrypt($_POST["password"]);

            $user = User::getUser($login);

            try {
                if (empty($user)) {
                    throw new Exception("User not found!");
                }
                if ($user["password"] != $password) {
                    throw new Exception("Incorrect password!");
                }
                User::loginUser($user);
                Core::getInstance()->Redirect("/");
            } catch (Exception $ex) {
                return $this->render([
                    "login" => $login,
                    "error" => $ex->getMessage()
                ]);
            }
        }
        return $this->render();
    }

    public function registrationAction()
    {
        if (isset($_POST["submit"])) {
            $name = $_POST["name"];
            $surname = $_POST["surname"];
            $email = $_POST["email"];
            $password = $_POST["password"];
            $gender = $_POST["gender"];
            $img = $_POST["img"];
            $city = $_POST["city"];

            $user = User::getUser($email);

            try {
                if (!empty($user)) {
                    throw new Exception("This login already exists!");
                }
                User::registerUser($name, $surname, $email, $password, $gender, $img, $city);
                Core::getInstance()->Redirect("/");
            } catch (Exception $ex) {
                return $this->render([
                    "email" => $email,
                    "password" => $password,
                    "error" => $ex->getMessage()
                ]);
            }
        }
        return $this->render();
    }
    
    public function editAction()
    {
        if ($_POST['submit']) {
            $login = $_POST['login'];
            $img = $_POST['img'];

            if (!empty($user)) {
                throw new Exception("This login already exists!");
            }

            User::editUser($login, $img);

            Core::getInstance()->Redirect("/user/profile");
        }
        return $this->render();
    }

    public function logoutAction()
    {
        User::logoutUser();
        Core::getInstance()->Redirect("/user/login");
    }
}
