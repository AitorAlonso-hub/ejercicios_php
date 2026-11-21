<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Array asociativo</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <!-- Cabecera -->
    <header class="container text-center py-5">
        <h1 class="text-primary">Array asociativo</h1>
        <p class="text-secondary">Temperaturas de los días de la semana con Bootstrap 5</p>
    </header>

    <!-- Contenido -->
    <main class="container pb-5">

        <?php

        // Array asociativo de temperaturas
        const DIAS_SEMANA = array(
            "Lunes" => 31,
            "Martes" => 32,
            "Miércoles" => 30,
            "Jueves" => 31,
            "Viernes" => 29,
            "Sábado" => 30,
            "Domingo" => 31
        );

        // Temperatura del viernes
        echo '<div class="alert alert-primary text-center">';
        echo "La temperatura máxima del viernes es: " . DIAS_SEMANA["Viernes"] . " ºC";
        echo '</div>';

        // Recorrido secuencial foreach en texto
        echo '<div class="card shadow-sm mb-4">';
        echo '<div class="card-body">';

        echo '<h3 class="text-primary">Temperaturas de la semana</h3>';

        foreach (DIAS_SEMANA as $etiqueta => $valor) {
            echo "La temperatura del " . $etiqueta . " es: " . $valor . " ºC<br>";
        }

        echo '</div>';
        echo '</div>';

        // Construcción de la tabla
        echo '<div class="card shadow-sm mb-4">';
        echo '<div class="card-body">';

        echo '<h3 class="text-primary mb-3">Tabla de temperaturas</h3>';

        echo '<div class="table-responsive">';
        echo '<table class="table table-striped table-bordered table-hover text-center">';

        echo '<thead class="table-danger">';
        echo '<tr>';
        echo '<th>DÍA</th>';
        echo '<th>TEMPERATURA</th>';
        echo '</tr>';
        echo '</thead>';

        echo '<tbody>';

        foreach (DIAS_SEMANA as $etiqueta => $valor) {
            echo '<tr>';
            echo '<td>' . $etiqueta . '</td>';
            echo '<td>' . $valor . ' ºC</td>';
            echo '</tr>';
        }

        echo '</tbody>';
        echo '</table>';
        echo '</div>';

        echo '</div>';
        echo '</div>';

        // Lista de temperaturas
        echo '<div class="card shadow-sm mb-4">';
        echo '<div class="card-body">';

        echo '<h3 class="text-primary">Lista de temperaturas</h3>';

        echo '<ul class="list-group">';

        foreach (DIAS_SEMANA as $etiqueta => $valor) {
            echo '<li class="list-group-item d-flex justify-content-between">';
            echo $etiqueta;
            echo '<span class="badge bg-primary rounded-pill">' . $valor . ' ºC</span>';
            echo '</li>';
        }

        echo '</ul>';

        echo '</div>';
        echo '</div>';

        ?>

        <!-- Botón de prueba -->
        <div class="text-center mb-4">
            <button class="btn btn-primary">
                Botón de prueba
            </button>
        </div>

        <!-- Spinner de prueba -->
        <div class="text-center">
            <div class="spinner-border text-primary" role="status">
                <span class="visually-hidden">Cargando...</span>
            </div>
            <p class="text-secondary mt-2">Spinner de prueba</p>
        </div>

    </main>

    <!-- Footer -->
    <footer class="bg-danger text-white text-center py-3">
        Desarrollo Web en Entorno Servidor
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>