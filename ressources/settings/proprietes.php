<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\settings;

/**
 * Description of proprietes
 *
 * @author user
 */
class proprietes {
    //put your code here
    
    private $dbDriver;
    private $dbHost;
    private $dbPort;
    private $dbUsername;
    private $dbPassword;
    private $dbSchema;
    private $dbOptions;
    
    function getDbDriver() {
        return $this->dbDriver;
    }

    function getDbHost() {
        return $this->dbHost;
    }

    function getDbPort() {
        return $this->dbPort;
    }

    function getDbUsername() {
        return $this->dbUsername;
    }

    function getDbPassword() {
        return $this->dbPassword;
    }

    function getDbSchema() {
        return $this->dbSchema;
    }

    function getDbOptions() {
        return $this->dbOptions;
    }

    function setDbDriver($dbDriver) {
        $this->dbDriver = $dbDriver;
    }

    function setDbHost($dbHost) {
        $this->dbHost = $dbHost;
    }

    function setDbPort($dbPort) {
        $this->dbPort = $dbPort;
    }

    function setDbUsername($dbUsername) {
        $this->dbUsername = $dbUsername;
    }

    function setDbPassword($dbPassword) {
        $this->dbPassword = $dbPassword;
    }

    function setDbSchema($dbSchema) {
        $this->dbSchema = $dbSchema;
    }

    function setDbOptions($dbOptions) {
        $this->dbOptions = $dbOptions;
    }


}
