<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calcula la nota final</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <!-- Cabecera -->
    <header class="bg-primary text-white text-center py-4">
        <h1>Calcula la nota final</h1>
        <p class="mb-0">Cálculo de la media y penalización por faltas</p>
    </header>

    <main class="container my-5">

        <div class="row justify-content-center">
            <div class="col-md-7">

                <div class="card shadow">

                    <div class="card-header bg-primary text-white text-center">
                        <h4 class="mb-0">Introduce las notas</h4>
                    </div>

                    <div class="card-body">

                        <!-- Formulario -->
                        <form action="" method="POST">

                            <div class="mb-3">
                                <label for="nota1" class="form-label">Primera nota:</label>
                                <input type="number" class="form-control" id="nota1" name="nota1"
                                    min="0" max="10" step="0.01" required>
                            </div>

                            <div class="mb-3">
                                <label for="nota2" class="form-label">Segunda nota:</label>
                                <input type="number" class="form-control" id="nota2" name="nota2"
                                    min="0" max="10" step="0.01" required>
                            </div>

                            <div class="mb-3">
                                <label for="faltasSinJustificar" class="form-label">Faltas sin justificar:</label>
                                <input type="number" class="form-control" id="faltasSinJustificar"
                                    name="faltasSinJustificar" min="0" step="1" required>
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">
                                    Calcular nota final
                                </button>
                            </div>

                        </form>

                        <?php

                        // Comprobar si se ha enviado el formulario
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {

                            // Definición de las variables de entrada
                            $nota1 = $_POST["nota1"];
                            $nota2 = $_POST["nota2"];
                            $faltasSinJustificar = $_POST["faltasSinJustificar"];

                            // Cálculo de la nota media
                            $media = ($nota1 + $nota2) / 2;

                            // Descontar por falta
                            $penalizacion = $faltasSinJustificar * 0.25;

                            // Cálculo de la nota final
                            $notaFinal = $media - $penalizacion;

                            // Asegurar que la nota no sea menor que 0
                            if ($notaFinal < 0) {
                                $notaFinal = 0;
                            }

                            // Mostrar el resultado
                            echo '<div class="card mt-4 shadow-sm">';
                            echo '<div class="card-header bg-secondary text-white">';
                            echo '<h5 class="mb-0">Resultados</h5>';
                            echo '</div>';

                            echo '<div class="card-body">';

                            echo '<p>Nota 1: ' . $nota1 . '</p>';
                            echo '<p>Nota 2: ' . $nota2 . '</p>';
                            echo '<p>Media inicial: ' . $media . '</p>';

                            echo '<p>Faltas sin justificar: ' . $faltasSinJustificar .
                                ' (Penalización: -' . $penalizacion . ')</p>';

                            echo '<h4>Nota final: ' . $notaFinal . '</h4>';

                            // Comprobar si aprueba o suspende
                            if ($notaFinal >= 5) {
                                echo '<div class="alert alert-success mt-3 mb-0">';
                                echo '<strong>Resultado: APROBADO</strong>';
                                echo '</div>';
                            } else {
                                echo '<div class="alert alert-danger mt-3 mb-0">';
                                echo '<strong>Resultado: SUSPENSO</strong>';
                                echo '</div>';
                            }

                            echo '</div>';
                            echo '</div>';
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>