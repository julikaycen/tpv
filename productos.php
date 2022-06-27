<?php
    require_once 'app/Controllers/ProductoController.php'; // nombre del archivo
    use app\Controllers\ProductoController; // nombre del objeto o clase

    $cat = new ProductoController();
    $cats = $cat->index($_GET['categoria_id']);

   
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
                    <h2 class="text-center">TAPAS</h2>
                    <div class="row">
                        <div class="col">
                            <ol class="breadcrumb mb-0 mt-3">
                                <li class="breadcrumb-item"><a href="mesas.php?mesa=<?php echo $_GET['mesa'];?>"><span><i class="icon ion-android-home me-2"></i>INICIO</span></a></li>
                                <li class="breadcrumb-item"><a href="categorias.php?categoria_id=<?php echo $_GET['categoria_id'];?>&mesa=<?php echo $_GET['mesa'];?>"><span><i class="icon ion-social-buffer-outline me-2"></i>Categoría</span></a></li>
                                <li class="breadcrumb-item active" aria-current="page"><span><i class="icon ion-android-apps me-2"></i>Tapas</span></li>
                            </ol>
                        </div>
                    </div>
                    <div class="row mb-5">
                    <?php foreach($cats as $cat):?>
                        <div class="col-6 col-md-4 gy-4"><a class="btn g-4 w-100 shadow cat-prod rounded-0 p-0" role="button" href="#medidas" data-bs-toggle="modal"><img src="<?=$cat['imagen_url'];?>"></a>
                            <h5 class="text-center mb-0"><?=$cat['nombre'];?></h5>
                        </div>
                    <?php endforeach;?>
                        <!-- <div class="col-6 col-md-4 gy-4"><a class="btn g-4 w-100 shadow cat-prod rounded-0 p-0" role="button" href="#medidas" data-bs-toggle="modal"><img src="assets/img/ensaladilla.jpeg"></a>
                            <h5 class="text-center mb-0">Ensaladilla</h5>
                        </div>
                        <div class="col-6 col-md-4 gy-4"><a class="btn g-4 w-100 shadow cat-prod rounded-0 p-0" role="button" href="#medidas" data-bs-toggle="modal"><img src="assets/img/albondigas.jpeg"></a>
                            <h5 class="text-center mb-0">Albondigas</h5>
                        </div>
                        <div class="col-6 col-md-4 gy-4"><a class="btn g-4 w-100 shadow cat-prod rounded-0 p-0" role="button" href="#medidas" data-bs-toggle="modal"><img src="assets/img/calamar-romana.jpeg"></a>
                            <h5 class="text-center mb-0">Calamar romana</h5>
                        </div>
                        <div class="col-6 col-md-4 gy-4"><a class="btn g-4 w-100 shadow cat-prod rounded-0 p-0" role="button" href="#medidas" data-bs-toggle="modal"><img src="assets/img/callos.jpeg"></a>
                            <h5 class="text-center mb-0">Callos madrileña</h5>
                        </div>
                        <div class="col-6 col-md-4 gy-4"><a class="btn g-4 w-100 shadow cat-prod rounded-0 p-0" role="button" href="#medidas" data-bs-toggle="modal"><img src="assets/img/carne-en-salsa.jpeg"></a>
                            <h5 class="text-center mb-0">Carne en salsa</h5>
                        </div>
                        <div class="col-6 col-md-4 gy-4"><a class="btn g-4 w-100 shadow cat-prod rounded-0 p-0" role="button" href="#medidas" data-bs-toggle="modal"><img src="assets/img/champiñones.jpeg"></a>
                            <h5 class="text-center mb-0">Champiñones</h5>
                        </div>
                        <div class="col-6 col-md-4 gy-4"><a class="btn g-4 w-100 shadow cat-prod rounded-0 p-0" role="button" href="#medidas" data-bs-toggle="modal"><img src="assets/img/chipirones.jpeg"></a>
                            <h5 class="text-center mb-0">Chipirones</h5>
                        </div>
                        <div class="col-6 col-md-4 gy-4"><a class="btn g-4 w-100 shadow cat-prod rounded-0 p-0" role="button" href="#medidas" data-bs-toggle="modal"><img src="assets/img/mejillones.jpeg"></a>
                            <h5 class="text-center mb-0">Mejillones</h5>
                        </div>
                        <div class="col-6 col-md-4 gy-4"><a class="btn g-4 w-100 shadow cat-prod rounded-0 p-0" role="button" href="#medidas" data-bs-toggle="modal"><img src="assets/img/patatas-alioli.jpeg"></a>
                            <h5 class="text-center mb-0">Patatas alioli</h5>
                        </div>
                        <div class="col-6 col-md-4 gy-4"><a class="btn g-4 w-100 shadow cat-prod rounded-0 p-0" role="button" href="#medidas" data-bs-toggle="modal"><img src="assets/img/picapica.jpeg"></a>
                            <h5 class="text-center mb-0">Pica-pica</h5>
                        </div>
                        <div class="col-6 col-md-4 gy-4"><a class="btn g-4 w-100 shadow cat-prod rounded-0 p-0" role="button" href="#medidas" data-bs-toggle="modal"><img src="assets/img/patatas-bravas.jpeg"></a>
                            <h5 class="text-center mb-0">Patatas bravas</h5>
                        </div> -->
                    </div>
                </section>
            </div>
            
            <?php include('tickets.php') ?>

        </div>
    </div>
    <div class="modal fade" role="dialog" tabindex="-1" id="medidas">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4>Tamaño Nombre del producto</h4><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row align-items-center flex-column">
                        <div class="col-6 d-lg-flex m-2"><button class="btn btn-primary w-100" type="button">PEQUEÑO</button></div>
                        <div class="col-6 d-lg-flex m-2"><button class="btn btn-success w-100" type="button">MEDIANO</button></div>
                        <div class="col-6 d-lg-flex m-2"><button class="btn btn-danger w-100" type="button">GRANDE</button></div>
                    </div>
                </div>
                <div class="modal-footer"><button class="btn btn-light" type="button" data-bs-dismiss="modal">Close</button></div>
            </div>
        </div>
    </div>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>