<?php
    require_once 'app/Controllers/TicketsController.php'; // nombre del archivo
    use app\Controllers\TicketsController; // nombre del objeto o clase
    
    $ticket = new TicketsController();
    $tickets = $ticket->index();

    $precio = new TicketsController();
    $precios = $precio->get_prize();

    $total = new TicketsController();
    $totales = $total->get_total();
    
    
?>


<div class="col-12 col-lg-5 col-xl-4 mt-5">
    <aside>
        <h2 class="text-center">TICKET MESA <?php echo $num_mesa = isset($_GET['mesa']) ? $_GET['mesa'] : "-";?></h2>
        <ul class="list-group shadow mt-4">

        
            <?php foreach($tickets as $ticket):?> 
                <?php if(isset($_GET['mesa'])):?>
                <li class="list-group-item d-flex align-items-center"><button class="btn btn-light btn-sm me-2" type="button"><i class="la la-close"></i></button><img class="img-ticket" src="<?=$ticket['pro_img'];?>">
                    <div class="flex-grow-1"><span class="categoria-prod"><?=$ticket['categoria'];?></span>
                        <h4 class="nombre-prod mb-0"><?=$ticket['pro_nombre'];?></h4>
                    </div>
                    <p class="precio-prod"><?=$ticket['precio_pro'];?></p>
                </li>
                <?php endif;?>
            <?php endforeach;?>
        
            <!-- <li class="list-group-item d-flex align-items-center"><button class="btn btn-light btn-sm me-2" type="button"><i class="la la-close"></i></button><img class="img-ticket" src="assets/img/heineken.jpeg">
                <div class="flex-grow-1"><span class="categoria-prod">Bebida alcohólica</span>
                    <h4 class="nombre-prod mb-0">Cerveza Heineken</h4><span class="medida-prod">33 ml.</span>
                </div>
                <p class="precio-prod">3.50 €</p>
            </li>
            <li class="list-group-item d-flex align-items-center"><button class="btn btn-light btn-sm me-2" type="button"><i class="la la-close"></i></button><img class="img-ticket" src="assets/img/nestea.jpeg">
                <div class="flex-grow-1"><span class="categoria-prod">Refrescos</span>
                    <h4 class="nombre-prod mb-0">Nestea</h4><span class="medida-prod">33 ml.</span>
                </div>
                <p class="precio-prod">2.90 €</p>
            </li>
            <li class="list-group-item d-flex align-items-center"><button class="btn btn-light btn-sm me-2" type="button"><i class="la la-close"></i></button><img class="img-ticket" src="assets/img/patatilla-jamon.jpeg">
                <div class="flex-grow-1"><span class="categoria-prod">Aperitivos</span>
                    <h4 class="nombre-prod mb-0">Bolsa patatilla sabor jamón</h4><span class="medida-prod">150 gr.</span>
                </div>
                <p class="precio-prod">3.00 €</p>
            </li>
            <li class="list-group-item d-flex align-items-center"><button class="btn btn-light btn-sm me-2" type="button"><i class="la la-close"></i></button><img class="img-ticket" src="assets/img/copa-vino.jpeg">
                <div class="flex-grow-1"><span class="categoria-prod">Bebida alcohólica</span>
                    <h4 class="nombre-prod mb-0">Copa de vino</h4><span class="medida-prod">20 ml.</span>
                </div>
                <p class="precio-prod">4.50 €</p>
            </li>
            <li class="list-group-item d-flex align-items-center"><button class="btn btn-light btn-sm me-2" type="button"><i class="la la-close"></i></button><img class="img-ticket shadow-sm" src="assets/img/cocacola.png">
                <div class="flex-grow-1"><span class="categoria-prod">Refrescos</span>
                    <h4 class="nombre-prod mb-0">Coca-Cola</h4><span class="medida-prod">20 ml.</span>
                </div>
                <p class="precio-prod">3.50 €</p>
            </li>
            <li class="list-group-item d-flex align-items-center"><button class="btn btn-light btn-sm me-2" type="button"><i class="la la-close"></i></button><img class="img-ticket" src="assets/img/cafe-con-leche.jpeg">
                <div class="flex-grow-1"><span class="categoria-prod">Bebida caliente</span>
                    <h4 class="nombre-prod mb-0">Café con leche</h4><span class="medida-prod">25 ml.</span>
                </div>
                <p class="precio-prod">2.10 €</p>
            </li> -->
        
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
                            <h5 class="text-center text-white mb-0 pb-1"><?=implode($precios[0]);?></h5>
                        </div>
                        <div class="col">
                            <h5 class="text-center text-white mb-0 border-start pb-1">21%</h5>
                        </div>
                        <div class="col">
                            <h5 class="text-center text-white mb-0 bg-dark pb-1"><?=implode($totales[0]);?></h5>
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
                                <div class="modal-footer"><button class="btn btn-light" type="button" data-bs-dismiss="modal">CERRAR</button><button class="btn btn-success" type="button">ELIMINAR</button></div>
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
                                        <div class="col-6 d-lg-flex m-2"><button class="btn btn-primary w-100" type="button">EFECTIVO</button></div>
                                        <div class="col-6 d-lg-flex m-2"><button class="btn btn-success w-100" type="button">TARJETA CRÉDITO</button></div>
                                        <div class="col-6 d-lg-flex m-2"><button class="btn btn-danger w-100" type="button">BIZUM</button></div>
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