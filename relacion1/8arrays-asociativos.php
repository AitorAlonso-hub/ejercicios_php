<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>array asociativo paralelo</title>
</head>

<body>
    <?php
    // P.D: serían const estos arrays $rubrica y $notasPersona
    // Array asociativo con la rúbrica (pesos porcentuales de cada calificación)
    $rubrica = [
        "inicial" => 0.10, // 10%
        "primera" => 0.25, // 25%
        "segunda" => 0.30, // 30%
        "tercera" => 0.35  // 35%
    ];

    // Array asociativo paralelo con las notas particulares de la persona
    $notasPersona = [
        // comparte la mismas "claves" (a.asociativo: clave "..."-> valor "...")
        "inicial" => 8.5,
        "primera" => 7.0,
        "segunda" => 6.5,
        "tercera" => 9.0
    ];

    // Contador para acumular la nota final
    $notaFinal = 0;

    // Calcular la nota final multiplicando cada nota por su peso correspondiente
    // $periodo = nombre del bucle
    foreach ($rubrica as $periodo => $porcentaje) {
        $notaFinal = $notaFinal + ($notasPersona[$periodo] * $porcentaje);
        //$notaFinal += $notasPersona[$periodo] * $porcentaje;
    }

    // Mostrar los resultados por pantalla
    echo "<h2>Detalle de calificaciones:</h2>";
    foreach ($notasPersona as $periodo => $nota) {
        $porcentajeEfectivo = $rubrica[$periodo] * 100;
        // ucfirst() = primera letra en mayus , lcfirst() = ... en minusc
        echo "Calificación " . ucfirst($periodo) . ": " . $nota . " (Peso: " . $porcentajeEfectivo . "%)<br>";
    }

    // round(valor,2) = redondea un numero dejando 2 digitos
    echo "<p>La nota final ponderada de la persona es: " . round($notaFinal, 2) . "</p>";

    ?>

</body>

</html>