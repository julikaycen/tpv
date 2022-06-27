<?php

namespace app\Models;
//
require_once 'core/Connection.php';
use PDO;
use core\Connection;


class Producto extends Connection{

	public function index($categ){ 
                $query = "SELECT * FROM productos WHERE categoria_id = $categ"; 
                $stmt = $this->pdo->prepare($query);
                $result = $stmt->execute();

                return $stmt->fetchALL(PDO::FETCH_ASSOC); // fecth -> cuando es solo 1 registro
                }

        
}



?>