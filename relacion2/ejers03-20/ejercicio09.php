<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora PHP</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-secondary-subtle">

    <div id="main" class="container text-center">

        <h2 class="text-primary mt-3">Calculadora PHP</h2>

        <div class="row">
            <div class="col-md-3"></div>

            <div class="col-md-6">

                <!-- Formulario -->
                <form class="m-auto mt-5 border rounded p-3 shadow bg-white text-start"
                    method="post" action="">

                    <div class="mb-3">
                        <label for="numero1" class="form-label fw-bold">
                            Primer número:
                        </label>
                        <input type="number" step="any" name="numero1"
                            class="form-control" id="numero1" required>
                    </div>

                    <div class="mb-3">
                        <label for="operacion" class="form-label fw-bold">
                            Operador:
                        </label>

                        <select name="operacion" id="operacion"
                            class="form-select" required>

                            <option value="" selected disabled>Elige operación</option>
                            <option value="suma">+</option>
                            <option value="resta">-</option>
                            <option value="multiplicacion">*</option>
                            <option value="division">/</option>
                            <option value="porcentaje">%</option>

                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="numero2" class="form-label fw-bold">
                            Segundo número:
                        </label>
                        <input type="number" step="any" name="numero2"
                            class="form-control" id="numero2" required>
                    </div>

                    <button type="submit" name="calcular"
                        class="btn btn-primary w-100 mt-2">
                        Calcular
                    </button>

                </form>

            </div>

            <div class="col-md-3"></div>
        </div>

        <!-- Procesamiento PHP -->
        <div class="row mt-4">
            <div class="col-md-6 offset-md-3">

                <?php

                // Comprobamos si se ha enviado el formulario
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {

                    // Recogemos los datos enviados mediante POST
                    $numero1 = (float) $_POST['numero1'];
                    $numero2 = (float) $_POST['numero2'];
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

                    // Mostramos el resultado
                    echo "<div class='alert alert-info shadow-sm fw-bold fs-4'>";
                    echo "Resultado: $numero1 $operacion $numero2 = $resultado";
                    echo "</div>";
                }

                ?>

            </div>
        </div>

    </div>

</body>

</html>