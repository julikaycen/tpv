<?php

namespace app\Controllers; // ruta carpeta
//
require_once 'app/Models/Iva.php'; // archivo
use app\Models\Iva; // clase

class ivaController {

	protected $iva;

	public function __construct(){  

		$this->iva = new Iva();
	}

	public function index(){
		return $this->iva->index();
	}

	// public function updateState($iva_id,$state){
		
	// 	return $this->iva->updateState($iva_id,$state);
	// }

	public function store($tipo,$multp){
		
		return $this->iva->store($tipo,$multp);
	}

	// public function show($id){
		
	// 	return $this->iva->show($id);
	// }

	// public function delete($id){
		
	// 	return $this->iva->delete($id);
	// }


	
}

?>