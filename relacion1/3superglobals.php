<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejer 2: Superglobals</title>

    <style>
        /* li b */
        b {
            color: red;
        }
    </style>
</head>

<body>
    <h1>Probando superglobals</h1>

    <ul>
        <?php
        // Cada <li> en un echo
        echo "<li><b>Raiz: </b>" . $_SERVER['DOCUMENT_ROOT'] . "</li>";
        echo "<li><b>Archivo php: </b>" . $_SERVER['PHP_SELF'] . "</li>";
        echo "<li><b>Raiz: </b>" . $_SERVER['SERVER_NAME'] . "</li>";
        echo "<li><b>Raiz: </b>" . $_SERVER['SERVER_SOFTWARE'] . "</li>";
        echo "<li><b>Raiz: </b>" . $_SERVER['SERVER_PROTOCOL'] . "</li>";
        echo "<li><b>Raiz: </b>" . $_SERVER['HTTP_HOST'] . "</li>";
        echo "<li><b>Raiz: </b>" . $_SERVER['HTTP_USER_AGENT'] . "</li>";
        echo "<li><b>Raiz: </b>" . $_SERVER['REMOTE_ADDR'] . "</li>";
        echo "<li><b>Raiz: </b>" . $_SERVER['REMOTE_PORT'] . "</li>";
        echo "<li><b>Raiz: </b>" . $_SERVER['SCRIPT_FILENAME'] . "</li>";
        echo "<li><b>Raiz: </b>" . $_SERVER['REQUEST_URI'] . "</li>";
        ?>

        <?php

        ?>

    </ul>
</body>

</html>