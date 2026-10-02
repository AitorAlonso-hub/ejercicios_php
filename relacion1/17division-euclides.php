<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Division Eclides</title>
</head>

<body>
    <?php

    $num1 = 17;
    $num2 = 5;

    $num1 = (int) $num1;
    $num2 = (int) $num2;

    // Comprobamos que los dos números sean positivos
    if ($num1 > 0 and $num2 > 0) {

        // Inicializamos el contador de divisiones
        $contador = 0;

        // Mientras el dividendo sea mayor o igual que el divisor
        while ($num1 >= $num2) {

            // Restamos el divisor al dividendo
            $num1 = $num1 - $num2;

            // Aumentamos el contador
            $contador++;
        }

        // El contador es el cociente
        // $num1 es el resto
        echo "Cociente = " . $contador . "<br>";
        echo "Resto = " . $num1;
    } else {
        echo "Los números deben ser naturales y positivos";
    }

    ?>

</body>

</html>