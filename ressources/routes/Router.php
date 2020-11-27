<?php

namespace App\routes;
use App\routes\Route;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Router{
    public $url;
    public $routes = [];
    
    public function __construct($url) {
        $this->url = trim($url,'/');
    }
    
    public function getRes(string $path, string $action){
        $routes = new Route($path, $action);
        $this->routes['GET'][] = $routes;
        return $routes;
    }
    public function putRes(string $path, string $action){
        $routes = new Route($path, $action);
        $this->routes['PUT'][] = $routes;
        return $routes;
    }
    
    public function deleteRes(string $path, string $action){
        $routes = new Route($path, $action);
        $this->routes['DELETE'][] = $routes;
        return $routes;
    }
    
    public function runRes(){
        // if(!isset($this->routes[$_SERVER['REQUEST_METHOD']])){
        //     throw new RouterException('REQUEST_METHOD does not exist');
        // }
        foreach ($this->routes[$_SERVER['REQUEST_METHOD']] as $route) {
            if ($route->matches($this->url)) {
               return $route->execute();
            }
        }
        return header('HTTP/1.0 404 NOT FOUND');
    }
    public function postRes(string $path, string $action){
        $routes = new Route($path, $action);
        $this->routes['POST'][] = $routes;
        return $routes;
    }
}

