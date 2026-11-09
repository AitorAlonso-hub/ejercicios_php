<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi hola mundo en php</title>

    <style>
        /* Para con id en vez de class es un # por . */
        .parrafo_personalizado {
            color: palevioletred;
            font-family: Georgia, 'Times New Roman', Times, serif;
            font-size: 50px;
            background-color: black;
            font-weight: bold;
            text-align: center;
        }
    </style>
</head>

<body>
    <!-- hello world como texto básico -->
    <?php echo 'Hello world'; ?>
    <!-- hello world como encabezado nivel 2 -->
    <?php echo '<h2>Hello world</h2>'; ?>
    <!-- hello world como un párrafo con estilo: color, tipografía, alineación, etc -->
    <h2 class="parrafo_personalizado"><?php echo 'Hello world'; ?></h2>
    <!-- hello world con un salto de línea entre hello y world -->
    <h2><?php echo 'Hello <br> world'; ?></h2>
    <!-- info sobre version php -->
    <?php echo 'Versión de php : ' . phpversion(); ?>
    <?php echo 'Versión de php : ' . phpinfo(); ?>
    <!-- como mostrar la fecha y la hora del sistema en el momento de la ejecución -->
    <p><?php echo date("l jS \of F Y h:i:s A"); ?></p>
    <!-- más simple -->
    <p><?php echo date("d/m/y h:i:s A"); ?></p>
</body>

</html>