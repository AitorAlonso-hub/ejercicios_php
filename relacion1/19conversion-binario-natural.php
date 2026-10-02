<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conversión de binario a natural</title>
</head>

<body>
    <?php

    $num = 13;
    $num = (int) $num;

    // Comprobamos que el número sea natural
    if ($num >= 0) {

        // Array donde guardaremos los restos
        $binario = [];

        // Caso especial para el número 0
        if ($num == 0) {
            array_push($binario, 0);
        }

        // Dividimos entre 2 hasta llegar a 0
        while ($num > 0) {

            // Guardamos el resto de la división
            $resto = $num % 2;

            // Añadimos el resto al array
            /*
            array_push() sirve para añadir un elemento al final de un array
            EJEMPLO:
            En el caso de nuestro array $binario, añade el valor 
            de $resto al final del array $binario
            */
            array_push($binario, $resto);

            // División y conversión a entero
            $num = (int)($num / 2);
        }

        // Acumulador de cadenas
        $resultado = "";

        // Recorremos el array hacia atrás
        for ($i = count($binario) - 1; $i >= 0; $i--) {
            $resultado = $resultado . $binario[$i];
        }

        echo "El número en binario es: " . $resultado;
    } else {
        echo "Ese número es negativo";
    }

    ?>


</body>

</html>