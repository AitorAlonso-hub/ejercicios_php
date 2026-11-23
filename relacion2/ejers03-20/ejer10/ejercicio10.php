<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado calculadora</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-secondary-subtle">

    <div id="main" class="container text-center">

        <h2 class="text-primary mt-3">Resultado calculadora</h2>

        <div class="row mt-4">

            <div class="col-md-3"></div>

            <div class="col-md-6">

                <?php

                // Comprobamos que los datos llegan mediante POST
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {

                    // Recogemos los datos del formulario
                    $numero1 = (int) $_POST['numero1'];
                    $numero2 = (int) $_POST['numero2'];
                    $operacion = $_POST['operacion'];

                    // Realizamos la operación con match
                    $resultado = match ($operacion) {
                        "suma" => $numero1 + $numero2,
                        "resta" => $numero1 - $numero2,
                        "multiplicacion" => $numero1 * $numero2,
                        "division" => $numero2 != 0
                            ? $numero1 / $numero2
                            : "Error: División por cero",
                        "porcentaje" => $numero2 != 0
                            ? $numero1 % $numero2
                            : "Error: División por cero",
                        default => "Operación no válida"
                    };

                    // Obtenemos el símbolo de la operación
                    $simbolo = match ($operacion) {
                        "suma" => "+",
                        "resta" => "-",
                        "multiplicacion" => "*",
                        "division" => "/",
                        "porcentaje" => "%",
                        default => "?"
                    };

                    // Mostramos el resultado
                    echo "<div class='alert alert-info shadow-sm fw-bold fs-4'>";

                    echo "Resultado: $numero1 $simbolo $numero2 = $resultado";

                    echo "</div>";
                } else {

                    echo "<div class='alert alert-danger'>";
                    echo "No se han recibido datos del formulario.";
                    echo "</div>";
                }

                ?>

                <a href="ejercicio10.html" class="btn btn-primary">
                    Volver al formulario
                </a>

            </div>

            <div class="col-md-3"></div>

        </div>

    </div>

</body>

</html>