<?php

namespace app\Controllers; // ruta carpeta
//
require_once 'app/Models/Table.php'; // archivo
use app\Models\Table; // modelo - objeto

class TableController {

	protected $table;
    

	public function __construct(){  

		$this->table = new Table();
	}

	public function index(){
		return $this->table->index();
	}

	public function updateState($table_id,$state){
		
		return $this->table->updateState($table_id,$state);
	}

	public function store($id,$numero,$ubicacion,$pax){
		
		return $this->table->store($id,$numero,$ubicacion,$pax);
	}

	public function show($id){
		
		return $this->table->show($id);
	}

	public function delete($id){
		
		return $this->table->delete($id);
	}

	// examen - se crea la funcion necesaria con un parametro que usaremos para obtener el parametro del filtro(terraza, interna o todas)
	public function filtra_ubicacion($id)
	{
		return $this->table->filtra_ubicacion($id);
	}


	
}

?>