<?php

namespace app\Controllers;
//
require_once 'app/Models/Producto.php'; // archivo
use app\Models\Producto; // modelo


class ProductoController{

    protected $producto;
    

	public function __construct(){  

		$this->producto = new Producto();
	}

	public function index($categ){
		return $this->producto->index($categ);
	}
    



}
?>