<?php

require 'vendor/autoload.php';
use App\routes\Router as RT;

define ('VIEWS', dirname(__DIR__) . DIRECTORY_SEPARATOR . 'stage\\views' . DIRECTORY_SEPARATOR);
define ('SCRIPT', dirname(htmlspecialchars($_SERVER['SCRIPT_NAME'])) . DIRECTORY_SEPARATOR);
date_default_timezone_set('Africa/Kinshasa');

try {
    $val = isset($_GET['url']) ? $_GET['url'] : null;
    $router = new RT(htmlspecialchars($val));
    
    $router->getRes("/","App\controllers\VoitureController@index");
    $router->getRes("/voitures", "App\controllers\VoitureController@create");
    $router->getRes("/voitures/:id", "App\controllers\VoitureController@show");
    $router->postRes("/voitures", "App\controllers\VoitureController@store");
    $router->getRes("/voitures/edit/:id", "App\controllers\VoitureController@edit");
    $router->postRes("/voitures/edit/:id", "App\controllers\VoitureController@update");
    $router->postRes("/voitures/delete/:id","App\controllers\VoitureController@destroy");
 
    try {
        $router->runRes();
    } catch (Exception $e) {
        echo $e->getMessage();
    }

//    echo htmlspecialchars($_GET['url']);
} catch (PDOException $ex) {
    echo $ex->getMessage();
}