<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calcula la nota final</title>

    <style>
        b.aprobado {
            color: green;
            font-weight: bold;
        }

        b.suspenso {
            color: red;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <?php
    // Definición de las variables de entrada
    $nota1 = 10;
    $nota2 = 0;
    $faltasSinJustificar = 1;

    // Cálculo de la nota media 
    $media = ($nota1 + $nota2) / 2;
    // Descontar por falta
    $penalizacion = $faltasSinJustificar * 0.25;
    // Cálculo de la nota final
    $notaFinal = $media - $penalizacion;

    // Asegurar que la nota no sea menor que 0
    if ($notaFinal < 0) {
        $notaFinal = 0;
    }

    // Mostrar el resultado por pantalla
    echo "Nota 1: " . $nota1 . "<br>";
    echo "Nota 2: " . $nota2 . "<br>";
    echo "Media inicial: " . $media . "<br>";
    echo "Faltas sin justificar: " . $faltasSinJustificar . " (Penalización: -" . $penalizacion . ")<br>";
    echo "<strong>Nota Final: " . $notaFinal . "</strong><br><br>";

    // Comprobar si aprueba o suspende
    if ($notaFinal >= 5) {
        echo "<b class = 'aprobado'>Resultado: APROBADO</b>";
    } else {
        echo "<b class = 'suspenso'>Resultado: SUSPENSO</b>";
    }
    ?>

</body>

</html>