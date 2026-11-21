<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notas ponderadas</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <!-- Cabecera -->
    <header class="bg-primary text-white text-center py-4">
        <h1>Cálculo de notas ponderadas</h1>
        <p class="mb-0">Evaluación mediante porcentajes</p>
    </header>

    <main class="container my-5">

        <div class="row justify-content-center">
            <div class="col-md-7">

                <div class="card shadow">

                    <div class="card-header bg-primary text-white text-center">
                        <h4 class="mb-0">Datos del alumno</h4>
                    </div>

                    <div class="card-body">

                        <!-- Formulario -->
                        <form action="" method="POST">

                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre:</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" required>
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Correo electrónico:</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>

                            <hr>

                            <h5 class="mb-3">Introduce las calificaciones</h5>

                            <div class="mb-3">
                                <label for="inicial" class="form-label">
                                    Evaluación inicial (10%):
                                </label>
                                <input type="number" class="form-control" id="inicial" name="inicial"
                                    min="0" max="10" step="0.1" required>
                            </div>

                            <div class="mb-3">
                                <label for="primera" class="form-label">
                                    Primera evaluación (25%):
                                </label>
                                <input type="number" class="form-control" id="primera" name="primera"
                                    min="0" max="10" step="0.1" required>
                            </div>

                            <div class="mb-3">
                                <label for="segunda" class="form-label">
                                    Segunda evaluación (30%):
                                </label>
                                <input type="number" class="form-control" id="segunda" name="segunda"
                                    min="0" max="10" step="0.1" required>
                            </div>

                            <div class="mb-3">
                                <label for="tercera" class="form-label">
                                    Tercera evaluación (35%):
                                </label>
                                <input type="number" class="form-control" id="tercera" name="tercera"
                                    min="0" max="10" step="0.1" required>
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

                            // Recoger los datos personales
                            $nombre = $_POST["nombre"];
                            $email = $_POST["email"];

                            // Array asociativo con la rúbrica
                            $rubrica = [
                                "inicial" => 0.10,
                                "primera" => 0.25,
                                "segunda" => 0.30,
                                "tercera" => 0.35
                            ];

                            // Array asociativo con las notas de la persona
                            $notasPersona = [
                                "inicial" => $_POST["inicial"],
                                "primera" => $_POST["primera"],
                                "segunda" => $_POST["segunda"],
                                "tercera" => $_POST["tercera"]
                            ];

                            // Contador para acumular la nota final
                            $notaFinal = 0;

                            // Calcular la nota final ponderada
                            foreach ($rubrica as $periodo => $porcentaje) {
                                $notaFinal = $notaFinal + ($notasPersona[$periodo] * $porcentaje);
                            }

                            // Mostrar los resultados
                            echo '<div class="card mt-4 shadow-sm">';

                            echo '<div class="card-header bg-success text-white">';
                            echo '<h5 class="mb-0">Resultados del alumno</h5>';
                            echo '</div>';

                            echo '<div class="card-body">';

                            echo '<p><strong>Nombre:</strong> ' . htmlspecialchars($nombre) . '</p>';
                            echo '<p><strong>Email:</strong> ' . htmlspecialchars($email) . '</p>';

                            echo '<hr>';

                            echo '<h5>Detalle de calificaciones:</h5>';

                            foreach ($notasPersona as $periodo => $nota) {

                                $porcentajeEfectivo = $rubrica[$periodo] * 100;

                                echo '<p>Calificación ' . ucfirst($periodo) . ': ' .
                                    $nota . ' (Peso: ' . $porcentajeEfectivo . '%)</p>';
                            }

                            echo '<div class="alert alert-info mt-3 mb-0">';
                            echo '<h4>Nota final ponderada: ' . round($notaFinal, 2) . '</h4>';
                            echo '</div>';

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