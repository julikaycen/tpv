<?php
    require_once 'app/Controllers/ProductCategoryController.php'; // nombre del archivo
    use app\Controllers\ProductCategoryController; // nombre del objeto o clase

    $cat = new ProductCategoryController();
    $cats = $cat->index();

    
?>


<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>diseño tpv</title>
</head>

<body>
        
        <ul>
            <?php foreach($cats as $cat):?>
                
                    <li style="background-color: green; display:inline-block; width:100px; color:white; 
                        text-align: center; border: 10px solid green;">
                        nombre: <?=$cat['nombre'];?>
                    </li>
                                
                
            <?php endforeach;?>
        </ul>
    

</body>

</html>


