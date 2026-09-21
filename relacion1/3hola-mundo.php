<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejer 3</title>

</head>

<body>
    <?php
    // Mostramos el título de la lista
    echo "<h2>Valores de \$_SERVER</h2>";

    // Empezamos la lista no numerada (ul)
    echo "<ul>";

    // Escribimos cada elemento de la lista a mano (li)
    // Usamos el punto (.) para unir el texto con el valor de la variable
    echo "<li>DOCUMENT_ROOT: " . $_SERVER['DOCUMENT_ROOT'] . "</li>";
    echo "<li>PHP_SELF: " . $_SERVER['PHP_SELF'] . "</li>";
    echo "<li>SERVER_NAME: " . $_SERVER['SERVER_NAME'] . "</li>";
    echo "<li>SERVER_SOFTWARE: " . $_SERVER['SERVER_SOFTWARE'] . "</li>";
    echo "<li>SERVER_PROTOCOL: " . $_SERVER['SERVER_PROTOCOL'] . "</li>";
    echo "<li>HTTP_HOST: " . $_SERVER['HTTP_HOST'] . "</li>";
    echo "<li>HTTP_USER_AGENT: " . $_SERVER['HTTP_USER_AGENT'] . "</li>";
    echo "<li>REMOTE_ADDR: " . $_SERVER['REMOTE_ADDR'] . "</li>";
    echo "<li>REMOTE_PORT: " . $_SERVER['REMOTE_PORT'] . "</li>";
    echo "<li>SCRIPT_FILENAME: " . $_SERVER['SCRIPT_FILENAME'] . "</li>";
    echo "<li>REQUEST_URI: " . $_SERVER['REQUEST_URI'] . "</li>";

    // Cerramos la lista
    echo "</ul>";

    // --- PRUEBAS DE VOLCADO (DEBUG) ---

    echo "<h2>Volcado con print_r:</h2>";
    echo "<pre>"; // La etiqueta <pre> de HTML hace que se vea ordenado y hacia abajo
    print_r($_SERVER);
    echo "</pre>";

    echo "<h2>Volcado con var_dump:</h2>";
    echo "<pre>";
    var_dump($_SERVER);
    echo "</pre>";
    ?>
</body>

</html>