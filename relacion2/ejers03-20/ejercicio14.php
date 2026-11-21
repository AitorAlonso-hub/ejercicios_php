<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prueba numérica</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <!-- Cabecera -->
    <header class="bg-primary text-white text-center py-4">
        <h1>Prueba numérica</h1>
        <p class="mb-0">Clasificación de notas con PHP y JavaScript</p>
    </header>

    <main class="container my-5">

        <div class="row justify-content-center">
            <div class="col-md-6">

                <div class="card shadow">

                    <div class="card-header bg-primary text-white text-center">
                        <h4 class="mb-0">Introduce tu nota</h4>
                    </div>

                    <div class="card-body">

                        <!-- Formulario -->
                        <form action="" method="POST" id="formulario" novalidate>

                            <div class="mb-3">
                                <label for="nota" class="form-label">Nota (entre 1 y 10):</label>

                                <input type="text" class="form-control" id="nota" name="nota">

                                <div class="invalid-feedback" id="errorNota"></div>
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">
                                    Comprobar nota
                                </button>
                            </div>

                        </form>

                        <?php

                        // Comprobar si se ha enviado el formulario
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {

                            // Recoger la nota
                            $nota = $_POST["nota"];

                            // Comprobar que sea un número entre 1 y 10
                            if (is_numeric($nota) && $nota >= 1 && $nota <= 10) {

                                // Transformar el valor a int y no permitir decimales
                                $nota = (int) $nota;

                                // Clasificar la nota
                                if ($nota >= 1 && $nota < 5) {
                                    $resultado = "Suspenso";
                                    $color = "danger";
                                } else if ($nota == 5) {
                                    $resultado = "Suficiente";
                                    $color = "warning";
                                } else if ($nota == 6) {
                                    $resultado = "Bien";
                                    $color = "info";
                                } else if ($nota == 7 || $nota == 8) {
                                    $resultado = "Notable";
                                    $color = "primary";
                                } else {
                                    $resultado = "Sobresaliente";
                                    $color = "success";
                                }

                                // Mostrar el resultado
                                echo '<div class="card mt-4 shadow-sm">';

                                echo '<div class="card-header bg-success text-white">';
                                echo '<h5 class="mb-0">Resultado de la prueba</h5>';
                                echo '</div>';

                                echo '<div class="card-body">';

                                echo '<h4>Nota: ' . $nota . '</h4>';

                                echo '<div class="alert alert-' . $color . ' mt-3">';
                                echo '<strong>Resultado: ' . $resultado . '</strong>';
                                echo '</div>';

                                // Barra de progreso
                                echo '<p>Representación de la nota:</p>';

                                echo '<div class="progress" role="progressbar" aria-label="Nota obtenida"';
                                echo ' aria-valuenow="' . ($nota * 10) . '" aria-valuemin="0" aria-valuemax="100">';

                                echo '<div class="progress-bar bg-' . $color . '" style="width: ' . ($nota * 10) . '%">';
                                echo $nota . '/10';
                                echo '</div>';

                                echo '</div>';

                                echo '</div>';
                                echo '</div>';
                            } else {

                                echo '<div class="alert alert-danger mt-4">';
                                echo 'El número debe estar entre 1 y 10.';
                                echo '</div>';
                            }
                        }

                        ?>

                    </div>
                </div>

            </div>
        </div>

    </main>

    <!-- Pie de página -->
    <footer class="bg-danger text-white text-center py-3">
        Desarrollo Web en Entorno Servidor
    </footer>

    <!-- JavaScript -->
    <script>
        // Obtener el formulario
        const formulario = document.getElementById("formulario");

        // Validar cuando se envía
        formulario.addEventListener("submit", function(event) {

            let nota = document.getElementById("nota").value.trim();
            let campoNota = document.getElementById("nota");
            let errorNota = document.getElementById("errorNota");

            // Limpiar errores anteriores
            campoNota.classList.remove("is-invalid", "is-valid");
            errorNota.textContent = "";

            // Comprobar si está vacío
            if (nota === "") {

                event.preventDefault();

                campoNota.classList.add("is-invalid");
                errorNota.textContent = "Debes introducir una nota.";

            } else if (isNaN(nota)) {

                event.preventDefault();

                campoNota.classList.add("is-invalid");
                errorNota.textContent = "Debes introducir un número.";

            } else if (Number(nota) < 1 || Number(nota) > 10) {

                event.preventDefault();

                campoNota.classList.add("is-invalid");
                errorNota.textContent = "La nota debe estar entre 1 y 10.";

            } else {

                campoNota.classList.add("is-valid");

            }

        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>