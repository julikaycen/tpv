<?php

    require_once 'app/Controllers/TicketsController.php';
    require_once 'app/Controllers/TableController.php';
    require_once 'app/Controllers/VentasController.php';
  
    use app\Controllers\TicketsController;
    use app\Controllers\TableController;
    use app\Controllers\VentasController;


    header("Content-Type: application/json");
    $json = json_decode(file_get_contents('php://input')); // coje todo lo que envia javascript de las llamadas(funcion) FETCH() por metodo POST

    if(isset($_GET['data'])){
        $json = json_decode($_GET['data']);
    }else{
        $json = json_decode(file_get_contents('php://input')); 
    }
    

    if(isset($json->route)) {
        switch($json->route) {

            case 'addProduct':

                $ticket = new TicketsController();
                $mesa = new TableController();
                $venta = new VentasController();

                $newProduct = $ticket->addProduct($json->price_id, $json->table_id);
                $updateMesa = $mesa->updateState($json->table_id, 1);
                $totales = $ticket->get_total($json->table_id);
                

                $response = array(
                    'status' => 'ok', // siempre se pone para indicar que esta todo ok
                    'newProduct' => $newProduct,
                    'updateMesa' => $updateMesa,
                    'totales' => $totales
                );

                echo json_encode($response);

                break;

            case 'deleteProduct':

                $ticket = new TicketsController();
                //$mesa = new TableController();
                //$venta = new VentasController();

                $productoBorrado = $ticket->deleteProduct($json->ticket_id);
                //$updateMesa = $mesa->updateState($json->table_id, 1);
                //$totales = $ticket->get_total($json->table_id);
                

                $response = array(
                    'status' => 'ok',
                    'productoBorrado' => $productoBorrado
                    
                );

                echo json_encode($response);

                break;
            }


    } else {
        echo json_encode(array('error' => 'No action'));
    }    
?>
