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

                <?php
                // phpinfo() muestra información completa de la configuración de PHP.
                // Se deja comentado para no mostrar una página enorme dentro de la tarjeta.
                // phpinfo();
                ?>

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