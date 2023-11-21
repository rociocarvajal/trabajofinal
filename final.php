<?php

/**
 *  Estructura de datos en el que cada elemento contiene el monto total de ventas de games de cada mes
 *  @return array $games
*/

 function dataGame(){
 
    $games[0] = array (
        "game" => 'Super Mario Bross',
        "ficha" => 150,
        "nFichas" => 36,
        "month" => 'enero'
    );
    $games[1] = array (
        "game" => 'Tetris',
        "ficha" => 160,
        "nFichas" => 69,
        "month" => 'febrero'
    );
    $games[2] = array (
        "game" => 'Donkey-Kong',
        "ficha" => 140,
        "nFichas" => 93,
        "month" => 'marzo'
    );
    $games[3] = array (
        "game" => 'Pac-Man',
        "ficha" => 133,
        "nFichas" => 36,
        "month" => 'abril'
    );
    $games[4] = array (
        "game" => 'Mortal-Kombat',
        "ficha" => 100,
        "nFichas" => 69,
        "month" => 'mayo'
    );
    $games[5] = array (
        "game" => 'Sonic',
        "ficha" => 333,
        "nFichas" => 25,
        "month" => 'junio'
    );
    $games[6] = array (
        "game" => 'Asteroids',
        "ficha" => 400,
        "nFichas" => 77,
        "month" => 'julio'
    );
    $games[7] = array (
        "game" => 'Final fight',
        "ficha" => 500,
        "nFichas" => 100,
        "month" => 'agosto'
    );
    $games[8] = array (
        "game" => 'Puzzle Bobble',
        "ficha" => 110,
        "nFichas" => 45,
        "month" => 'septiembre'
    );
    $games[9] = array (
        "game" => '1942',
        "ficha" => 1000,
        "nFichas" => 60,
        "month" => 'octubre'
    );
    $games[10] = array (
        "game" => 'Circus',
        "ficha" => 1500,
        "nFichas" => 36,
        "month" => 'noviembre'
    );
    $games[11] = array (
        "game" => 'Island Adventures',
        "ficha" => 369,
        "nFichas" => 39,
        "month" => 'diciembre'
    );
    return $games;
}

/**
 * Funcion que dado un string que represente el mes, devuelve el indice de este
 * @param array $games
 * @param string $name
 * @return int
 */

 function recuperarIndice($games, $name) {
    foreach ($games as $indice => $game) {
        if ($games[$indice]["month"] == $name) {
            $nuevoindice = $indice;
        }
    }
    return $nuevoindice;
 }

 /** 
  * Funcion que dado un numero entre 0 y 11, devuelva el nombre del mes que representa
  * @param array $games
  * @param int $indice
  * @return string
  */

  function recuperarName ($games, $indice) {
    $nombreMes = $games[$indice]["month"];
    return $nombreMes;
  }

/**
 * Estructura de arreglos asociativos que solo almacena al juego con mayor ventas del mes
 * @param array $games
 * @return array
 */

 function mayorVenta ($games) {
    $montoA = 1;
    $i = 0;
    $found = false;
    for ($i=0; $i < count($games); $i++) { 
        $montoB = $games[$i]["ficha"] * $games[$i]["nFichas"];
        if ($montoA < $montoB) {
            $montoA = $montoB;
            $asociativo = $games[$i];
        }
    }
    return $asociativo;
 }

 /**
  * Funcion que solicita mes hasta que sea valido
  * @param array $games
  * @return int
  */

  function solicitarMes ($games) {
    $newIndex = 0;
    $found = false;
    do {
        echo "Ingrese nombre de mes valido: ";
        $inputName = trim(fgets(STDIN));
        $inputName = strtolower($inputName);
        $i = 0;
        foreach ($games as $game) {
            if ($games[$i]["month"] == $inputName) {
                $newIndex = $i;
                $found = true;
            }
            else {
                $newIndex = -1;
                $i++;
            }
        }
    } while ($found == false);
    return $newIndex;
  }

 /** 
  * Funcion menú de opciones
  * @return int
  */

  function menu () {
    $found = false;
    while ($found == false) {
        echo "Bienvendo al menú de opciones!\n";
        echo "1) Ingrese una venta.\n";
        echo "2) Mes con mayor monto de ventas.\n";
        echo "3) Primer mes que supera un monto de ventas.\n";
        echo "4) Información de un mes.\n";
        echo "5) Juegos más vendidos ordenados.\n";
        echo "0) Salir del menú.\n";
        echo "Ingrese su opcion: ";
        $option = trim(fgets(STDIN));
        if ($option >= 0 && $option <= 5) {
            $found = true;
        }
        else {
            echo "Opción invalida, intentelo nuevamente.\n";
        }
    }
    return $option;
  }

  /** 
   * Funcion mostrar data
   * @param array $games 
   * @param int $index
   */

   function mostrarData ($games, $index) {
    $namemonth = $games[$index]["month"];
    $namegame = $games[$index]["game"];
    $fichas = $games[$index]["ficha"];
    $nfichas = $games[$index]["nFichas"];
    $montoTotal = $fichas * $nfichas;
    echo "<$namemonth>\n";
    echo "Game: $namegame.\n";
    echo "Precio fichas: $$fichas.\n";
    echo "Fichas vendidas: $nfichas.\n";
    echo "Monto total: $$montoTotal.\n";
   } 

  /**
   * Funcionalidad opcion 1
   * @param array $games
   * @return array
   */
  
    function opcion1 ($games) {
    echo "Ha seleccionado la opcion de ingresar una venta.\n";
    $indice = solicitarMes($games);
    $nameMonth = $games[$indice]["month"];
    echo "Ingrese nombre del juego: ";
    $game = trim(fgets(STDIN));
    echo "Ingrese el precio de la ficha: $";
    $ficha = trim(fgets(STDIN));
    echo "Ingrese cantidad de fichas vendidas: ";
    $nFichas = trim(fgets(STDIN));
    $newMonto = $ficha * $nFichas;
    $oldMonto = $games[$indice]['ficha']*$games[$indice]['nFichas'];
    $ficha = $games[$indice]['ficha'] + $ficha;
    $nFichas = $games[$indice]['nFichas'] + $nFichas;
    $games[$indice]['ficha'] = $ficha;
    $games[$indice]['nFichas'] = $nFichas;
    $newDato = array (
        "game" => $game,
        "ficha" => $ficha,
        "nFichas" => $nFichas,
        "month" => $nameMonth
    );
    if ($newMonto > $oldMonto) {
        $games[$indice] = $newDato;
        echo "Datos actualizados.\n";
    }
    else {
        $games = $games;
    }
    return $games;
  }

  /** 
   * Funcionalidad opcion 3
   * @param array $games
   * @return int
   */

    function option3 ($games) {
    echo "Ingrese un monto a superar: ";
    $montoInput = trim(fgets(STDIN));
    $found = false;
    $i = 0;
    while ($found == false && $i <= 11) {
        if ($montoInput < $games[$i]["ficha"]*$games[$i]["nFichas"]) {
            $encontrado = $i;
            $found = true;
        }
        else {
            $i++;
            $encontrado = -1;
        }
    }
    return $encontrado;
  }

  /** 
   * Funcionalidad opcion 4
   * @param array $games
   */


  function option4 ($games) {
    echo "Ingrese nombre de mes para imprimir información.\n";
    $indice = solicitarMes($games);
    mostrarData($games, $indice);
  } 
  
  /** 
   * Funcionalidad opcion 5
   */

   function juegosOrdenados($a, $b) {
    if($a['nFichas']*$a['ficha'] == $b['nFichas']*$b['ficha']){
        return 0;
    }
    return ($a['nFichas'] * $a['ficha'] < $b['nFichas'] * $b['ficha']) ? -1 : 1;
}

/**
 * Funcion que ordena array
 * @param array $games
 */

function mesesOrdenados($games){
    uasort($games, 'juegosOrdenados');
    print_r($games);
    /**la función  print_r() se utiliza para mostrar información sobre una variable de una manera legible para los humanos. Imprime estructuras de datos complejas, como arrays y objetos, de forma que se puedan examinar fácilmente.*/
}

 /** Programa principal */
 //Cargo estructura de datos
 $datos = dataGame();
 $mayorMonto = mayorVenta($datos);
 do {
    $optionMenu = menu();
    if ($optionMenu == 1) {
       $datos = opcion1($datos);
    }
    elseif ($optionMenu == 2) {
       $mayor = mayorVenta($datos);
       $name = $mayor["month"];
       $indice = recuperarIndice($datos, $name);
       mostrarData($datos, $indice);
    }
    elseif ($optionMenu == 3) {
        $number = option3($datos);
        if ($number != -1) {
            mostrarData($datos, $number);   
        }
        else {
            echo "No se ha encontrado un monto superior al input ingresado en la base de datos.\n";
        }
    }
    elseif ($optionMenu == 4) {
        option4($datos);
    }
    elseif ($optionMenu == 5) {
        mesesOrdenados($datos);
    }
 } while ($optionMenu != 0);
