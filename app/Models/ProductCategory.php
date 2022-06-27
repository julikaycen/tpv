<?php

namespace app\Models;
//
require_once 'core/Connection.php';
use PDO;
use core\Connection;


class ProductCategory extends Connection{

	public function index(){
                $query = "SELECT productos_categorias.id, productos_categorias.nombre, productos_categorias.imagen_url FROM productos_categorias
                INNER JOIN productos ON productos_categorias.id = productos.categoria_id
                GROUP BY productos_categorias.id
                                        
                ";
        
        $stmt = $this->pdo->prepare($query);
        $result = $stmt->execute();

        return $stmt->fetchALL(PDO::FETCH_ASSOC); // fecth -> cuando es solo 1 registro
	}
}



?>