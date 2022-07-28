<?php

namespace app\Models;
//
require_once 'core/Connection.php';
use PDO;
use core\Connection;


class Table extends Connection{

	public function index(){
                $query = "SELECT * FROM mesas WHERE activo=1";

                $stmt = $this->pdo->prepare($query);
                $result = $stmt->execute();

                return $stmt->fetchALL(PDO::FETCH_ASSOC); // fecth -> cuando es solo 1 registro
	}

        
        public function updateState($table_id, $state) // 
        {

                $query =  "UPDATE mesas SET estado = $state, actualizado = NOW() WHERE id = $table_id";

                
                $stmt = $this->pdo->prepare($query);
                $result = $stmt->execute();
               

                return $stmt->fetch(PDO::FETCH_ASSOC);
        }

        public function store($id,$numero,$ubicacion,$pax){
                $query = "INSERT INTO table ()";

                $stmt = $this->pdo->prepare($query);
                $result = $stmt->execute();

                return $stmt->fetchALL(PDO::FETCH_ASSOC); // fecth -> cuando es solo 1 registro
	}

        public function show($id){
                $query = "SELECT * FROM mesas WHERE activo=1";

                $stmt = $this->pdo->prepare($query);
                $result = $stmt->execute();

                return $stmt->fetchALL(PDO::FETCH_ASSOC); // fecth -> cuando es solo 1 registro
	}

        public function delete($id){
                $query = "SELECT * FROM mesas WHERE activo=1";

                $stmt = $this->pdo->prepare($query);
                $result = $stmt->execute();

                return $stmt->fetchALL(PDO::FETCH_ASSOC); // fecth -> cuando es solo 1 registro
	}

        // examen - metodo con la query que selecciona todo y le asignamos el parametro en ubicacion , que cojeremos con $_GET en 'admin-mesas'
        public function filtra_ubicacion($ubic)
        {
                $query = "SELECT * FROM mesas WHERE ubicacion='$ubic'";

                $stmt = $this->pdo->prepare($query);
                $result = $stmt->execute();

                return $stmt->fetchALL(PDO::FETCH_ASSOC); // fecth -> cuando es solo 1 registro
        }

}

?>