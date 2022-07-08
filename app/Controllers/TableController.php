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

	
}

?>