<?php

namespace App\settings;

class parametres extends proprietes{

    public function compile(){
        $this->setDbDriver(Configuration::getAttributes("dbDriver"));
        $this->setDbHost(Configuration::getAttributes("dbHost"));
        $this->setDbPort(Configuration::getAttributes("dbPort"));
        $this->setDbUsername(Configuration::getAttributes("dbUsername"));
        $this->setDbPassword(Configuration::getAttributes("dbPassword"));
        $this->setDbSchema(Configuration::getAttributes("dbSchema"));
        $this->setDbOptions(Configuration::getAttributes("dbOptions"));
    }
}