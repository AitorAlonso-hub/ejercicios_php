<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 14 - Funciones anónimas</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <header class="bg-primary text-white text-center p-4">
        <h1>Ejercicio 14</h1>
        <p>Funciones anónimas en PHP</p>
    </header>

    <main class="container mt-5">

        <div class="card shadow">

            <div class="card-header bg-primary text-white">
                <h4>Cálculos de circunferencia, círculo y esfera</h4>
            </div>

            <div class="card-body">

                <form method="POST">

                    <div class="mb-3">
                        <label for="radio" class="form-label">Introduce el radio:</label>

                        <input type="number" class="form-control" id="radio"
                            name="radio" step="any" min="0"
                            placeholder="Introduce un número positivo..." required>
                    </div>

                    <button type="submit" class="btn btn-primary">
                        Calcular
                    </button>

                </form>

                <?php

                // DECLARACIÓN DE LAS FUNCIONES ANÓNIMAS

                // Calcula la longitud de una circunferencia
                $circunferencia = function ($n) {
                    return 2 * pi() * $n;
                };

                // Calcula el área de un círculo
                $circulo = function ($n) {
                    return pi() * pow($n, 2);
                };

                // Calcula el volumen de una esfera
                $esfera = function ($r) {
                    return (4 / 3) * pi() * pow($r, 3);
                };


                // RECIBIMOS LOS DATOS DEL FORMULARIO

                if ($_SERVER["REQUEST_METHOD"] == "POST") {

                    $radio = $_POST["radio"];

                    if (is_numeric($radio) && $radio > 0) {

                        // INVOCAMOS LAS FUNCIONES ANÓNIMAS

                        $longitud = $circunferencia($radio);

                        $area = $circulo($radio);

                        $volumen = $esfera($radio);


                        // MOSTRAMOS LOS RESULTADOS

                        echo '<hr>';
                        echo '<h5>Resultados de los cálculos</h5>';

                        echo '<div class="alert alert-primary">';
                        echo '<strong>Radio:</strong> ' . $radio;
                        echo '</div>';

                        echo '<div class="alert alert-success">';
                        echo '<strong>Longitud de la circunferencia:</strong> ' .
                            number_format($longitud, 2, ',', '.') . ' unidades';
                        echo '</div>';

                        echo '<div class="alert alert-warning">';
                        echo '<strong>Área del círculo:</strong> ' .
                            number_format($area, 2, ',', '.') . ' unidades cuadradas';
                        echo '</div>';

                        echo '<div class="alert alert-info">';
                        echo '<strong>Volumen de la esfera:</strong> ' .
                            number_format($volumen, 2, ',', '.') . ' unidades cúbicas';
                        echo '</div>';
                    } else {

                        echo '<div class="alert alert-danger mt-3">';
                        echo 'El radio debe ser un número positivo.';
                        echo '</div>';
                    }
                }

                ?>

            </div>
        </div>

    </main>

    <footer class="bg-danger text-white text-center p-3 mt-5">
        Ejercicios PHP - Relación 3
    </footer>

</body>

</html>