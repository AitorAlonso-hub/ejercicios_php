<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prueba numérica</title>

</head>

<body>

    <?php
    $nota =  5.1;
    // transformar el valor a int y así no permitir decimales
    $nota = (int) $nota;

    if ($nota >= 1 and $nota <= 10) {
        if ($nota >= 0 and $nota < 5) {
            echo ("Suspenso");
        } else if ($nota == 5) {
            echo ("Suficiente");
        } else if ($nota == 6) {
            echo ("Bien");
        } else if ($nota == 7 or $nota == 8) {
            echo ("Notable");
        } else
            echo ("Sobresaliente");
    } else {
        echo "El número debe de ser entre el 1 y el 10";
    }


    ?>
</body>

</html>