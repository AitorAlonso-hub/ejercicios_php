<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>¿El número es primo?</title>

    <style>
        #no-primo {
            color: red;
        }

        #primo {
            color: green;
        }
    </style>

</head>

<body>
    <?php

    $num = 7;
    $num = (int) $num;

    if ($num > 0) {

        $esPrimo = true;

        // Comprobamos si el número tiene algún divisor
        for ($i = 2; $i < $num; $i++) {

            // Si encontramos un divisor, no es primo
            if ($num % $i == 0) {
                $esPrimo = false;
                break;
            }
        }

        // Mostramos el resultado
        if ($esPrimo) {
            echo "El número <b id='primo'>$num</b> es primo";
        } else {
            echo "El número <b id='no-primo'>$num</b> no es primo";
        }
    } else {
        echo "Ese número es negativo";
    }

    ?>

</body>

</html>