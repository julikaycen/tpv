<?php

namespace app\Controllers; // ruta carpeta
//
require_once 'app/Models/Ticket.php'; // archivo
use app\Models\Ticket; // modelo - objeto

class TicketsController {

	protected $ticket;
    protected $precio;
	protected $total;
	//

	public function __construct(){  

		$this->ticket = new Ticket();
		$this->precio = new Ticket();
		$this->total = new Ticket();
	}

	public function index($mesaID){
		return $this->ticket->index($mesaID);
	}
	public function get_prize($mesaID){
		return $this->precio->get_prize($mesaID);
	}
	public function get_total($mesaID){
		return $this->total->get_total($mesaID);
	}
}

?>