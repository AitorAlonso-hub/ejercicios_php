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
        if ($a == 0) {
            return "No es una ecuación de segundo grado.";
        }

        $resultado = ($b * $b) - (4 * $a * $c);

        if ($resultado < 0) {
            return "No hay soluciones reales.";
        }

        if ($resultado == 0) {
            $x = -$b / (2 * $a);
            return "Una solución: x = " . $x;
        }
        //sqrt() = calcular raíz cuadrada
        $raiz = sqrt($resultado);

        $x1 = (-$b + $raiz) / (2 * $a);
        $x2 = (-$b - $raiz) / (2 * $a);

        return "Dos soluciones: x1 = " . $x1 . " y x2 = " . $x2;
    }

    //Valores INTERESANTES a probar
    /*
    Soluciones: 3 y 2
        $a = 1;
        $b = -5;
        $c = 6;

    Solución: -1
        $a = 1;
        $b = 2;
        $c = 1;

    Solución: NO HAY NUM REALES
        $a = 1;
        $b = 0;
        $c = 1;
    */

    $a = 0;
    $b = 0;
    $c = 0;

    /* llamamos a la función para que realice la operación 
    con los valores anteriormente introducidos */
    echo resolverEcuacion($a, $b, $c);

    ?>
</body>

</html>