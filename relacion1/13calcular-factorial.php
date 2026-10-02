<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>calcular factorial</title>
</head>

<body>
    <?php

    $num = 5;
    $num = (int) $num;

    // Comprobamos que el número sea positivo
    if ($num > 0) {

        // Inicializamos factorial en 1
        $factorial = 1;

        // Recorremos los números desde $num hasta 1
        for ($i = $num; $i >= 1; $i--) {

            // Multiplicamos
            $factorial = $factorial * $i;

            // Mostramos el número actual
            echo $i;

            // Si todavía no hemos llegado al 1, mostramos una "x"
            if ($i > 1) {
                echo " x ";
            }
        }

        // Mostramos el resultado final del factorial
        echo " = " . $factorial;
    } else {

        // Si el número no es positivo, mostramos un mensaje de error
        echo "Ese número es negativo";
    }

    ?>

</body>

</html>