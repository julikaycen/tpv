<?php

    require_once 'app/Controllers/TicketsController.php';
  
    use app\Controllers\TicketsController;

    header("Content-Type: application/json");
    $json = json_decode(file_get_contents('php://input')); // coje todo lo que envia javascript de las llamadas(funcion) FETCH() por metodo POST

    // if(isset($_GET['data'])){
    //     $json = json_decode($_GET['data']);
    // }else{
    //     $json = json_decode(file_get_contents('php://input')); 
    // }

    file_put_contents("fichero.txt", $json->route);

    if(isset($json->route)) {
        // switch($json->route) {

        //     case 'addProduct':

        //         $ticket = new TicketController();

        //         $newProduct = $ticket->addProduct($json->price_id, $json->table_id);

        //         $response = array(
        //             'status' => 'ok',
        //             'newProduct' => $newProduct,
        //         );

        //         echo json_encode($response);

        //         break;
        //     }


    } else {
        echo json_encode(array('error' => 'No action'));
    }    
?>
