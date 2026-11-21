<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Números primos y divisores</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <header class="bg-primary text-white text-center p-4">
        <h1>Números primos y divisores</h1>
        <p>Ejercicio 16 - Desarrollo Web en Entorno Servidor</p>
    </header>

    <main class="container mt-5">

        <div class="card shadow">

            <div class="card-header bg-primary text-white">
                <h4>Introduce un número</h4>
            </div>

            <div class="card-body">

                <form id="formulario" method="POST" action="" novalidate>

                    <div class="mb-3">
                        <label for="numero" class="form-label">Número entero positivo:</label>

                        <input type="number" class="form-control" id="numero" name="numero"
                            placeholder="Escribe un número" step="1">

                        <div class="invalid-feedback">
                            Introduce un número entero positivo.
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Selecciona una operación:</label>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="operacion"
                                id="primo" value="primo">
                            <label class="form-check-label" for="primo">
                                Comprobar si es primo
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="operacion"
                                id="divisores" value="divisores">
                            <label class="form-check-label" for="divisores">
                                Mostrar sus divisores
                            </label>
                        </div>

                        <div id="errorOperacion" class="text-danger mt-1" style="display: none;">
                            Selecciona una operación.
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

                    $numero = $_POST["numero"];
                    $operacion = $_POST["operacion"] ?? "";

                    // Comprobamos que sea un entero positivo
                    if (
                        filter_var($numero, FILTER_VALIDATE_INT) !== false &&
                        $numero > 0 &&
                        ($operacion == "primo" || $operacion == "divisores")
                    ) {

                        echo "<div class='alert alert-info mt-4'>";

                        // OPCIÓN 1: Comprobar si es primo
                        if ($operacion == "primo") {

                            $esPrimo = true;

                            // Comprobamos si tiene algún divisor
                            for ($i = 2; $i < $numero; $i++) {

                                if ($numero % $i == 0) {
                                    $esPrimo = false;
                                    break;
                                }
                            }

                            // Mostramos el resultado
                            if ($numero == 1) {
                                echo "El número <b>$numero</b> no es primo";
                            } else if ($esPrimo) {
                                echo "El número <b class='text-success'>$numero</b> es primo";
                            } else {
                                echo "El número <b class='text-danger'>$numero</b> no es primo";
                            }
                        } else {

                            // OPCIÓN 2: Mostrar los divisores

                            echo "<h5>Divisores de $numero:</h5>";

                            // Recorremos desde 1 hasta el número
                            for ($i = 1; $i <= $numero; $i++) {

                                if ($numero % $i == 0) {
                                    echo "<span class='badge bg-danger me-1'>$i</span>";
                                }
                            }
                        }

                        echo "</div>";
                    } else {

                        echo "<div class='alert alert-danger mt-4'>";
                        echo "Introduce un número entero positivo y selecciona una operación.";
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
        const numero = document.getElementById("numero");
        const errorOperacion = document.getElementById("errorOperacion");

        formulario.addEventListener("submit", function(event) {

            let valor = numero.value.trim();

            let correcto = true;

            // Comprobamos que sea un entero positivo
            if (!/^[1-9]\d*$/.test(valor)) {
                numero.classList.add("is-invalid");
                correcto = false;
            } else {
                numero.classList.remove("is-invalid");
            }

            // Comprobamos que se haya seleccionado una operación
            let operacionSeleccionada = document.querySelector(
                'input[name="operacion"]:checked'
            );

            if (operacionSeleccionada == null) {
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