<?php
    require_once 'app/Controllers/TableController.php'; // nombre del archivo
    use app\Controllers\TableController; // nombre del objeto o clase

    $mesa = new TableController("bienvenido al fantastico mundo de rockman","esta es la otra");
    $mesas = $mesa->index();
    
?>

<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>diseño tpv</title>
</head>

<body>
    <!-- si el estado es 0=ocupado bg red , 1=libre bg green , <li> style bg=red numero de mesa</li>-->
        <!-- <?php echo $mesas;?> -->
        <ul>
            <?php foreach($mesas as $mesa):?>
                <?php if($mesa['estado']==1):?>
                    <li style="background-color: green; display:inline-block; width:100px; height:30px; color:white; 
                        text-align: center; border: 10px solid green;">
                        mesa numero: <?=$mesa['numero'];?> - LIBRE
                    </li>
                <?php endif;?>
                <?php if($mesa['estado']==0):?>
                    <li style="background-color: red; display:inline-block;width:100px; height:30px;
                        text-align: center; border: 10px solid red;">
                        mesa numero: <?=$mesa['numero'];?> - OCUPADA
                    </li>
                <?php endif;?>
                
            <?php endforeach;?>
        </ul>
    

</body>

</html>