<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecuación Segundo Grado P1</title>
</head>

<body>

    <?php

    function resolverEcuacion($a, $b, $c)
    {
        // Si a = 0, no es una ecuación de segundo grado
        if ($a == 0) {

            // Evitamos dividir entre 0
            if ($b == 0) {
                return "No se puede resolver: a y b son 0.";
            }

            $x = -$c / $b;

            return "Ecuación de primer grado. x = " . $x;
        }

        // Si b = 0
        if ($b == 0) {

            // -c/a tiene que ser positivo para que exista raíz real
            if (-$c / $a < 0) {
                return "No hay soluciones reales.";
            }

            $x1 = -sqrt(-$c / $a);
            $x2 = sqrt(-$c / $a);

            return "Dos soluciones: x1 = " . $x1 . " y x2 = " . $x2;
        }

        // Si c = 0
        if ($c == 0) {

            $x1 = 0;
            $x2 = -$b / $a;

            return "Dos soluciones: x1 = " . $x1 . " y x2 = " . $x2;
        }

        // Caso normal: a, b y c son diferentes de 0
        $resultado = ($b * $b) - (4 * $a * $c);

        // No hay soluciones reales
        if ($resultado < 0) {
            return "No hay soluciones reales.";
        }

        // Una única solución
        if ($resultado == 0) {
            $x = -$b / (2 * $a);

            return "Una solución: x = " . $x;
        }

        // Dos soluciones
        $raiz = sqrt($resultado);

        $x1 = (-$b + $raiz) / (2 * $a);
        $x2 = (-$b - $raiz) / (2 * $a);

        return "Dos soluciones: x1 = " . $x1 . " y x2 = " . $x2;
    }

    // Valores INTERESANTES a probar
    /*
        Soluciones: 3 y 2
            $a = 1;
            $b = -5;
            $c = 6;

        Solución: -1
            $a = 1;
            $b = 2;
            $c = 1;

        Solución: NO HAY NÚMEROS REALES
            $a = 1;
            $b = 0;
            $c = 1;

        Ecuación de primer grado: x = -2
            $a = 0;
            $b = 2;
            $c = 4;

        No se puede dividir entre 0
            $a = 0;
            $b = 0;
            $c = 5;
    */

    $a = 1;
    $b = -5;
    $c = 6;

    /* llamamos a la función para que realice la operación 
    con los valores anteriormente introducidos */
    echo resolverEcuacion($a, $b, $c);

    ?>
</body>

</html>