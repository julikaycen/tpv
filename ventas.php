<?php
    require_once 'app/Controllers/VentasController.php'; // nombre del archivo
    require_once 'app/Controllers/TableController.php';
    use app\Controllers\VentasController; // nombre del objeto o clase
    use app\Controllers\TableController;

    $venta = new VentasController();
    $table = new TableController();

    $table_numbers = $table->index();

    if(!empty($_GET['fecha']) || !empty($_GET['mesa'])){
        $ventas = $venta->index($_GET['fecha'],$_GET['mesa'],date("Y-m-d"));
    }
       
    if(!empty($_GET['venta'])){
        $detalles = $venta->show($_GET['venta']);
        $productos = $venta->productos_venta($_GET['venta']);
    }
    
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
                    
                    <h2 class="text-center">VENTA <?php if(isset($_GET['venta'])):?><?php echo $detalles['numero_ticket'];?><?php endif;?></h2>
                    
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Datos de la venta</h5>
                                    <p class="card-text">
                                        
                                        <strong>Mesa:</strong><?php if(isset($_GET['venta'])):?><?php echo $detalles['mesa_id'];?><?php endif;?><br>
                                        <strong>Método de pago: <?php if(isset($_GET['venta'])):?><?php echo $detalles['_metodo_pago'];?><?php endif;?></strong><br>
                                        <strong>Total base:</strong> <?php if(isset($_GET['venta'])):?><?php echo $detalles['precio_total_base'];?><?php endif;?> €<br>
                                        <strong>Total IVA:</strong> <?php if(isset($_GET['venta'])):?><?php echo $detalles['precio_total_iva'];?><?php endif;?> €<br>
                                        <strong>Total:</strong> <?php if(isset($_GET['venta'])):?><?php echo $detalles['precio_total'];?><?php endif;?> €
                                        
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php if(isset($productos)):?>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="text-center"scope="col"></th>
                                    <th class="text-center" scope="col">Nombre</th>
                                    <th class="text-center" scope="col">Precio Base</th>
                                    <th class="text-center" scope="col">Cantidad</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($productos as $producto):?>
                                    <tr>
                                        <td class="text-center"><img class="img-ticket" src="<?=$producto['imagen_url'];?>"></td>
                                        <td class="text-center"><?php if(isset($_GET['venta'])):?><?php echo $producto['nombre_producto'];?><?php endif;?></td>
                                        <td class="text-center"><?php echo $producto['precio_base'];?> €</td>
                                        <td class="text-center"><?php echo $producto['cantidad'];?></td>
                                    </tr>
                                <?php endforeach;?>
                            </tbody>    
                        </table>
                    <?php endif;?>
                </section>
            
            </div>

            <div class="col-12 col-lg-5 col-xl-4 mt-5">
                <aside>
                    <h2 class="text-center">VENTAS</h2>


                <!-- formulario filtro -->
                    <form action="ventas.php" method="GET">

                        <div class="row mt-3 mb-3">
                            <div class="col-6">
                                <p>Filtrar por fecha:</p>
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <input type="date" name="fecha" value="" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="row mt-3 mb-3">
                            <div class="col-6">
                                <p>Filtrar por mesa:</p>
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <select name="mesa" class="form-control">
                                        <option value="">Todas</option>
                                        <?php foreach($table_numbers as $table_number):?>
                                            <option value="<?= $table_number['numero']?>" <?= $table_number['numero']?>><?= $table_number['numero']?></option>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- BOTON -->
                        <div class="row mt-3 mb-3">
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary w-100">Filtrar</button>
                            </div>
                        </div>

                    </form>
                    <!-- fin del formulario filtro -->


                    <div class="list-group">
                    <?php if(!empty($_GET['fecha']) || !empty($_GET['mesa'])):?>
                        <?php foreach($ventas as $venta):?> 
                            <?php if(isset($_GET['venta']) && $_GET['venta'] == $venta['id']):?>
                                <a class="sale-item list-group-item list-group-item-action active" href="ventas.php?venta=<?php echo $venta['id'];?>" aria-current="true">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h5 class="mb-1">Ticket: <?php echo $venta['numero_ticket'];?></h5>
                                        <small>Hora: <?php echo $venta['hora_emision'];?></small>
                                        <small>Mesa: <?php echo $venta['mesa_id'];?></small>
                                    </div>
                                    <p class="mb-1"><?php echo $venta['precio_total'];?> €</p>
                                </a>
                            <?php else:?>    
                                <a class="sale-item list-group-item list-group-item-action " href="ventas.php?venta=<?php echo $venta['id'];?>" aria-current="true">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h5 class="mb-1">Ticket: <?php echo $venta['numero_ticket'];?></h5>
                                        <small>Hora: <?php echo $venta['hora_emision'];?></small>
                                        <small>Mesa: <?php echo $venta['mesa_id'];?></small>
                                    </div>
                                    <p class="mb-1"><?php echo $venta['precio_total'];?> €</p>
                                </a>
                            <?php endif;?>
                        <?php endforeach;?>    
                    <?php endif;?>
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

                        <!-- PRECIO TOTAL TICKETS DEL DIA -->
                    <div class="row mt-3">
                        <div class="col">
                            <div class="bg-secondary" id="refresh-price">
                                <div class="row justify-content-between g-0">
                                    <div class="col">
                                        <h5 class="text-center text-white mb-0 pt-1">Total Ingresos</h5>
                                    </div>
                                    <div class="col">
                                        <h5 class="text-center text-white mb-0 pt-1">Media del día</h5>
                                    </div>
                                    <div class="row justify-content-between g-0">
                                        <div class="col">
                                            <h5 class="text-center text-white mb-0 pb-1">
                                                <?php if(isset($total_ticket['base_imponible']) && $total_ticket['base_imponible'] != null): ?>
                                                    <?= $total_ticket['base_imponible']; ?> €
                                                <?php else: ?>
                                                    0 €
                                                <?php endif; ?>
                                            </h5>
                                        </div>
                                        <div class="col">
                                            <h5 class="text-center text-white mb-0 border-start pb-1">
                                                <?php if(isset($total_ticket['iva']) && $total_ticket['iva'] != null): ?>
                                                    <?= $total_ticket['rest']; ?> €
                                                <?php else: ?>
                                                    0 €
                                                <?php endif; ?>
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- FIN PRECIO TOTAL TICKETS -->


                    </div>

                </aside>
            </div>

        </div>
    </div>


    


    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>