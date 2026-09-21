<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Valor de ejemplo de cada tipo de dato escalar en php con echo con las funciones var_dump() y printf</title>
</head>

<body>
    <!-- Valor ejemplo con la función var_ dump() y con printf de bool -->
    <!-- Valor como TRUE = 1 -->
    <?php
    $bool = true;
    var_dump($bool);
    echo "<br>";
    # Aparece el valor del bolean como num %d
    printf("el balor del booleano es: %d", $bool);
    echo "<br>";
    ?>
    <!-- Valor como FALSE = 0 -->
    <?php
    $bool = false;
    var_dump($bool);
    echo "<br>";
    # Aparece el valor del bolean como num %d
    printf("el balor del booleano es: %d", $bool);
    echo "<br><br>";
    ?>

    <!-- Valor ejemplo con la función var_ dump() y con printf de int -->
    <?php
    $int = 1;
    var_dump($int);
    echo "<br>";
    ?>
    <?php
    $num1 = 123456789;
    $num2 = -123456789;
    $char = 50; // The ASCII Character 50 is 2

    // Note: The format value "%%" returns a percent sign
    printf("%%f = %f <br>", $num1); // Con decimales
    printf("%%1\$.2f = %1\$.2f <br>", $num1); // Con dos decimales
    printf("%%1\$u = %1\$u <br>", $num1); // Sin decimales
    printf("%%b = %b <br>", $num1); // Binary number
    printf("%%c = %c <br>", $char); // The ASCII Character
    printf("%%d = %d <br>", $num1); // Signed decimal number
    printf("%%d = %d <br>", $num2); // Signed decimal number
    printf("%%e = %e <br>", $num1); // Scientific notation (lowercase)
    printf("%%E = %E <br>", $num1); // Scientific notation (uppercase)
    printf("%%u = %u <br>", $num1); // Unsigned decimal number (positive)
    printf("%%u = %u <br>", $num2); // Unsigned decimal number (negative)
    printf("%%f = %f <br>", $num1); // Floating-point number (local settings aware)
    printf("%%F = %F <br>", $num1); // Floating-point number (not local sett aware)
    printf("%%g = %g <br>", $num1); // Shorter of %e and %f
    printf("%%G = %G <br>", $num1); // Shorter of %E and %f
    printf("%%o = %o <br>", $num1); // Octal number
    printf("%%s = %s <br>", $num1); // String
    printf("%%x = %x <br>", $num1); // Hexadecimal number (lowercase)
    printf("%%X = %X <br>", $num1); // Hexadecimal number (uppercase)
    printf("%%+d = %+d <br>", $num1); // Sign specifier (positive)
    printf("%%+d = %+d <br>", $num2); // Sign specifier (negative)
    ?>
</body>

</html>