<?php

    require_once 'app/Controllers/TicketsController.php';
    require_once 'app/Controllers/TableController.php';
    require_once 'app/Controllers/VentasController.php';
    require_once 'app/Controllers/ivaController.php';
  
    use app\Controllers\TicketsController;
    use app\Controllers\TableController;
    use app\Controllers\VentasController;
    use app\Controllers\ivaController;

    header("Content-Type: application/json");

    if(isset($_GET['data'])){
        $json = json_decode($_GET['data']);
    }else{
        $json = json_decode(file_get_contents('php://input')); // coje todo lo que envia javascript de las llamadas(funcion) FETCH() por metodo POST
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
                $mesa = new TableController();

                $ticket->deleteProduct($json->id);
                $totales = $ticket->get_total($json->table_id);

                if($totales['precio'] == null){
                    $updateMesa = $mesa->updateState($json->table_id, 0);
                }

                $response = array(
                    'status' => 'ok',
                    'totales' => $totales
                );

                echo json_encode($response);

                
                break;
            

            case 'deleteAll':

                $ticket = new TicketsController(); 
                $mesa = new TableController();

                $ticket->deleteAll($json->table_id);
                $totales = $ticket->get_total($json->table_id);

                $updateMesa = $mesa->updateState($json->table_id, 0);
                

                $response = array(
                    'status' => 'ok',
                    'totales' => $totales
                );

                echo json_encode($response);

                
                break;
            

            case 'cobraVenta': // OJO!, id de venta -> actualizar campo venta_id en tabla 'ventas'

                $ticket = new TicketsController(); 
                $mesa = new TableController();
                $venta = new VentasController();

                $totales = $ticket->get_total($json->mesa_id);// los totales los cojo de aqui
                $sale_id = $venta->cobra_venta($totales, $json->mesa_id, $json->metodo_pago);
                $ticket->closeTicket($sale_id, $json->mesa_id );
                $updateMesa = $mesa->updateState($json->mesa_id, 0);

                $response = array(
                    'status' => 'ok'
                );

                echo json_encode($response);

                
                break;
            }

            // crear funciones en controlador y en el modelo
            case 'storeTable': //

                $table = new TableController();
                $new_table = $table->store($json->id, $json->numero, $json->ubicacion, $json->pax); // COINCIDEN CON LOS NAMES DE CADA INPUT
                // &new_venta, $new_produt, etc...

                $response = array(
                    'status' => 'ok',
                    'id' => $json->id, // SOLO TENDRA VALOR SI SE ACTUALIZA
                    'newElement' => $new_table // NUEVO REGISTRO DE LA TABLA MESA
                );

                echo json_encode($response);

                break;
           
            case 'showTable': //

                $table = new TableController();
                $table = $table->show($json->id);

                $response = array(
                    'status' => 'ok',
                    'element' => $table,
                );

                echo json_encode($response);

                break;
           
            case 'deleteTable': //
                $table = new TableController();
                $table->delete($json->id);

                $response = array(
                    'status' => 'ok',
                    'id' => $json->id
                );

                echo json_encode($response);

                break;


            case 'storeIva': //

                $iva = new ivaController();
                $new_iva = $iva->store($json->id, $json->tipo, $json->multiplicador); // COINCIDEN CON LOS NAMES DE CADA INPUT
                // &new_venta, $new_produt, etc...

                $response = array(
                    'status' => 'ok',
                    'id' => $json->id, // SOLO TENDRA VALOR SI SE ACTUALIZA
                    'newElement' => $new_iva // NUEVO REGISTRO DE LA TABLA IVA
                );
    
                echo json_encode($response);
    
                break;                            
    
    
    
    
    
    
    
    
    
    
    
    
    
            } else {
        echo json_encode(array('error' => 'No action'));
    }    
?>
