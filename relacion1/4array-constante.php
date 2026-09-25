<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>array const de días de la semana</title>
</head>

<body>
    <h2>Manejo de array constante de días de la semana</h2>

    <?php
    // tmb podría usar define( , )
    const DIAS_SEMANA = array(
        "Lunes",
        "Martes",
        "Miercoles",
        "Jueves",
        "Viernes",
        "Sábado",
        "Domingo"
    );

    // Solo un día
    echo ("<p>Hoy es " . DIAS_SEMANA[4] . "</p>");

    // Todos los días
    // crear contador
    for ($i = 0; $i <= 6; $i++) {
        echo ("Día " . $i . " : " . DIAS_SEMANA[$i] . "<br>");
        //echo ("Día " . ($i+1) . " : " . DIAS_SEMANA[$i] . "<br>");

    }
    echo "<hr>";
    // Ahora hacerlo de forma de lista numerada
    echo "<h2>En forma de lista numerada</h2>";
    echo "<ol>";
    for ($i = 0; $i <= 6; $i++) {

        echo ("<li> " . DIAS_SEMANA[$i] . "</li>");
    }
    echo ("</ol>");

    echo "<hr>";
    //la longitud de un array se mide con count()
    echo "<h2>Longitud de un array</h2>";

    echo "<p> Los días de la semana son " . count(DIAS_SEMANA) . "</p>"

    ?>



</body>

</html>