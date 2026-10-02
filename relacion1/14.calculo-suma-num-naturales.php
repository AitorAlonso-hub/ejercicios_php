<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suma de números naturales</title>
</head>
<body>
    <?php

    $n = 5;
    $n = (int) $n;

    if ($n > 0) {

        // Inicializamos suma
        $suma = 0;

        for ($i = 1; $i <= $n; $i++) {

            // Acumulamos la suma
            $suma = $suma + $i;

            // Mostramos los cálculos
            echo $i;

            if ($i < $n) {
                echo " + ";
            }
        }

        echo " = " . $suma;

    } else {
        echo "Ese número es negativo";
    }

    ?>
</body>
</html>