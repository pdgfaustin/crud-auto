<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\settings;

use PDO;

/**
 * Description of DBCnx
 *
 * @author Faustin Flory PADINGANYI
 */
class DBCnx extends parametres {
    //put your code here
    private static $conn;
    public function initDBConnection():PDO{
        $this->compile();
        $dsn = $this->getDbDriver() . ":host=" . $this->getDbHost() .
                ((!empty($this->getDbPort())) ? (';port=' . $this->getDbPort()) : '') .
                ((!empty($this->getDbPort())) ? (";dbname=" . $this->getDbSchema()) : '');

        $db = new PDO($dsn, $this->getDbUsername(), $this->getDbPassword());

        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $db;
    }
    public static function getDbConnector() {

        if (null === static::$conn) {
            static::$conn = new static();
        }

        return static::$conn;
    }
}
