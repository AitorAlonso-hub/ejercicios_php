<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Hola Mundo en PHP</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .parrafo_personalizado {
            color: palevioletred;
            font-family: Georgia, 'Times New Roman', Times, serif;
            font-size: 40px;
            background-color: black;
            font-weight: bold;
            text-align: center;
            padding: 15px;
        }

        /* Contenedor de phpinfo() */
        .phpinfo-contenedor {
            width: 100%;
            overflow-x: auto;
            background-color: white;
            padding: 15px;
            border: 1px solid #dee2e6;
            border-radius: 10px;
        }

        /* Tablas de phpinfo() */
        .phpinfo-contenedor table {
            font-size: 13px;
            text-align: left;
        }

        /* Color y separación del texto */
        .phpinfo-contenedor td,
        .phpinfo-contenedor th {
            padding: 6px;
            color: white;
        }
    </style>
</head>

<body class="bg-light">

    <!-- Cabecera -->
    <header class="bg-primary text-white text-center py-4">
        <h1>Mi Hola Mundo en PHP</h1>
        <p class="mb-0">Practicando PHP y Bootstrap 5</p>
    </header>

    <main class="container my-5">

        <!-- Hello World -->
        <div class="card shadow mb-4">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">Hello World</h4>
            </div>

            <div class="card-body text-center">
                <?php echo 'Hello world'; ?>

                <h2 class="mt-3">
                    <?php echo 'Hello world'; ?>
                </h2>

                <h2 class="parrafo_personalizado">
                    <?php echo 'Hello world'; ?>
                </h2>

                <h2>
                    <?php echo 'Hello <br> world'; ?>
                </h2>
            </div>
        </div>

        <!-- Información de PHP -->
        <div class="card shadow mb-4">
            <div class="card-header bg-success text-white">
                <h4 class="mb-0">Información de PHP</h4>
            </div>

            <div class="card-body">

                <div class="alert alert-info">
                    <strong>Versión de PHP:</strong>
                    <?php echo phpversion(); ?>
                </div>

                <p>Información completa de PHP:</p>

                <div class="phpinfo-contenedor">
                    <?php phpinfo(); ?>
                </div>

            </div>
        </div>

        <!-- Fecha y hora -->
        <div class="card shadow mb-4">
            <div class="card-header bg-warning">
                <h4 class="mb-0">Fecha y hora del sistema</h4>
            </div>

            <div class="card-body">

                <p class="fs-5">
                    <strong>Formato largo:</strong>
                    <?php echo date("l jS \of F Y h:i:s A"); ?>
                </p>

                <p class="fs-5">
                    <strong>Formato sencillo:</strong>
                    <?php echo date("d/m/y h:i:s A"); ?>
                </p>

            </div>
        </div>

    </main>

    <!-- Pie de página -->
    <footer class="bg-danger text-white text-center py-3">
        Desarrollo Web en Entorno Servidor
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>