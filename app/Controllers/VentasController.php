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

	public function index(){

		return $this->venta->index();
	}
}

?>