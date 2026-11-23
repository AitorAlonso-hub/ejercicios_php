<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>División y MCD con Euclides</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- CSS personalizado -->
    <link rel="stylesheet" href="style.css">
</head>

<body class="bg-light">

    <header class="bg-primary text-white text-center p-4">
        <h1>División y MCD con Euclides</h1>
        <p>Ejercicio 3 - Relación 3</p>
    </header>

    <main class="container mt-5">

        <div class="card shadow">

            <div class="card-header bg-primary text-white">
                <h4>Introduce dos números</h4>
            </div>

            <div class="card-body">

                <form id="formulario" method="POST" action="" novalidate>

                    <div class="mb-3">
                        <label for="num1" class="form-label">
                            Primer número:
                        </label>

                        <input type="number" class="form-control" id="num1" name="num1"
                            placeholder="Introduce el primer número"
                            min="1" max="1000" step="1"
                            value="<?php echo isset($_POST['num1']) ? htmlspecialchars($_POST['num1']) : ''; ?>">

                        <div class="invalid-feedback">
                            Introduce un entero entre 1 y 1000.
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="num2" class="form-label">
                            Segundo número:
                        </label>

                        <input type="number" class="form-control" id="num2" name="num2"
                            placeholder="Introduce el segundo número"
                            min="1" max="1000" step="1"
                            value="<?php echo isset($_POST['num2']) ? htmlspecialchars($_POST['num2']) : ''; ?>">

                        <div class="invalid-feedback">
                            Introduce un entero entre 1 y 1000.
                        </div>
                    </div>

                    <div class="mb-3">

                        <label class="form-label">
                            Selecciona las operaciones:
                        </label>

                        <div class="form-check">
                            <input class="form-check-input" type="checkbox"
                                id="division" name="operaciones[]" value="division"
                                <?php if (isset($_POST['operaciones']) && in_array('division', $_POST['operaciones'])) echo 'checked'; ?>>

                            <label class="form-check-label" for="division">
                                Calcular cociente y resto
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="checkbox"
                                id="mcd" name="operaciones[]" value="mcd"
                                <?php if (isset($_POST['operaciones']) && in_array('mcd', $_POST['operaciones'])) echo 'checked'; ?>>

                            <label class="form-check-label" for="mcd">
                                Calcular máximo común divisor (MCD)
                            </label>
                        </div>

                        <div id="errorOperacion" class="text-danger mt-1" style="display: none;">
                            Selecciona al menos una operación.
                        </div>

                    </div>

                    <button type="submit" class="btn btn-primary">
                        Calcular
                    </button>

                    <button type="reset" class="btn btn-secondary">
                        Borrar
                    </button>

                </form>

                <?php

                // Incluimos las funciones
                require_once "euclides.php";

                if ($_SERVER["REQUEST_METHOD"] == "POST") {

                    $num1 = $_POST["num1"] ?? "";
                    $num2 = $_POST["num2"] ?? "";
                    $operaciones = $_POST["operaciones"] ?? [];

                    // Comprobamos que las operaciones sean válidas
                    $operacionesValidas = is_array($operaciones);

                    if ($operacionesValidas) {
                        foreach ($operaciones as $operacion) {
                            if ($operacion != "division" && $operacion != "mcd") {
                                $operacionesValidas = false;
                            }
                        }
                    }

                    // Comprobamos los números y las operaciones
                    if (
                        filter_var($num1, FILTER_VALIDATE_INT) !== false &&
                        filter_var($num2, FILTER_VALIDATE_INT) !== false &&
                        $num1 >= 1 && $num1 <= 1000 &&
                        $num2 >= 1 && $num2 <= 1000 &&
                        $operacionesValidas &&
                        count($operaciones) > 0
                    ) {

                        echo "<div class='alert alert-info mt-4'>";
                        echo "<h5>Resultados:</h5>";

                        // OPERACIÓN 1: DIVISIÓN
                        if (in_array("division", $operaciones)) {

                            // División normal
                            $resultadoNormal = divisionEuclides($num1, $num2);

                            // División recursiva
                            $resultadoRecursivo = divisionEuclidesRecursiva($num1, $num2);

                            echo "<h6>División de Euclides con función normal:</h6>";
                            echo "Cociente = <strong>" . $resultadoNormal[0] . "</strong><br>";
                            echo "Resto = <strong>" . $resultadoNormal[1] . "</strong>";

                            echo "<hr>";

                            echo "<h6>División de Euclides con función recursiva:</h6>";
                            echo "Cociente = <strong>" . $resultadoRecursivo[0] . "</strong><br>";
                            echo "Resto = <strong>" . $resultadoRecursivo[1] . "</strong>";

                            echo "<hr>";
                        }

                        // OPERACIÓN 2: MCD
                        if (in_array("mcd", $operaciones)) {

                            // MCD normal
                            $resultadoNormal = mcdEuclides($num1, $num2);

                            // MCD recursivo
                            $resultadoRecursivo = mcdEuclidesRecursivo($num1, $num2);

                            echo "<h6>MCD de Euclides con función normal:</h6>";
                            echo "El MCD es: <strong>" . $resultadoNormal . "</strong>";

                            echo "<hr>";

                            echo "<h6>MCD de Euclides con función recursiva:</h6>";
                            echo "El MCD es: <strong>" . $resultadoRecursivo . "</strong>";
                        }

                        echo "</div>";
                    } else {

                        echo "<div class='alert alert-danger mt-4'>";
                        echo "Introduce dos números enteros entre 1 y 1000 y selecciona al menos una operación.";
                        echo "</div>";
                    }
                }

                ?>

            </div>
        </div>

    </main>

    <footer class="bg-danger text-white text-center p-3 mt-5">
        Desarrollo Web en Entorno Servidor
    </footer>

    <!-- JavaScript -->
    <script src="validarNumeros.js"></script>

</body>

</html>