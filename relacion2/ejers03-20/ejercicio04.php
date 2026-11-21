<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Días de la semana</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <!-- Cabecera -->
    <header class="container text-center py-5">
        <h1 class="text-primary">Manejo de array constante</h1>
        <p class="text-secondary">Días de la semana con Bootstrap 5</p>
    </header>

    <!-- Contenido -->
    <main class="container pb-5">

        <?php

        // Array constante de días de la semana
        const DIAS_SEMANA = array(
            "Lunes",
            "Martes",
            "Miércoles",
            "Jueves",
            "Viernes",
            "Sábado",
            "Domingo"
        );

        // Solo un día
        echo '<div class="alert alert-primary text-center">';
        echo "Hoy es " . DIAS_SEMANA[4];
        echo '</div>';

        // Todos los días
        echo '<div class="card shadow-sm mb-4">';
        echo '<div class="card-body">';

        echo '<h3 class="text-primary">Todos los días</h3>';

        for ($i = 0; $i <= 6; $i++) {
            echo "Día " . $i . " : " . DIAS_SEMANA[$i] . "<br>";
        }

        echo '</div>';
        echo '</div>';

        // Lista numerada con Bootstrap
        echo '<div class="card shadow-sm mb-4">';
        echo '<div class="card-body">';

        echo '<h3 class="text-primary">En forma de lista numerada</h3>';

        echo '<ol class="list-group list-group-numbered">';

        for ($i = 0; $i <= 6; $i++) {
            echo '<li class="list-group-item">' . DIAS_SEMANA[$i] . '</li>';
        }

        echo '</ol>';

        echo '</div>';
        echo '</div>';

        // Longitud del array
        echo '<div class="alert alert-success text-center">';
        echo '<h3>Longitud del array</h3>';
        echo '<p class="mb-0">Los días de la semana son ' . count(DIAS_SEMANA) . '</p>';
        echo '</div>';

        ?>

    </main>

    <!-- Footer -->
    <footer class="bg-primary text-white text-center py-3">
        Desarrollo Web en Entorno Servidor
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>