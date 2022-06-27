<?php

namespace app\Controllers; // ruta carpeta
//
require_once 'app/Models/Ticket.php'; // archivo
use app\Models\Ticket; // modelo - objeto

class TicketsController {

	protected $ticket;
    protected $precio;
	protected $total;

	public function __construct(){  

		$this->ticket = new Ticket();
		$this->precio = new Ticket();
		$this->total = new Ticket();
	}

	public function index(){
		return $this->ticket->index();
	}
	public function get_prize(){
		return $this->precio->get_prize();
	}
	public function get_total(){
		return $this->total->get_total();
	}
}

?>