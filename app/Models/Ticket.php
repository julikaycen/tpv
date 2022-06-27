<?php

namespace app\Models;
//
require_once 'core/Connection.php';
use PDO;
use core\Connection;

// globals
$mesaID = 1;

class Ticket extends Connection{



	public function index(){
        // crear consulta para cada registro del ticket
                global $mesaID;
                $query = "SELECT
                        tickets.mesa_id AS mes_id,
                        productos.nombre AS pro_nombre,
                        productos.imagen_url AS pro_img,
                        precios.precio_base AS precio_pro,
                        productos_categorias.nombre AS categoria

                        FROM tickets

                        INNER JOIN precios ON tickets.precio_id = precios.id
                        INNER JOIN productos ON precios.producto_id = productos.id
                        INNER JOIN productos_categorias ON productos.categoria_id = productos_categorias.id
                        
                        WHERE tickets.mesa_id = $mesaID";

                $stmt = $this->pdo->prepare($query);
                $result = $stmt->execute();

                return $stmt->fetchALL(PDO::FETCH_ASSOC); // fecth -> cuando es solo 1 registro
        }


        // base imponible
        public function get_prize()
        {
                global $mesaID;
                $query = "SELECT
                        
                        SUM(precios.precio_base) AS precio
                        FROM tickets
                        INNER JOIN precios ON tickets.precio_id = precios.id
                        WHERE tickets.mesa_id = $mesaID";
        
                $stmt = $this->pdo->prepare($query);
                $result = $stmt->execute();

                return $stmt->fetchALL(PDO::FETCH_ASSOC); // fecth -> cuando es solo 1 registro
        }
        
        // total con iva incluido
        public function get_total()
        {
                global $mesaID;
                $query = "SELECT
                        
                        (SUM(precios.precio_base)*0.21)+SUM(precios.precio_base)
                        FROM tickets
                        INNER JOIN precios ON tickets.precio_id = precios.id
                        WHERE tickets.mesa_id = $mesaID";
        
                $stmt = $this->pdo->prepare($query);
                $result = $stmt->execute();

                return $stmt->fetchALL(PDO::FETCH_ASSOC); // fecth -> cuando es solo 1 registro
        }

	
}

?>