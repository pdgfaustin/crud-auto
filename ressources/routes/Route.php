<?php

namespace App\routes;

class Route{
    private $path;
    private $action;
    private $matches;


    public function __construct($path,$action) {
        $this->path = trim($path,'/');
        $this->action = $action;
    }
    
    public function matches(string $url){
        $path = preg_replace('#:([\w]+)#', '([^/]+)', $this->path);
        $pathToMatch = "#^$path$#";
        
        if (preg_match($pathToMatch, $url, $matches)) {
            $this->matches = $matches;
            return TRUE;
        }
        return FALSE;
    }
    
    
    public function execute(){
        $params = explode('@', $this->action);
        $controller = new $params[0]();
        $method = $params[1];
        
        return isset($this->matches) ? $controller->$method($this->matches) : $controller->$method();
    }
}