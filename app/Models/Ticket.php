<?php

namespace app\Models;
//
require_once 'core/Connection.php';
use PDO;
use core\Connection;


class Ticket extends Connection{

	public function index($mesaID){
        // crear consulta para cada registro del ticket
                $query = "SELECT
                        tickets.mesa_id AS mes_id,
                        productos.nombre AS pro_nombre,
                        productos.imagen_url AS pro_img,
                        precios.precio_base AS precio_pro,
                        productos_categorias.nombre AS categoria,
                        tickets.id AS ticket
                        
                        FROM tickets

                        INNER JOIN precios ON tickets.precio_id = precios.id
                        INNER JOIN productos ON precios.producto_id = productos.id
                        INNER JOIN productos_categorias ON productos.categoria_id = productos_categorias.id
                        
                        WHERE tickets.mesa_id = $mesaID
                        AND tickets.activo = 1";
                        

                $stmt = $this->pdo->prepare($query);
                $result = $stmt->execute();

                //
                // $query2 =  "SELECT count(*) AS cont_tickets FROM tickets WHERE activo = 1 and mesa_id = $mesaID";
                // $stmt2 = $this->pdo->prepare($query2); // 
                // $result2 = $stmt2->execute(); // bool
                                                
                //


                return $stmt->fetchALL(PDO::FETCH_ASSOC); // fecth -> cuando es solo 1 registro
        }

        public function addProduct($price_id, $table_id) 
        {

                $query =  "INSERT INTO tickets (precio_id, mesa_id, activo, creado, actualizado) VALUES (". $price_id.", ".$table_id.", 1, NOW(), NOW())";

                $stmt = $this->pdo->prepare($query);
                $result = $stmt->execute();
                $id = $this->pdo->lastInsertId();

                $query =  "SELECT tickets.id AS id, productos.nombre AS nombre, precios.precio_base AS precio_base, productos.imagen_url 
                AS imagen_url, productos_categorias.nombre AS categoria
                FROM tickets 
                INNER JOIN precios ON tickets.precio_id = precios.id 
                INNER JOIN productos ON precios.producto_id = productos.id 
                INNER JOIN productos_categorias ON productos.categoria_id = productos_categorias.id
                WHERE tickets.id = ".$id;

                $stmt = $this->pdo->prepare($query);
                $result = $stmt->execute();

                return $stmt->fetch(PDO::FETCH_ASSOC);
        }

        public function deleteProduct($ticket_id) 
        {
                
                $query =  "UPDATE tickets SET activo = 0, actualizado = NOW() WHERE id = $ticket_id";

                $stmt = $this->pdo->prepare($query);
                $result = $stmt->execute();
        
                return 'ok';
        }
        public function deleteAll($table_id) 
        {
                
                $query =  "UPDATE tickets SET activo = 0, actualizado = NOW() WHERE mesa_id = $table_id and venta_id IS NULL";

                $stmt = $this->pdo->prepare($query);
                $result = $stmt->execute();
        
                return 'ok';
        }
        


        // // base imponible
        // public function get_prize($mesaID)
        // {
                
        //         $query = "SELECT
                        
        //                 SUM(precios.precio_base) AS precio
        //                 FROM tickets
        //                 INNER JOIN precios ON tickets.precio_id = precios.id
        //                 WHERE tickets.mesa_id = $mesaID";
        
        //         $stmt = $this->pdo->prepare($query);
        //         $result = $stmt->execute();

        //         return $stmt->fetch(PDO::FETCH_ASSOC); // fecth -> cuando es solo 1 registro
        // }
        

        // total con iva incluido
        
        public function get_total($mesaID)
        {
                
                $query = "SELECT (SUM(precios.precio_base)*0.21)+SUM(precios.precio_base) AS total_final, SUM(precios.precio_base) AS precio
                        FROM tickets
                        INNER JOIN precios ON tickets.precio_id = precios.id
                        WHERE tickets.mesa_id = $mesaID
                        AND tickets.activo = 1
                        AND venta_id IS NULL";
                        
        
                $stmt = $this->pdo->prepare($query);
                $result = $stmt->execute();

                return $stmt->fetch(PDO::FETCH_ASSOC); // fecth -> cuando es solo 1 registro
        }


	
}

?>