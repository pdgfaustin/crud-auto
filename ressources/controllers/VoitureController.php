<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\controllers;
use App\models\VoituresModel;
use App\settings\DBCnx;
use App\utils\Constants;
/**
 * Description of OuvrageController
 *
 * @author Faustin Flory PADINGANYI
 */
class VoitureController extends Controller {
    //put your code here
    
    /**
     * 
     * @Path ('/listVoiture')
     */
    public function index(){
        try {
            $req = new VoituresModel(DBCnx::getDbConnector()->initDBConnection());
            $query = $req->All();
            return $this->view("voitures.index", compact('query'));
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }
    
    /**
     * 
     * @param type $id est l'Identifiant de l'Ouvrage
     * @path ('/detailsVoiture/:id')
     */
    public function show($id){
        try {
            $req = new VoituresModel(DBCnx::getDbConnector()->initDBConnection());
            $code [] = str_replace(".","/", $id[1]);
            $sql = "SELECT matricule,nom,prix FROM ". Constants::VOITURES ." WHERE matricule = ?";
            $query = $req->requetes($sql,$code,true);
            return $this->view("voitures.show", compact('query'));
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }
    public function store(){
        try {
            $req = new VoituresModel(DBCnx::getDbConnector()->initDBConnection());
            if (isset($_REQUEST)) {
                $id [] = $_REQUEST['matricule'];
                $exis = $req->requetes("SELECT matricule FROM ". Constants::VOITURES ." WHERE matricule = ?", $id);
                if ($exis) {
                    echo 'Risque de Doublon';
                    return;
                }
                $_id = $_REQUEST['matricule'];
                $array [] = $_id;
                $array [] = strtoupper($_REQUEST['nom']);
                $array [] = $_REQUEST['prix'];
                $sql = "INSERT INTO ". Constants::VOITURES ." (matricule, nom, prix) VALUES (?,?,?)";
                if ($req->requetes($sql,$array)) {
                    echo 'Enregistrement effectué';
                    header('Location: index.php');
                }
                
                
            }
            
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }
    public function create(){
        return $this->view("voitures.create");
    }
    public function update($id){
        try {
            $req = new VoituresModel(DBCnx::getDbConnector()->initDBConnection());
            $sql = "UPDATE ". Constants::VOITURES ." SET nom=?, prix = ?  WHERE matricule = ?";
            $array [] = strtoupper($_REQUEST['nom']);
            $array [] = $_REQUEST['prix'];
            $array [] = str_replace(".","/", $id[1]);
            if ($req->requetes($sql,$array)){
                echo "Modifications effectuées";
                header("Location: ../../");
            }
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }
    public function edit($id){
        try {
            $req = new VoituresModel(DBCnx::getDbConnector()->initDBConnection());
            $code [] = str_replace(".","/", $id[1]);
            $sql = "SELECT matricule,nom,prix FROM ". Constants::VOITURES ." WHERE matricule = ?";
            $query = $req->requetes($sql,$code,true);
            return $this->view("voitures.edit", compact('query'));
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }
    public function destroy($id){
        try {
            $req = new VoituresModel(DBCnx::getDbConnector()->initDBConnection());
            $code [] = str_replace(".","/", $id[1]);
            $sql = "DELETE FROM ". Constants::VOITURES ." WHERE matricule = ?";
            var_dump($sql);
            if($req->requetes($sql,$code,true)){
                header("Location: ../../");
            }
            
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }
    
    
}
