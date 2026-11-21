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

    <!-- Cabecera -->
    <header class="bg-primary text-white text-center py-4">
        <h1>Conversión de números</h1>
        <p class="mb-0">Binario, octal y hexadecimal con PHP</p>
    </header>

    <main class="container my-5">

        <div class="card shadow">

            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">Formulario de conversión</h4>
            </div>

            <div class="card-body">

                <form method="POST" action="" id="formulario" novalidate>

                    <!-- Número -->
                    <div class="mb-3">
                        <label for="num" class="form-label">Introduce un número natural:</label>

                        <input
                            type="number"
                            class="form-control"
                            id="num"
                            name="num"
                            min="0"
                            step="1"
                            required
                            value="<?php echo isset($_POST['num']) ? htmlspecialchars($_POST['num']) : ''; ?>">
                    </div>

                    <!-- Opciones -->
                    <div class="mb-3">
                        <label for="opcion" class="form-label">Selecciona el tipo de conversión:</label>

                        <select class="form-select" id="opcion" name="opcion" required>
                            <option value="">Selecciona una operación</option>

                            <option value="1" <?php if (isset($_POST['opcion']) && $_POST['opcion'] == "1") echo "selected"; ?>>
                                Binario
                            </option>

                            <option value="2" <?php if (isset($_POST['opcion']) && $_POST['opcion'] == "2") echo "selected"; ?>>
                                Octal
                            </option>

                            <option value="3" <?php if (isset($_POST['opcion']) && $_POST['opcion'] == "3") echo "selected"; ?>>
                                Hexadecimal
                            </option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Convertir</button>
                    <button type="reset" class="btn btn-secondary">Limpiar</button>

                </form>

                <hr>

                <?php

                // Comprobamos si se ha enviado el formulario
                if ($_SERVER["REQUEST_METHOD"] == "POST") {

                    $num = $_POST["num"];
                    $opcion = $_POST["opcion"];

                    // Comprobamos que el número sea natural
                    if (
                        $num !== "" &&
                        filter_var($num, FILTER_VALIDATE_INT) !== false &&
                        (int)$num >= 0 &&
                        in_array($opcion, ["1", "2", "3"])
                    ) {

                        $num = (int)$num;

                        // Elegimos la base según la opción usando match
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
                        $tipoConversion = match ($opcion) {
                            "1" => "Binario",
                            "2" => "Octal",
                            "3" => "Hexadecimal"
                        };

                ?>

                        <div class="alert alert-success mt-3">
                            <h5>Resultado de la conversión</h5>

                            <p class="mb-1">
                                Número original: <strong><?php echo $numeroOriginal; ?></strong>
                            </p>

                            <p class="mb-1">
                                Conversión: <strong><?php echo $tipoConversion; ?></strong>
                            </p>

                            <h3 class="mb-0">
                                <?php echo $resultado; ?>
                            </h3>
                        </div>

                    <?php

                    } else {
                    ?>

                        <div class="alert alert-danger mt-3">
                            Introduce un número natural válido y selecciona una conversión.
                        </div>

                <?php
                    }
                }

                ?>

            </div>
        </div>

    </main>

    <!-- Pie de página -->
    <footer class="bg-danger text-white text-center py-3">
        Desarrollo Web en Entorno Servidor
    </footer>

    <script>
        // Validación con JavaScript
        document.getElementById("formulario").addEventListener("submit", function(event) {

            let numero = document.getElementById("num").value;
            let opcion = document.getElementById("opcion").value;

            // Comprobamos que sea un número natural
            if (!/^(0|[1-9]\d*)$/.test(numero) || opcion === "") {
                alert("Introduce un número natural y selecciona una conversión.");
                event.preventDefault();
            }

        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>