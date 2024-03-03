<?php

namespace controllers;

use core\Controller;
use core\Core;
use models\Passport;
use models\Passport_Zak;
use models\User;

class MainController extends Controller{

    public function indexAction(){
        if(!User::isAdmin()){
            return $this->render([
                "grom" => Passport::getLastUserPassById($_SESSION['user']['id']),
                "zak" => Passport_Zak::getLastUserPassById($_SESSION['user']['id']),
            ]);    
        }
        Core::getInstance()->Redirect("admin/stat");
    }  

    public function errorAction($message, $statusCode){
        return $this->render([
            "message" => $message,
            "statusCode" => $statusCode
        ], "views/main/error.php");
    }
}