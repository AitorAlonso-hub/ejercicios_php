<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conversión de binario a natural parte 2</title>
</head>

<body>
    <?php

    $num = 25;

    //Elige una de las tres opciones 1,2 o 3
    /*
    1. Binario 
    2. Octal
    3. Hexadecimal
    */
    $opcion = 1;

    $num = (int) $num;

    // Comprobamos que el número sea natural
    if ($num >= 0) {

        // Menú de opciones
        do {
            echo "1. Binario<br>";
            echo "2. Octal<br>";
            echo "3. Hexadecimal<br>";

            // En este ejemplo elegimos directamente una opción
            $opcion = (int) $opcion;

            if ($opcion < 1 || $opcion > 3) {
                echo "Opción no válida<br>";
            }
        } while ($opcion < 1 || $opcion > 3);

        // Elegimos la base según la opción
        switch ($opcion) {

            case 1:
                /* 
                $base = 2 es lo mismo que el binario que se divide entre 2
                por la respectiva definición de Binario
                */
                $base = 2;
                break;

            case 2:
                /* 
                $base = 8 es lo mismo que el binario que se divide entre 8
                por la respectiva definición de Octal
                */
                $base = 8;
                break;

            case 3:
                /* 
                $base = 10 es lo mismo que el binario que se divide entre 10
                por la respectiva definición de Hexadecimal
                */
                $base = 16;
                break;
        }

        // Guardamos el número original
        $numeroOriginal = $num;

        // Array para guardar los restos
        $resultadoArray = [];

        // Caso especial para el número 0
        if ($num == 0) {
            array_push($resultadoArray, 0);
        }

        // Realizamos las divisiones sucesivas
        while ($num > 0) {

            // Calculamos el resto
            $resto = $num % $base;

            // Para hexadecimal convertimos 10-15 en A-F
            if ($resto >= 10) {
                switch ($resto) {
                    case 10:
                        $resto = "A";
                        break;
                    case 11:
                        $resto = "B";
                        break;
                    case 12:
                        $resto = "C";
                        break;
                    case 13:
                        $resto = "D";
                        break;
                    case 14:
                        $resto = "E";
                        break;
                    case 15:
                        $resto = "F";
                        break;
                }
            }

            // Guardamos el resto
            array_push($resultadoArray, $resto);

            // Dividimos y convertimos a entero
            $num = (int)($num / $base);
        }

        // Acumulador de cadenas
        $resultado = "";

        // Recorremos el array desde el final
        for ($i = count($resultadoArray) - 1; $i >= 0; $i--) {
            $resultado = $resultado . $resultadoArray[$i];
        }

        echo "<p>El número $numeroOriginal convertido es: $resultado </p>";
    } else {
        echo "Ese número es negativo";
    }

    ?>

</body>

</html>