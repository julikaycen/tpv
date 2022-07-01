<?php

namespace app\Controllers; // ruta carpeta
//
require_once 'app/Models/Venta.php'; // archivo
use app\Models\Venta; // modelo - objeto




class VentasController {

	protected $venta;
    protected $show;
	protected $productos_venta;
	protected $tickets_ingresos;

	public function __construct(){  

		$this->venta = new Venta();
		$this->show = new Venta();
		$this->productos_venta = new Venta();
		$this->tickets_ingresos = new Venta();
		$this->media_martes = new Venta();
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
}

?>