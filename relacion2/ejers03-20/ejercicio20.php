<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conversión de números</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <header class="bg-primary text-white text-center p-4">
        <h1>Conversión de números</h1>
        <p>Ejercicio 20 - Desarrollo Web en Entorno Servidor</p>
    </header>

    <main class="container mt-5">

        <div class="card shadow">

            <div class="card-header bg-primary text-white">
                <h4>Introduce los datos</h4>
            </div>

            <div class="card-body">

                <form method="POST" action="" id="formulario" novalidate>

                    <div class="mb-3">
                        <label for="num" class="form-label">Número decimal:</label>

                        <input type="number" class="form-control" id="num" name="num"
                            placeholder="Introduce un número natural" min="0" step="1">

                        <div class="invalid-feedback">
                            Introduce un número entero igual o superior a 0.
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="opcion" class="form-label">Selecciona operación:</label>

                        <select class="form-select" id="opcion" name="opcion">

                            <option value="">Selecciona operación</option>
                            <option value="1">Binario</option>
                            <option value="2">Octal</option>
                            <option value="3">Hexadecimal</option>

                        </select>

                        <div class="invalid-feedback">
                            Debes seleccionar una operación.
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">
                        Convertir
                    </button>

                    <button type="reset" class="btn btn-secondary">
                        Borrar
                    </button>

                </form>

                <?php

                if ($_SERVER["REQUEST_METHOD"] == "POST") {

                    $num = $_POST["num"];
                    $opcion = $_POST["opcion"] ?? "";

                    // Comprobamos que el número sea natural
                    if (
                        $num !== "" &&
                        filter_var($num, FILTER_VALIDATE_INT) !== false &&
                        $num >= 0 &&
                        in_array($opcion, ["1", "2", "3"])
                    ) {

                        // Elegimos la base mediante match
                        $base = match ($opcion) {
                            "1" => 2,
                            "2" => 8,
                            "3" => 16
                        };

                        // Guardamos el número original
                        $numeroOriginal = $num;

                        // Array para guardar los restos
                        $resultadoArray = [];

                        // Caso especial para el número 0
                        if ($num == 0) {
                            array_push($resultadoArray, 0);
                        }

                        // Realizamos las divisiones sucesivas
                        while ($num > 0) {

                            // Calculamos el resto
                            $resto = $num % $base;

                            // Para hexadecimal convertimos 10-15 en A-F
                            if ($resto >= 10) {

                                $resto = match ($resto) {
                                    10 => "A",
                                    11 => "B",
                                    12 => "C",
                                    13 => "D",
                                    14 => "E",
                                    15 => "F"
                                };
                            }

                            // Guardamos el resto
                            array_push($resultadoArray, $resto);

                            // Dividimos y convertimos a entero
                            $num = (int)($num / $base);
                        }

                        // Acumulador de cadenas
                        $resultado = "";

                        // Recorremos el array desde el final
                        for ($i = count($resultadoArray) - 1; $i >= 0; $i--) {
                            $resultado = $resultado . $resultadoArray[$i];
                        }

                        // Nombre de la conversión
                        $nombreBase = match ($opcion) {
                            "1" => "Binario",
                            "2" => "Octal",
                            "3" => "Hexadecimal"
                        };

                        echo "<div class='alert alert-success mt-4'>";
                        echo "<h5>Resultado de la conversión:</h5>";
                        echo "El número decimal <strong>$numeroOriginal</strong> en $nombreBase es: ";
                        echo "<strong class='fs-4'>$resultado</strong>";
                        echo "</div>";
                    } else {

                        echo "<div class='alert alert-danger mt-4'>";
                        echo "Introduce un número natural y selecciona una operación válida.";
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
        const num = document.getElementById("num");
        const opcion = document.getElementById("opcion");

        formulario.addEventListener("submit", function(event) {

            let correcto = true;

            // Comprobamos que el número sea natural
            if (!/^(0|[1-9]\d*)$/.test(num.value.trim())) {
                num.classList.add("is-invalid");
                correcto = false;
            } else {
                num.classList.remove("is-invalid");
            }

            // Comprobamos que se haya seleccionado una operación
            if (opcion.value === "") {
                opcion.classList.add("is-invalid");
                correcto = false;
            } else {
                opcion.classList.remove("is-invalid");
            }

            // Si hay algún error, no enviamos el formulario
            if (!correcto) {
                event.preventDefault();
            }

        });
    </script>

</body>

</html>