<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\controllers;

/**
 * Description of Controller
 *
 * @author Faustin Flory PADINGANYI
 */
abstract class Controller {
    
    public function view(string $path, array $params = null){
        ob_start();
        $pat = str_replace('.', DIRECTORY_SEPARATOR, $path);
        require VIEWS . $pat . ".php";
        if (isset($params)) {
            $params = extract($params);
        }
        /* @var $content for general layout */
        $content = ob_get_clean();
        
        require VIEWS . 'layout.php';
    }
}
