<?php

// Inicializar variables
$tiradas = "";
$error = "";
$frecuenciasCorrecto = array_fill(1, 6, 0);
$frecuenciasTrucado = array_fill(1, 6, 0);

// Comprobar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $tiradas = $_POST["tiradas"];

    // Validar el número de tiradas
    if (filter_var($tiradas, FILTER_VALIDATE_INT) === false || $tiradas < 1 || $tiradas > 1000000) {

        $error = "Introduce un número entero entre 1 y 1.000.000.";
    } else {

        // Simular los lanzamientos de los dos dados
        for ($i = 0; $i < $tiradas; $i++) {

            // DADO EQUIPROBABLE
            // Todos los números tienen la misma probabilidad
            $resultadoCorrecto = mt_rand(1, 6);

            $frecuenciasCorrecto[$resultadoCorrecto]++;

            // DADO TRUCADO
            // Los números del 1 al 5 tienen una posibilidad cada uno
            // El número 6 tiene tres posibilidades
            $resultadoTrucado = mt_rand(1, 8);

            if ($resultadoTrucado <= 5) {
                $resultadoTrucado = $resultadoTrucado;
            } else {
                $resultadoTrucado = 6;
            }

            $frecuenciasTrucado[$resultadoTrucado]++;
        }
    }
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simulación de dados</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

    <!-- Cabecera -->
    <header class="bg-primary text-white text-center py-4">
        <h1>Simulación de lanzamiento de dados</h1>
        <p class="mb-0">Dado equiprobable y dado trucado</p>
    </header>

    <main class="container my-5">

        <div class="row justify-content-center">

            <div class="col-md-9">

                <div class="card shadow">

                    <div class="card-header bg-primary text-white text-center">
                        <h4 class="mb-0">Número de lanzamientos</h4>
                    </div>

                    <div class="card-body">

                        <!-- Formulario -->
                        <form action="" method="POST">

                            <div class="mb-3">

                                <label for="tiradas" class="form-label">
                                    Introduce el número de tiradas:
                                </label>

                                <input type="number" class="form-control" id="tiradas" name="tiradas"
                                    min="1" max="1000000" required
                                    value="<?php echo htmlspecialchars((string)$tiradas); ?>">

                            </div>

                            <div class="d-grid">

                                <button type="submit" class="btn btn-primary">
                                    Simular lanzamientos
                                </button>

                            </div>

                        </form>

                        <?php

                        // Mostrar error si existe
                        if ($error != "") {

                            echo '<div class="alert alert-danger mt-4">';
                            echo $error;
                            echo '</div>';
                        }

                        // Mostrar resultados si se han realizado las tiradas
                        if ($_SERVER["REQUEST_METHOD"] == "POST" && $error == "") {

                            echo '<hr>';

                            echo '<h4 class="text-center mb-3">Resultados de la simulación</h4>';

                            echo '<div class="alert alert-info text-center">';
                            echo 'Número total de tiradas: <strong>' . $tiradas . '</strong>';
                            echo '</div>';

                            // Tabla de resultados
                            echo '<div class="table-responsive">';

                            echo '<table class="table table-bordered table-striped text-center">';

                            echo '<thead class="table-primary">';
                            echo '<tr>';
                            echo '<th>Resultado</th>';
                            echo '<th>Dado equiprobable</th>';
                            echo '<th>Dado trucado</th>';
                            echo '</tr>';
                            echo '</thead>';

                            echo '<tbody>';

                            // Mostrar las frecuencias
                            for ($i = 1; $i <= 6; $i++) {

                                echo '<tr>';

                                echo '<td><strong>' . $i . '</strong></td>';

                                echo '<td>' . $frecuenciasCorrecto[$i] . '</td>';

                                echo '<td>' . $frecuenciasTrucado[$i] . '</td>';

                                echo '</tr>';
                            }

                            echo '</tbody>';

                            echo '<tfoot class="table-secondary">';

                            echo '<tr>';

                            echo '<th>Total</th>';

                            echo '<th>' . array_sum($frecuenciasCorrecto) . '</th>';

                            echo '<th>' . array_sum($frecuenciasTrucado) . '</th>';

                            echo '</tr>';

                            echo '</tfoot>';

                            echo '</table>';

                            echo '</div>';

                            // Mostrar porcentajes
                            echo '<h5 class="mt-4">Porcentajes obtenidos</h5>';

                            echo '<div class="table-responsive">';

                            echo '<table class="table table-bordered text-center">';

                            echo '<thead class="table-primary">';
                            echo '<tr>';
                            echo '<th>Resultado</th>';
                            echo '<th>Dado equiprobable</th>';
                            echo '<th>Dado trucado</th>';
                            echo '</tr>';
                            echo '</thead>';

                            echo '<tbody>';

                            for ($i = 1; $i <= 6; $i++) {

                                $porcentajeCorrecto = ($frecuenciasCorrecto[$i] / $tiradas) * 100;

                                $porcentajeTrucado = ($frecuenciasTrucado[$i] / $tiradas) * 100;

                                echo '<tr>';

                                echo '<td><strong>' . $i . '</strong></td>';

                                echo '<td>' . round($porcentajeCorrecto, 2) . '%</td>';

                                echo '<td>' . round($porcentajeTrucado, 2) . '%</td>';

                                echo '</tr>';
                            }

                            echo '</tbody>';

                            echo '</table>';

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

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>