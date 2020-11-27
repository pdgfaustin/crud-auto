<?php

namespace App\settings;

class Configuration{

    private static $properties;

    public static function getAttributes(string $name, string $defaultValue = null){
        if (isset(self::properties()[$name])) {
            $value = self::properties()[$name];
        }else {
            $value = $defaultValue;
        }
        return $value;
    }

    public static function properties(){
        if (self::$properties==null) {
            $loadFile = dirname(__DIR__). DIRECTORY_SEPARATOR . "settings/config" . DIRECTORY_SEPARATOR . "dev.ini"; 
            if (!file_exists($loadFile)) {
                $loadFile = dirname(__DIR__). DIRECTORY_SEPARATOR . "settings/config" . DIRECTORY_SEPARATOR . "prod.ini"; 
            }
            self::$properties = parse_ini_file($loadFile);
        }
        return self::$properties;
    }
}