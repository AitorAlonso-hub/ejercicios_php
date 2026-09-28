<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>triangulo</title>
</head>

<body>
    <b style="color: red;"></b>
    <?php
    // Definición de los tres lados del triángulo
    $lado1 = -110;
    $lado2 = -110;
    $lado3 = -110;

    echo "Lados del triángulo: $lado1, $lado2, $lado3 <br>";

    // Clasificar el triángulo según sus lados
    // ¿Los tres lados son iguales? Entonces se cumple la condición
    if ($lado1 == $lado2 && $lado2 == $lado3) {
        echo "El triángulo es <b>Equilátero</b> (todos los lados son iguales).";

        /* 
        ¿Dos de los tres lados son iguales? Entonces ya se cumple, porque si 
        fueran los 3 ya sería del if de arriba (es decir, Equilátero) 
        */
    } elseif ($lado1 == $lado2 || $lado1 == $lado3 || $lado2 == $lado3) {
        echo "El triángulo es <b>Isósceles</b> (dos lados son iguales).";

        // Si no es ninguno de los condicionales de arriba entonces diremos que es Escaleno
    } else {
        echo "El triángulo es <b>Escaleno</b> (todos los lados son diferentes).";
    }
    ?>

</body>

</html>