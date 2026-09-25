<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>array asociativo</title>

    <style>
        /* Estilo para poner líneas y colapsar los bordes dobles */
        table,
        th,
        /* celda de encabezado */
        td {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 8px;
            /* Espaciado interno para que no quede amontonado */
        }
    </style>

</head>

<body>

    <?php
    const DIAS_SEMANA = array(
        "Lunes" => 31,
        "Martes" => 32,
        "Miercoles" => 30,
        "Jueves" => 31,
        "Viernes" => 29,
        "Sábado" => 30,
        "Domingo" => 31
    );

    echo "<p>La temp. máx. del viernes es : " . DIAS_SEMANA["Viernes"] . "</p>";
    // NO FUNCIONA el indice posicional
    echo "<p>La temp. máx. del viernes es : " . DIAS_SEMANA[4] . "</p>";


    // Recorrido secuencial foreach en texto plano
    foreach (DIAS_SEMANA as $etiqueta => $valor) {
        echo "La temp. del " . $etiqueta . " es: " . $valor . "<br>";
    }

    echo "<br>";

    // Construcción de la tabla
    echo "<table>";
    echo "<tr><td><b>DIA</b></td><td><b>TEMPERATURA</b></td></tr>";

    foreach (DIAS_SEMANA as $etiqueta => $valor) {
        echo "<tr><td>$etiqueta</td><td>$valor</td></tr>";
    }
    echo "</table>"; // Se cierra la etiqueta de la tabla
    ?>

</body>

</html>