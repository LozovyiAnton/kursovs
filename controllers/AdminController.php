<?php

namespace controllers;

use core\Controller;
use core\Core;
use models\Backup;
use models\Organ;
use models\Passport;
use models\Passport_Zak;
use models\User;

class AdminController extends Controller
{

    public function statAction()
    {
        if (User::isAdmin()) {
            return $this->render([
                "Passport" => Passport::getPassports(),
                "Passport_Zak" => Passport_Zak::getPassports(),
                "Back_Up" => Backup::combineBackupData(),
                "Organs" => Organ::getOrgans(),
            ]);
        }
        Core::getInstance()->Redirect("/");
    }

    public function backup_fullAction()
    {
        if (User::isAdmin()) {
            Backup::createBackup();
            Core::getInstance()->Redirect("/admin/stat");
        }
        Core::getInstance()->Redirect("/");
    }

    public function backup_restoreAction($params)
    {
        $file = array_shift($params);
        if (User::isAdmin()) {
            Backup::restoreBackup($file);
            Core::getInstance()->Redirect("/admin/stat");
        }
        Core::getInstance()->Redirect("/");
    }

    public function passportsAction()
    {
        if (User::isAdmin()) {

            return $this->render(["array_data" => Passport::getPassports()]);
        }
        Core::getInstance()->Redirect("/");
    }

    public function zak_passportsAction()
    {
        if (User::isAdmin()) {

            return $this->render(["array_data" => Passport_Zak::getPassports()]);
        }
        Core::getInstance()->Redirect("/");
    }

    public function pass_confAction()
    {
        if (User::isAdmin()) {

            return $this->render(["array_data" => Passport::getUnconfPassports()]);
        }
        Core::getInstance()->Redirect("/");
    }

    public function zak_pass_confAction()
    {
        if (User::isAdmin()) {
            return $this->render(["array_data" => Passport_Zak::getUnconfPassports()]);
        }
        Core::getInstance()->Redirect("/");
    }

    public function conf_passAction($params)
    {
        if (User::isAdmin()) {
            $id = array_shift($params);
            Passport::ConfPass($id);
            Core::getInstance()->Redirect("/admin/pass_conf");
        }
        Core::getInstance()->Redirect("/");
    }

    public function conf_zak_passAction($params)
    {
        if (User::isAdmin()) {
            $id = array_shift($params);
            Passport_Zak::ConfPass($id);
            Core::getInstance()->Redirect("/admin/zak_pass_conf");
        }
        Core::getInstance()->Redirect("/");
    }
}
