<?php

namespace app\Models;
//
require_once 'core/Connection.php';
use PDO;
use core\Connection;


class Iva extends Connection{

	public function index(){ 
        $query = "SELECT * FROM iva";
        
        $stmt = $this->pdo->prepare($query);
        $result = $stmt->execute();

        return $stmt->fetchALL(PDO::FETCH_ASSOC); // fecth -> cuando es solo 1 registro
    }

    public function store($tipo,$multp){
        $query = "INSERT INTO iva(tipo,vigente,activo,creado,actualizado,multiplicador)
            VALUES(".$tipo.",1,1,CURDATE(), CURTIME()),".$tipo.")";

        $stmt = $this->pdo->prepare($query);
        $result = $stmt->execute();

        return $stmt->fetchALL(PDO::FETCH_ASSOC); // fecth -> cuando es solo 1 registro
    }

        
}



?>