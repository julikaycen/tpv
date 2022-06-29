<?php

namespace app\Models;
//
require_once 'core/Connection.php';
use PDO;
use core\Connection;


class Venta extends Connection{

	public function index($fecha,$mesa){
                
                $query = "SELECT ventas.id,ventas.numero_ticket,ventas.hora_emision,ventas.mesa_id,ventas.precio_total, ventas.metodo_pago_id, ventas.precio_total_base, ventas.precio_total_iva  
                FROM ventas INNER JOIN metodos_pagos ON ventas.metodo_pago_id = metodos_pagos.id";
                
                


                $stmt = $this->pdo->prepare($query);
                $result = $stmt->execute();

                return $stmt->fetchALL(PDO::FETCH_ASSOC); // fecth -> cuando es solo 1 registro

                // <?php echo $venta['id']; <?php if(isset($_GET['venta'])): <?php endif;
                // <?php if(isset($_GET['venta'])): <?php endif;
	}

        public function show($arg){

                $query = "SELECT ventas.id, ventas.numero_ticket, metodos_pagos.nombre AS _metodo_pago,ventas.precio_total_base, ventas.precio_total_iva, ventas.precio_total, ventas.mesa_id
                  FROM ventas INNER JOIN metodos_pagos ON ventas.metodo_pago_id = metodos_pagos.id
                        WHERE ventas.id = $arg";
                        

                $stmt = $this->pdo->prepare($query);
                $result = $stmt->execute();

                return $stmt->fetch(PDO::FETCH_ASSOC); // fecth -> cuando es solo 1 registro

        }

        public function productos_venta($venta_id){

                $query = "SELECT productos.nombre AS nombre_producto, SUM(precios.precio_base) AS precio_base, productos.imagen_url, COUNT(productos.nombre) AS cantidad FROM ventas 
                INNER JOIN tickets ON ventas.id = tickets.venta_id
                INNER JOIN precios ON tickets.precio_id = precios.id
                INNER JOIN productos ON precios.producto_id = productos.id
                WHERE ventas.activo = 1 AND ventas.id = $venta_id
                GROUP BY productos.id";

                $stmt = $this->pdo->prepare($query);
                $result = $stmt->execute();

                return $stmt->fetchALL(PDO::FETCH_ASSOC); // fecth -> cuando es solo 1 registro     
        }
}

?>