<?php
    require_once 'app/Controllers/TableController.php'; // nombre del archivo
    use app\Controllers\TableController; // nombre del objeto o clase

    $mesa = new TableController();
    $mesas = $mesa->index();

    
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
                    <h2 class="text-center">MESAS</h2>
                    <div class="row mb-5">
                                        
                    <?php foreach($mesas as $mesa):?> 
                        <?php if(isset($_GET['mesa']) && ($mesa['id'] == $_GET['mesa'])):?>
                            <div class="col-4 gy-4"><a class="btn btn-primary g-4 w-100 p-4 p-sm-5 shadow-sm mesas rounded-0" role="button" href="categorias.php?mesa=<?php echo $mesa['id'];?>"><?=$mesa['numero'];?></a></div> 
                        <?php elseif($mesa['estado']==1):?>
                            <div class="col-4 gy-4"><a class="btn btn-danger g-4 w-100 p-4 p-sm-5 shadow-sm mesas rounded-0" role="button" href="categorias.php?mesa=<?php echo $mesa['id'];?>"><?=$mesa['numero'];?></a></div>
                        <?php else:?>
                            <div class="col-4 gy-4"><a class="btn btn-success g-4 w-100 p-4 p-sm-5 shadow-sm mesas rounded-0" role="button" href="categorias.php?mesa=<?php echo $mesa['id'];?>"><?=$mesa['numero'];?></a></div>
                    <?php endif;?>
                        <!-- <div class="col-4 gy-4"><a class="btn btn-success w-100 p-4 p-sm-5 shadow-sm mesas rounded-0" role="button" href="categorias.html">2</a></div>
                        <div class="col-4 gy-4"><a class="btn btn-success w-100 p-4 p-sm-5 shadow-sm mesas rounded-0" role="button" href="categorias.html">3</a></div>
                        <div class="col-4 gy-4"><a class="btn btn-success w-100 p-4 p-sm-5 shadow-sm mesas rounded-0" role="button" href="categorias.html">4</a></div>
                        <div class="col-4 gy-4"><a class="btn btn-success w-100 p-4 p-sm-5 shadow-sm mesas rounded-0" role="button" href="categorias.html">5</a></div>
                        <div class="col-4 gy-4"><a class="btn btn-danger w-100 p-4 p-sm-5 shadow-sm mesas rounded-0" role="button" href="categorias.html">6</a></div>
                        <div class="col-4 gy-4"><a class="btn btn-success w-100 p-4 p-sm-5 shadow-sm mesas rounded-0" role="button" href="categorias.html">7</a></div>
                        <div class="col-4 gy-4"><a class="btn btn-danger w-100 p-4 p-sm-5 shadow-sm mesas rounded-0" role="button" href="categorias.html">8</a></div>
                        <div class="col-4 gy-4"><a class="btn btn-success w-100 p-4 p-sm-5 shadow-sm mesas rounded-0" role="button" href="categorias.html">9</a></div> -->
                    <?php endforeach;?>    
                    </div>
                </section>
            </div>
            
            <?php include('tickets.php') ?>
        </div>
    </div>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>