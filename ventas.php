<?php
    require_once 'app/Controllers/VentasController.php'; // nombre del archivo
    use app\Controllers\VentasController; // nombre del objeto o clase

    $venta = new VentasController();
    $ventas = $venta->index();

    
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>diseño tpv</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/Abel.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="assets/fonts/line-awesome.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center mt-3 border titular">TPV</h1>
            </div>
            <div class="col-12 col-lg-7 col-xl-8 order-lg-1 mt-5">

            
                <section>
                    
                    <h2 class="text-center">VENTA <?php if(isset($_GET['venta'])):?><?php echo $_GET['ticket_big'];?><?php endif;?></h2>
                    

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Datos de la venta</h5>
                                    <p class="card-text">
                                        
                                            <strong>Mesa:</strong><?php if(isset($_GET['venta'])):?><?php echo $_GET['mesa'];?><?php endif;?><br>
                                            <strong>Método de pago: <?php if(isset($_GET['venta'])):?><?php echo $_GET['met_pag'];?><?php endif;?></strong><br>
                                            <strong>Total base:</strong> <?php if(isset($_GET['venta'])):?><?php echo $_GET['p_base'];?><?php endif;?> €<br>
                                            <strong>Total IVA:</strong> <?php if(isset($_GET['venta'])):?><?php echo $_GET['p_iva'];?><?php endif;?> €<br>
                                            <strong>Total:</strong> <?php if(isset($_GET['venta'])):?><?php echo $_GET['p_total'];?><?php endif;?> €
                                        
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            
            </div>

            <div class="col-12 col-lg-5 col-xl-4 mt-5">
                <aside>
                    <h2 class="text-center">VENTAS</h2>

                    <div class="list-group">
                        <?php foreach($ventas as $venta):?> 
                            <?php if(isset($_GET['venta']) && $_GET['venta'] == $venta['id']):?>
                                <a class="sale-item list-group-item list-group-item-action active" href="ventas.php?venta=<?php echo $venta['id'];?>&mesa=<?php echo $venta['mesa_id'];?>&ticket_big=<?php echo $venta['numero_ticket'];?>&met_pag=<?php echo $venta['metodo_pago_id'];?>&p_base=<?php echo $venta['precio_total_base'];?>&p_iva=<?php echo $venta['precio_total_iva'];?>&p_total=<?php echo $venta['precio_total'];?>" aria-current="true">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h5 class="mb-1">Ticket: <?php echo $venta['numero_ticket'];?></h5>
                                        <small>Hora: <?php echo $venta['hora_emision'];?></small>
                                        <small>Mesa: <?php echo $venta['mesa_id'];?></small>
                                    </div>
                                    <p class="mb-1"><?php echo $venta['precio_total'];?> €</p>
                                </a>
                            <?php else:?>    
                                <a class="sale-item list-group-item list-group-item-action " href="ventas.php?venta=<?php echo $venta['id'];?>&mesa=<?php echo $venta['mesa_id'];?>&ticket_big=<?php echo $venta['numero_ticket'];?>&met_pag=<?php echo $venta['metodo_pago_id'];?>&p_base=<?php echo $venta['precio_total_base'];?>&p_iva=<?php echo $venta['precio_total_iva'];?>&p_total=<?php echo $venta['precio_total'];?>" aria-current="true">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h5 class="mb-1">Ticket: <?php echo $venta['numero_ticket'];?></h5>
                                        <small>Hora: <?php echo $venta['hora_emision'];?></small>
                                        <small>Mesa: <?php echo $venta['mesa_id'];?></small>
                                    </div>
                                    <p class="mb-1"><?php echo $venta['precio_total'];?> €</p>
                                </a>
                            <?php endif;?>
                        <?php endforeach;?>    
                        <!-- <a class="sale-item list-group-item list-group-item-action" href="ventas.php?venta=2" aria-current="true">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1">Ticket: 202206280002</h5>
                                <small>Hora:  17:58</small>
                                <small>Mesa: 1</small>
                            </div>
                            <p class="mb-1">30 €</p>
                        </a>

                        <a class="sale-item list-group-item list-group-item-action" href="ventas.php?venta=3" aria-current="true">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1">Ticket: 202206280003</h5>
                                <small>Hora: 18:00</small>
                                <small>Mesa: 3</small>
                            </div>
                            <p class="mb-1">72 €</p>
                        </a> -->
                    </div>
                </aside>
            </div>

        </div>
    </div>

    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>