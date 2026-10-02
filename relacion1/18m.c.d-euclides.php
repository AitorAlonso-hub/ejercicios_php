<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Máximo común divisor con Euclides</title>
</head>

<body>
    <?php

    $num1 = 24;
    $num2 = 18;

    $num1 = (int) $num1;
    $num2 = (int) $num2;

    // Comprobamos que los dos números sean positivos
    if ($num1 > 0 and $num2 > 0) {

        // Algoritmo de Euclides mediante restas
        /* 
        != distinto de ...
        EJEMPLO:
        Mientras los dos números sean diferentes, seguimos haciendo restas
        */
        while ($num1 != $num2) {

            if ($num1 > $num2) {
                $num1 = $num1 - $num2;
            } else {
                $num2 = $num2 - $num1;
            }
        }

        // Cuando los dos números son iguales, ese número es el MCD
        echo "El MCD es: " . $num1;
    } else {
        echo "Los números deben ser naturales y positivos";
    }

    ?>

</body>

</html>