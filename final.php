<?php

/**
 *  Funcion que carga datos a un array.
 *  @return array $games
*/

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

/**
 * Funcion que carga array con meses y monto
 * @param array $games
 * @return array $tickets
 */ 

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

/**
 * Funcion que segun el nombre del mes, devuelve el indice de este.
 * @param array $tickets
 * @param string $mes
 * @return int $index
 */

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

/**
 * Funcion que segun el indice del mes, retorne el nombre de este
 * @param array $tickets
 * @param int $index
 * @return string $namemonth 
 */

function nameMonth($tickets, $index) {
    $namemonth = $tickets[$index]["mes"];
    return $namemonth;
}

/**
 * Función que valida el nombre del mes
 * @param array $tickets
 * @param string $mes
 * @return int $n
 */

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

/**
 * Funcion para solicitar mes y validarlo
 * @param array $tickets
 * @return int $indice
 */

 function solicitarMes ($tickets) {
    echo "Ingrese nombre del mes: ";
    $mes = trim(fgets(STDIN));
    $mes = strtolower($mes);
    $n = validarMes($tickets, $mes);
    if ($n > 100) {
        echo "Mes valido.\n";
        $indice = numberIndex($tickets, $mes);
    }
    else {
        echo "Mes invalido, ingresar correctamente los datos.\n";
        $indice = -1;
    }
    return $indice;
}

/**
 * Funcion que muestra menu
 * @return int $option
 */

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

/**
 * Funcion que actualiza los datos
 * @param array $games
 * @param int $index
 * @param string $namegame
 * @param float $precio
 * @param int $ntickets
 * @return array $games
 */

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

/**
 * Funcion que actualiza el monto 
 * @param array $tickets
 * @param int $index
 * @param string $namemonth
 * @param float $monto
 * @return array $tickets
 */

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

/**
 * Funcion que retorna indice cuando encuentra el mayor monto de venta
 * @param array $tickets
 * @return int $newindex
 */

 function mayorMontoVenta($tickets) {
    $newindex = 0;
    $montoA = $tickets[0]["monto"];
    for ($i=0; $i < 12; $i++) { 
        if ($montoA < $tickets[$i]["monto"]) {
            $montoA = $tickets[$i]["monto"]; 
            $newname = $tickets[$i]["mes"];
        }
    }
    $newindex = numberIndex($tickets, $newname);
    return $newindex;
 }

/**
 * Funcion que segun el indice, me muestre los datos de determinado mes, con la informacion completa
 * @param array $games
 * @param array $tickets
 * @param int $i
 */

 function mostrarData($games, $tickets, $i) {
    $newname = $games[$i]["juego"];
    $newprice = $games[$i]["precioTicket"];
    $newCant = $games[$i]["cantTickets"];
    $monthname = $tickets[$i]["mes"];
    $monto = $tickets[$i]["monto"];
    echo "<$monthname>\n";
    echo "Juego con mayor monto de ventas: $newname\n";
    echo "Precio de ticket: $$newprice\n";
    echo "Tickets vendidos: $newCant\n";
    echo "Venta total del mes: $$monto\n";
 }

 /** 
  * Funcion que supere el monto ingresado o -1 si no lo encuentra
  * @param array $tickets
  * @return int $numberindex
 */

 function esMayor ($tickets) {
    echo "Ingrese un monto: $";
    $monto = trim(fgets(STDIN));
    $i = 0;
    $encontrado = false;
    while ($encontrado == false && $i < 12) {
        if ($monto < $tickets[$i]["monto"]) {
            $nombreMes = $tickets[$i]["mes"];
            $encontrado = true;
            $numberindex = numberIndex($tickets, $nombreMes);
        } else {
            $i++;
            $numberindex = -1;
        }
    }
    return $numberindex;
 }

//Programa principal.

$dataGame = dataGame();
$montoMensual = montoMensual($dataGame); 
echo "Bienvenido al menu de parque de diversiones. \n";
do {
    $menuOption = menu();
    if ($menuOption == 1) {
       $index = solicitarMes($montoMensual);
       if ($index != -1) {
        echo "Ingrese información de la venta del juego.\n";
        echo "Nombre del juego: ";
        $nameGame = trim(fgets(STDIN));
        echo "Ingrese precio del ticket: $";
        $price = trim(fgets(STDIN));
        echo "Ingrese cantidad de tickes vendidos: ";
        $cantTickets = trim(fgets(STDIN));
        $montoIngresado = $price * $cantTickets;
        $montoPreCargado = $montoMensual[$index]["monto"];
        $montoTotal = $montoIngresado + $montoPreCargado;
        $nameMonth = nameMonth($montoMensual, $index);
        if ($montoIngresado > $montoPreCargado) {
            $dataGame = actulizarDatos($dataGame, $index, $nameGame, $price, $cantTickets);
        } else {  
            echo "Monto actualizado.\n";
        }
        $montoMensual = montoActualizado($montoMensual, $index, $nameMonth, $montoTotal);
       }
       else {
        echo "Intentelo nuevamente cargando bien los datos.\n";
       }
    } 
    elseif ($menuOption == 2) {
        $indice = mayorMontoVenta($montoMensual);
        mostrarData($dataGame, $montoMensual, $indice);
    }
    elseif ($menuOption == 3) {
        $nuevoIndice = esMayor($montoMensual);
        if ($nuevoIndice != -1) {
            mostrarData($dataGame, $montoMensual, $nuevoIndice);
        }
    }
    elseif ($menuOption == 4) {
       $newIndex = solicitarMes($montoMensual);
       if ($newIndex != -1) {
        mostrarData($dataGame, $montoMensual, $newIndex);
       }
    }
    elseif ($menuOption == 5) {
        mesesOrdenados($dataGame);
    }
    elseif ($menuOption > 5 && $menuOption != 0) {
        echo "Opcion invalida, intentelo nuevamente.\n";
    }
} while ($menuOption != 0);
