<?php

namespace controllers;

use core\Controller;
use core\Core;
use models\Passport_Zak;
use models\Travel;
use models\User;

class TravelController extends Controller{

    public function traveledAction(){
        if(!User::isAdmin()){
            $pass= Passport_Zak::getLastUserPassById($_SESSION['user']['id']);
            return $this->render([
                "travel" => Travel::countTravelsByCountry($pass['id']),
                'map' => Travel::printMap($pass['id'])
            ]);    
        }
        Core::getInstance()->Redirect("admin/stat");
    }
}