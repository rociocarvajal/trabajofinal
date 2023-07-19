<?php

// Funcion que carga datos a un array.

 function dataGame(){
 
    $games[0] = array (
        "juego" => 'Mario Bross',
        "precioTicket" => 150,
        "cantTickets" => 36
    );
    $games[1] = array (
        "juego" => 'Tetris',
        "precioTicket" => 160,
        "cantTickets" => 69
    );
    $games[2] = array (
        "juego" => 'Donkey Kong',
        "precioTicket" => 140,
        "cantTickets" => 93
    );
    $games[3] = array (
        "juego" => 'Pac-Man',
        "precioTicket" => 133,
        "cantTickets" => 36
    );
    $games[4] = array (
        "juego" => 'Mortal-Kombat',
        "precioTicket" => 100,
        "cantTickets" => 69
    );

    $games[5] = array (
        "juego" => 'Calesita',
        "precioTicket" => 333,
        "cantTickets" => 25
    );

    $games[6] = array (
        "juego" => 'Montaña Rusa',
        "precioTicket" => 400,
        "cantTickets" => 77
    );

    $games[7] = array (
        "juego" => 'Autitos Chocadores',
        "precioTicket" => 500,
        "cantTickets" => 100
    );

    $games[8] = array (
        "juego" => 'Pelotero',
        "precioTicket" => 110,
        "cantTickets" => 45
    );

    $games[9] = array (
        "juego" => 'Sillas voladoras',
        "precioTicket" => 1000,
        "cantTickets" => 60
    );

    $games[10] = array (
        "juego" => 'Barco',
        "precioTicket" => 1500,
        "cantTickets" => 36
    );

    $games[11] = array (
        "juego" => 'Gusano Loco',
        "precioTicket" => 369,
        "cantTickets" => 39

    );

    return $games;
}

// Funcion que carga array con meses y monto

function montoMensual ($games){
    $tickets[0] = array (
        "mes" => 'enero',
        "monto" => $games[0]["precioTicket"] * $games[0]["cantTickets"]
    );
    $tickets[1] = array (
        "mes" => 'febrero',
        "monto" => $games[1]["precioTicket"] * $games[1]["cantTickets"]
        
    );
    $tickets[2] = array (
        "mes" => 'marzo',
        "monto" => $games[2]["precioTicket"] * $games[2]["cantTickets"]
        
    );
    $tickets[3] = array (
        "mes" => 'abril',
        "monto" => $games[3]["precioTicket"] * $games[3]["cantTickets"]
        
    );
    $tickets[4] = array (
        "mes" => 'mayo',
        "monto" => $games[4]["precioTicket"] * $games[4]["cantTickets"]
        
    );
    $tickets[5] = array (
        "mes" => 'junio',
        "monto" => $games[5]["precioTicket"] * $games[5]["cantTickets"]
        
    );
    $tickets[6] = array (
        "mes" => 'julio',
        "monto" => $games[6]["precioTicket"] * $games[6]["cantTickets"]
        
    );
    $tickets[7] = array (
        "mes" => 'agosto',
        "monto" => $games[7]["precioTicket"] * $games[7]["cantTickets"]
        
    );
    $tickets[8] = array (
        "mes" => 'septiembre',
        "monto" => $games[8]["precioTicket"] * $games[8]["cantTickets"]
        
    );
    $tickets[9] = array (
        "mes" => 'octubre',
        "monto" => $games[9]["precioTicket"] * $games[9]["cantTickets"]
        
    );
    $tickets[10] = array (
        "mes" => 'noviembre',
        "monto" => $games[10]["precioTicket"] * $games[10]["cantTickets"]
        
    );
    $tickets[11] = array (
        "mes" => 'diciembre',
        "monto" => $games[11]["precioTicket"] * $games[11]["cantTickets"]
        
    );
    return $tickets;
   
}

// Funcion que segun el nombre del mes, devuelve el indice de este

function numberIndex($tickets, $mes) {
    $n = count($tickets);
    $index = 0;
    $found = false;
    while ($index < $n && $found == false) {
        if ($tickets[$index]["mes"] == $mes) {
            $index = $index;
            $found = true;
        } else {
            $index++;
        }    
    } return $index;
}

// Funcion que segun el indice del mes, retorne el nombre de este

function nameMonth($tickets, $index) {
    $namemonth = $tickets[$index]["mes"];
    return $namemonth;
}

// Función que valida el nombre del mes

function validarMes($tickets, $mes) {
    $n = 0;
    for ($i=0; $i < 12 ; $i++) { 
        if ($tickets[$i]["mes"] == $mes) {
            $n = $n + 150;
        } else {
            $n = $n + 1;
        }
    }
    return $n;   
}

// Funcion que muestra menu

function menu() {
    echo "1) Ingrese una venta.\n";
    echo "2) Mes con mayor monto de ventas.\n";
    echo "3) Primer mes que supera un monto de ventas.\n";
    echo "4) Información de un mes.\n";
    echo "5) Juegos más vendidos ordenados.\n";
    echo "0) Salir del menú.\n";
    echo "Ingrese su opcion: ";
    $option = trim(fgets(STDIN));
    return $option;
}


//Funcion que actualiza los datos

function actulizarDatos ($games, $index, $namegame, $precio, $ntickets) {
    $newGame[$index] = array (
        "juego" => $namegame,
        "precioTicket" => $precio,
        "cantTickets" => $ntickets
    );
    $games[$index] = $newGame[$index];
    echo "Datos actualizados. \n";
    return $games;
}

// Funcion que actualiza el monto 

function montoActualizado($tickets, $index, $namemonth, $montototal) {
    $newticket[$index] = array (
        "mes" => $namemonth,
        "monto" => $montototal
    );
    $tickets[$index] = $newticket[$index];
    return $tickets;
}

function juegosOrdenados($a, $b) {
    if($a['cantTickets']*$a['precioTicket'] == $b['cantTickets']*$b['precioTicket']){
        return 0;
    }
    return ($a['cantTickets'] * $a['precioTicket'] < $b['cantTickets'] * $b['precioTicket']) ? -1 : 1;
}

// Funcion que ordena array

function mesesOrdenados($games){
    uasort($games, 'juegosOrdenados');
    print_r($games);
    /**la función  print_r() se utiliza para mostrar información sobre una variable de una manera legible para los humanos. Imprime estructuras de datos complejas, como arrays y objetos, de forma que se puedan examinar fácilmente.*/
}

//Programa principal.

$dataGame = dataGame();
$montoMensual = montoMensual($dataGame); 
echo "Bienvenido al menu de parque de diversiones. \n";
do {
    $menuOption = menu();
    if ($menuOption == 1) {
        echo "Ingrese mes de de la venta de un juego: ";
        $month = trim(fgets(STDIN));
        $month = strtolower($month);
        $validarMes = validarMes($montoMensual, $month);
        if ($validarMes > 100) {
            $numberMonth = numberIndex($montoMensual, $month);
            $nameMonth = nameMonth($montoMensual, $numberMonth);
            echo "Ingrese información de la venta del juego.\n";
            echo "Nombre del juego: ";
            $nameGame = trim(fgets(STDIN));
            echo "Ingrese precio del ticket: $";
            $price = trim(fgets(STDIN));
            echo "Ingrese cantidad de tickes vendidos: ";
            $cantTickets = trim(fgets(STDIN));
            $montoIngresado = $price * $cantTickets;
            $montoPreCargado = $montoMensual[$numberMonth]["monto"];
            $montoTotal = $montoIngresado + $montoPreCargado; 
            if ($montoIngresado > $montoPreCargado) {
                $dataGame = actulizarDatos($dataGame, $numberMonth, $nameGame, $price, $cantTickets);
            } else {  
                echo "Monto actualizado.\n";
            }
            $montoMensual = montoActualizado($montoMensual, $numberMonth, $nameMonth, $montoTotal);
        } else {
            echo "No se encontro el mes, procure ingresar bien los datos.\n";
        } 
    } 
    elseif ($menuOption == 2) {
        $montoA = $montoMensual[0]["monto"];
        for ($i=0; $i < 12; $i++) { 
            if ($montoA < $montoMensual[$i]["monto"]) {
            $montoA = $montoMensual[$i]["monto"]; 
            $newname = $dataGame[$i]["juego"];
            $newprice = $dataGame[$i]["precioTicket"];
            $newCant = $dataGame[$i]["cantTickets"];
            $monthname = $montoMensual[$i]["mes"];
            $i++;
            }
        }
        echo "<$monthname>\n";
        echo "Juego con mayor monto de ventas: $newname\n";
        echo "Precio de ticket: $$newprice\n";
        echo "Tickets vendidos: $newCant\n";
        echo "Venta total del mes: $$montoA\n"; 
    }
    elseif ($menuOption == 3) {
        echo "Ingrese un monto: $";
        $monto = trim(fgets(STDIN));
        $i = 0;
        $encontrado = false;
        while ($encontrado == false && $i < 12) {
            if ($monto < $montoMensual[$i]["monto"]) {
                $montoventas = $montoMensual[$i]["mes"];
                $encontrado = true;
                $mensaje = "El mes que supera el monto ingresado es: $montoventas.\n";
            } else {
                $mensaje = "No se encontro un mayor monto registrado.\n";
                $i++;
            }
        }
        echo $mensaje;
    }
    elseif ($menuOption == 4) {
        echo "Ingrese el nombre del mes para ver información completa del mismo: ";
        $nombreMes = trim(fgets(STDIN));
        $mesvalido = validarMes($montoMensual, $nombreMes);
        if ($mesvalido > 100) {
            //aca hace el resto
            $numberMonth = numberIndex($montoMensual, $nombreMes);
            $nameGame = $dataGame[$numberMonth]["juego"];
            $precio = $dataGame[$numberMonth]["precioTicket"];
            $nTickets = $dataGame[$numberMonth]["cantTickets"];
            $totalventas = $precio * $nTickets;
            echo "Mes: $nombreMes\n";
            echo "Nombre del juego: $nameGame\n";
            echo "Tickets vendidos: $$nTickets\n";
            echo "Precio del ticket: $$precio\n";
            echo "Total de ventas en diciembre: $$totalventas\n";
        } else {
            echo "Nombre de mes invalido, procure ingresar bien los datos.\n";
        }
    }
    elseif ($menuOption == 5) {
        mesesOrdenados($dataGame);
    }
    elseif ($menuOption > 5 && $menuOption !=0) {
        echo "Opcion invalida, intentelo nuevamente.\n";
    }
} while ($menuOption != 0);
