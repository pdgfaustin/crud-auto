<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\models;
use App\utils\Constants;
/**
 * Description of OuvrageModel
 *
 * @author user
 */
class VoituresModel extends Modele {
    //put your code here
    protected $tblName = Constants::VOITURES;
    protected $db;

    public function __construct($db){
        $this->db= $db;
    }
}
