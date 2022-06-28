<?php

namespace app\Models;
//
require_once 'core/Connection.php';
use PDO;
use core\Connection;


class Venta extends Connection{

	public function index(){
        $query = "SELECT ventas.id,ventas.numero_ticket,ventas.hora_emision,ventas.mesa_id,ventas.precio_total, ventas.metodo_pago_id, ventas.precio_total_base, ventas.precio_total_iva  
        FROM ventas INNER JOIN metodos_pagos ON ventas.metodo_pago_id = metodos_pagos.id";
                  

        $stmt = $this->pdo->prepare($query);
        $result = $stmt->execute();

        return $stmt->fetchALL(PDO::FETCH_ASSOC); // fecth -> cuando es solo 1 registro

        // <?php echo $venta['id']; <?php if(isset($_GET['venta'])): <?php endif;
        // <?php if(isset($_GET['venta'])): <?php endif;
	}
}

?>