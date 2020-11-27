<?php

namespace App\models;
use Utilisateurs\Constants;
use PDO;
use stdClass;

abstract class Modele{
    protected $db;
    protected $tblName;

    public function All():array{
        $query = "SELECT * FROM ". $this->tblName;
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        // $stmt->setFetchMode(PDO::FETCH_CLASS,get_class($this),$this->db);
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function requetes(string $sql, array $params = null, $single = null){
        $method = is_null($params) ? "query" : "prepare";
        $fetch = is_null($single) ? "fetchAll" : "fetch";
        $stmt = $this->db->$method($sql);
        
        if (strpos($sql,'DELETE') === 0 || strpos($sql,'UPDATE') === 0 || strpos($sql,'INSERT')===0) {
            $a = 1;
            for ($i=0; $i < count($params); $i++) { 
                
                $stmt->bindParam($a,$params[$i]);
                
                $a++;
            }
            if ($stmt->execute()) {
                return $stmt;
            }
            return false;
        }
        if ($method === 'query') {
            
            return $stmt->$fetch(PDO::FETCH_OBJ);
        }else{
            $a = 1;
            for ($i=0; $i < count($params); $i++) { 
                
                $stmt->bindParam($a,$params[$i]);
                
                $a++;
            }
            $stmt->execute();
            return $stmt->$fetch(PDO::FETCH_OBJ);
        }
    }
    
}