<?php
    require_once 'app/Controllers/TicketsController.php'; // nombre del archivo
    use app\Controllers\TicketsController; // nombre del objeto o clase
    require_once 'app/Controllers/VentasController.php'; // nombre del archivo
    use app\Controllers\VentasController; // nombre del objeto o clase
    
    $ticket = new TicketsController();
    $venta = new VentaSController();

    if(!empty($_GET['mesa'])){
        $tickets = $ticket->index($_GET['mesa']);
        $totales = $ticket->get_total($_GET['mesa']);
        
    }
?>


<div class="col-12 col-lg-5 col-xl-4 mt-5">
    <aside>
        <h2 class="text-center">TICKET MESA <?php echo $num_mesa = isset($_GET['mesa']) ? $_GET['mesa'] : "---";?></h2>
        <ul class="list-group shadow mt-4">

            <?php if(isset($tickets)):?>
                <?php foreach($tickets as $ticket):?> 
                    <li class="list-group-item d-flex align-items-center"><button class="delete-product btn btn-light btn-sm me-2" data-table="<?php echo $_GET['mesa'] ?>" data-ticketid="<?= $ticket['ticket']; ?>"  type="button"><i class="la la-close"></i></button><img class="img-ticket" src="<?=$ticket['pro_img'];?>">
                        <div class="flex-grow-1"><span class="categoria-prod"><?=$ticket['categoria'];?></span>
                            <h4 class="nombre-prod mb-0"><?=$ticket['pro_nombre'];?></h4>
                        </div>
                        <p class="precio-prod"><?=$ticket['precio_pro'];?></p>
                    </li>
                <?php endforeach;?>
            <?php endif;?>
        
            
        
        </ul>
        <div class="row mt-3">
            <div class="col">
                <div class="bg-secondary">
                    <div class="row justify-content-between g-0">
                        <div class="col">
                            <h5 class="text-center text-white mb-0 pt-1">B. Imponible</h5>
                        </div>
                        <div class="col">
                            <h5 class="text-center text-white mb-0 border-start pt-1">IVA</h5>
                        </div>
                        <div class="col">
                            <h5 class="text-center text-white mb-0 bg-dark pt-1">TOTAL</h5>
                        </div>
                    </div>
                    <div class="row justify-content-between g-0">
                        <div class="col">
                            <h5 class="text-center text-white mb-0 pb-1"><?php if(!empty($_GET['mesa'])):?><?php echo $totales['precio']?><?php endif;?></h5>
                        </div>
                        <div class="col">
                            <h5 class="text-center text-white mb-0 border-start pb-1">21%</h5>
                        </div>
                        <div class="col">
                            <h5 class="text-center text-white mb-0 bg-dark pb-1"><?php if(!empty($_GET['mesa'])):?><?php echo $totales['total_final']?><?php endif;?></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3 mb-3">
            <div class="col-6">
                <div><a class="btn btn-danger btn-lg w-100" role="button" href="#myModal" data-bs-toggle="modal">ELIMINAR</a>
                    <div class="modal fade" role="dialog" tabindex="-1" id="myModal">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4>Eliminar ticket</h4><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p class="text-center text-muted">Está a punto de borrar el pedido sin ser cobrado. ¿Está completamente seguro de realizar esta acción?</p>
                                </div>
                                <div class="modal-footer"><button class="btn btn-light" type="button" data-bs-dismiss="modal">CERRAR</button><button class="delete-all btn btn-success" data-table="<?php echo $_GET['mesa'] ?>" type="button">ELIMINAR</button></div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div><a class="btn btn-success btn-lg w-100" role="button" href="#myModal-2" data-bs-toggle="modal">COBRAR</a>
                    <div class="modal fade" role="dialog" tabindex="-1" id="myModal-2">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4>Metodo de pago</h4><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row align-items-center flex-column">
                                        <!-- FORMAS DE PAGO -->
                                        <div class="col-6 d-lg-flex m-2"><button class="cobra-venta btn btn-primary w-100"  data-metodopago = "1" type="button">EFECTIVO</button></div>
                                        <div class="col-6 d-lg-flex m-2"><button class="cobra-venta btn btn-success w-100"  data-metodopago = "2" type="button">TARJETA CRÉDITO</button></div>
                                        <div class="col-6 d-lg-flex m-2"><button class="cobra-venta btn btn-danger w-100"  data-metodopago = "3" type="button">BIZUM</button></div>
                                        <!-- FIN FORMAS DE PAGO -->
                                    </div>
                                </div>
                                <div class="modal-footer"><button class="btn btn-light" type="button" data-bs-dismiss="modal">CERRAR</button></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </aside>
</div>