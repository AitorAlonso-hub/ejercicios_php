<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>División y MCD con Euclides</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <header class="bg-primary text-white text-center p-4">
        <h1>División y MCD con Euclides</h1>
        <p>Ejercicio 17 - Desarrollo Web en Entorno Servidor</p>
    </header>

    <main class="container mt-5">

        <div class="card shadow">

            <div class="card-header bg-primary text-white">
                <h4>Introduce dos números</h4>
            </div>

            <div class="card-body">

                <form id="formulario" method="POST" action="" novalidate>

                    <div class="mb-3">
                        <label for="num1" class="form-label">Primer número:</label>
                        <input type="number" class="form-control" id="num1" name="num1"
                            placeholder="Introduce el primer número" step="1">

                        <div class="invalid-feedback">
                            Introduce un número entero positivo.
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="num2" class="form-label">Segundo número:</label>
                        <input type="number" class="form-control" id="num2" name="num2"
                            placeholder="Introduce el segundo número" step="1">

                        <div class="invalid-feedback">
                            Introduce un número entero positivo.
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Selecciona las operaciones:</label>

                        <div class="form-check">
                            <input class="form-check-input" type="checkbox"
                                id="division" name="operaciones[]" value="division">

                            <label class="form-check-label" for="division">
                                Calcular cociente y resto
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="checkbox"
                                id="mcd" name="operaciones[]" value="mcd">

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

                if ($_SERVER["REQUEST_METHOD"] == "POST") {

                    $num1 = $_POST["num1"];
                    $num2 = $_POST["num2"];
                    $operaciones = $_POST["operaciones"] ?? [];

                    // Comprobamos que los dos números sean enteros positivos
                    if (
                        filter_var($num1, FILTER_VALIDATE_INT) !== false &&
                        filter_var($num2, FILTER_VALIDATE_INT) !== false &&
                        $num1 > 0 && $num2 > 0 &&
                        count($operaciones) > 0
                    ) {

                        echo "<div class='alert alert-info mt-4'>";
                        echo "<h5>Resultados:</h5>";

                        // OPERACIÓN 1: División entera
                        if (in_array("division", $operaciones)) {

                            // Guardamos el dividendo original
                            $dividendo = $num1;
                            $divisor = $num2;

                            // Inicializamos el contador
                            $contador = 0;

                            // Mientras el dividendo sea mayor o igual que el divisor
                            while ($dividendo >= $divisor) {

                                // Restamos el divisor al dividendo
                                $dividendo = $dividendo - $divisor;

                                // Aumentamos el contador
                                $contador++;
                            }

                            echo "<h6>División entera:</h6>";
                            echo "Cociente = <strong>$contador</strong><br>";
                            echo "Resto = <strong>$dividendo</strong><hr>";
                        }

                        // OPERACIÓN 2: Máximo común divisor
                        if (in_array("mcd", $operaciones)) {

                            // Guardamos los números originales
                            $a = $num1;
                            $b = $num2;

                            // Algoritmo de Euclides mediante restas
                            while ($a != $b) {

                                if ($a > $b) {
                                    $a = $a - $b;
                                } else {
                                    $b = $b - $a;
                                }
                            }

                            // Cuando los dos números son iguales, tenemos el MCD
                            echo "<h6>Máximo común divisor:</h6>";
                            echo "El MCD es: <strong>$a</strong>";
                        }

                        echo "</div>";
                    } else {

                        echo "<div class='alert alert-danger mt-4'>";
                        echo "Introduce dos números enteros positivos y selecciona al menos una operación.";
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

    <!-- JavaScript para validar el formulario -->
    <script>
        const formulario = document.getElementById("formulario");
        const num1 = document.getElementById("num1");
        const num2 = document.getElementById("num2");
        const errorOperacion = document.getElementById("errorOperacion");

        formulario.addEventListener("submit", function(event) {

            let correcto = true;

            // Comprobamos el primer número
            if (!/^[1-9]\d*$/.test(num1.value.trim())) {
                num1.classList.add("is-invalid");
                correcto = false;
            } else {
                num1.classList.remove("is-invalid");
            }

            // Comprobamos el segundo número
            if (!/^[1-9]\d*$/.test(num2.value.trim())) {
                num2.classList.add("is-invalid");
                correcto = false;
            } else {
                num2.classList.remove("is-invalid");
            }

            // Comprobamos que haya al menos una operación seleccionada
            const operaciones = document.querySelectorAll(
                'input[name="operaciones[]"]:checked'
            );

            if (operaciones.length == 0) {
                errorOperacion.style.display = "block";
                correcto = false;
            } else {
                errorOperacion.style.display = "none";
            }

            // Si hay algún error, no enviamos el formulario
            if (!correcto) {
                event.preventDefault();
            }

        });
    </script>

</body>

</html>