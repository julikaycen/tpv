<?php
// tareas
    // 1º No hay ningún ticket creado hoy, por lo que se crea uno nuevo
    // con fecha de hoy y empieza por el 0001

    // 2 Si hay un ticket creado hoy, por lo que tengo que añadir uno nuevo
    // con fecha de hoy y empieza por el último ticket creado + 1

    global $tickets;
    $tickets = ['2205290001','2205290002','2205290003'];
    global $fecha_actual_prep;
    $fecha_actual_prep = substr(date("Ymd"),2,6);
    global $contador;
    $contador = 0;
    
    

    // comprobar si hay algun ticket creado hoy
    function comprobar_ticket()
    {
        global $tickets;
        global $fecha_actual_prep;
        echo "fecha actual ".$fecha_actual_prep; echo "<br>";
        //
        $ticket_exist=false;
        foreach($tickets as $ticket)
        {
            $ticket_prep=substr($ticket,0,6);
            if($fecha_actual_prep == $ticket_prep)
            {
                echo "coincide la fecha de un ticket";
                echo "<br>";
                $ticket_exist=true;
            }
            
        }
        if(!$ticket_exist) // checkea si no hay ningun ticket creado hoy
        {
            // crear ticket nuevo
            echo "no hay ningun ticket creado hoy..."; echo "<br>";
            echo "añadir uno nuevo.";  echo "<br>"; 
            add_element();
        }
        if($ticket_exist)
        {
            // crear un ticket actual y sumarle 1
            echo "añadir un ticket nuevo con la fecha de hoy y sumarle uno mas";
            add_element();
        }
            
        
    }

    function add_element()
    {
            global $tickets;
            global $fecha_actual_prep;
            global $contador;
            $contador++;
            array_push($tickets, $fecha_actual_prep.str_pad($contador,4,"0", STR_PAD_LEFT));
            echo "tickets ".var_dump($tickets)." ";
            echo "<br>"; echo "<br>"; 
    }
    comprobar_ticket();
    comprobar_ticket();

    mesas.php?mesa=<?php echo $_GET['mesa'];?>
    ?categoria_id=<?php echo $_GET['categoria_id'];?>
    <?=$ticket['precio_id'];?>
    
    tickets.mesa_id AS mesa,
    INNER JOIN
                productos ON productos.categoria_id = productos_catgorias.id

                WHERE productos.visible=1

    <?php foreach($kats as $kat):?>
    

    
    

?>