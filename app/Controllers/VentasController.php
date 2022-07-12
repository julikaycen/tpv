<?php

namespace app\Controllers; // ruta carpeta
//
require_once 'app/Models/Venta.php'; // archivo
use app\Models\Venta; // modelo - objeto




class VentasController {

	protected $venta;
    

	public function __construct(){  

		$this->venta = new Venta();
		
	}

	public function index($fecha,$mesa,$datetime){
		return $this->venta->index($fecha,$mesa,$datetime);
	}

	public function show($datos_venta){
		return $this->venta->show($datos_venta);
	}

	public function productos_venta($venta_id){
		return $this->venta->productos_venta($venta_id);
	}

	public function tickets_ingresos($datetime){
		return $this->venta->tickets_ingresos($datetime);
	}

	public function media_martes(){ // se hace con DAYNAME(fecha)
		return $this->venta->media_martes();
	}

	public function cobra_venta($totales, $table_id, $metodo_pago){

		// calcular el numero de ticket aqui
		return $this->venta->cobra_venta($totales, $table_id, $metodo_pago);
	}
}

?>