<?php

namespace app\Models;
//
require_once 'core/Connection.php';
use PDO;
use core\Connection;


class Producto extends Connection{

	public function index($categ){ 
        $query = "SELECT productos.imagen_url, productos.nombre, precios.id AS precio_id FROM productos 
        INNER JOIN precios ON precios.producto_id = productos.id;
        WHERE categoria_id = $categ and precios.vigente = 1";
        
        $stmt = $this->pdo->prepare($query);
        $result = $stmt->execute();

        return $stmt->fetchALL(PDO::FETCH_ASSOC); // fecth -> cuando es solo 1 registro
    }

        
}



?>