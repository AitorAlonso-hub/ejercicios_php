<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        b {
            color: red;
            font-weight: bold;
        }
    </style>
</head>

<body>

    <?php
    $i = 1; // Initialize counter
    $numero = 10;

    echo "<h2>Divisores de $numero :</h2>";
    for ($i = 0; $i <= $numero; $i++) {
        if ($numero % $i == 0) {
            // Si es divisor, lo mostramos en rojo y negrita
            echo "<b> $i </b>";
        } else { // Sino aparece normal
            echo " $i ";
        }
        $i++;
    }
    ?>
</body>

</html>