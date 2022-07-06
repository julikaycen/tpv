<?php

namespace app\Controllers; // ruta carpeta
//
require_once 'app/Models/Ticket.php'; // archivo
use app\Models\Ticket; // modelo - objeto

class TicketsController {

	protected $ticket;
    
	//

	public function __construct(){  

		$this->ticket = new Ticket();
	}

	public function index($mesaID){
		return $this->ticket->index($mesaID);
	}
	public function get_prize($mesaID){
		return $this->ticket->get_prize($mesaID);
	}
	public function get_total($mesaID){
		return $this->ticket->get_total($mesaID);
	}
	public function addProduct($price_id, $table_id){
		return $this->ticket->addProduct($price_id, $table_id);
	}
	public function deleteProduct($ticket_id){
		return $this->ticket->deleteProduct($ticket_id);
	}
}

?>