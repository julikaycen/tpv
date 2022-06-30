<?php

namespace app\Controllers; // ruta carpeta
//
require_once 'app/Models/Venta.php'; // archivo
use app\Models\Venta; // modelo - objeto




class VentasController {

	protected $venta;
    protected $show;
	protected $productos_venta;
	//protected $date_time;

	public function __construct(){  

		$this->venta = new Venta();
		$this->show = new Venta();
		$this->productos_venta = new Venta();
	}

	public function index($fecha,$mesa){
		return $this->venta->index($fecha,$mesa);
	}

	public function show($datos_venta){
		return $this->venta->show($datos_venta);
	}

	public function productos_venta($venta_id){
		return $this->venta->productos_venta($venta_id);
	}
}

?>