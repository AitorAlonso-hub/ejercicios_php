<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conversión de decimal a binario</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <header class="bg-primary text-white text-center p-4">
        <h1>Conversión de decimal a binario</h1>
        <p>Ejercicio 18 - Desarrollo Web en Entorno Servidor</p>
    </header>

    <main class="container mt-5">

        <div class="card shadow">

            <div class="card-header bg-primary text-white">
                <h4>Introduce un número decimal</h4>
            </div>

            <div class="card-body">

                <form method="POST" action="" id="formulario" novalidate>

                    <div class="mb-3">
                        <label for="num" class="form-label">Número natural:</label>

                        <input type="number" class="form-control" id="num" name="num"
                            placeholder="Introduce un número" min="0" step="1">

                        <div class="invalid-feedback">
                            Introduce un número entero igual o superior a 0.
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">
                        Convertir a binario
                    </button>

                    <button type="reset" class="btn btn-secondary">
                        Borrar
                    </button>

                </form>

                <?php

                if ($_SERVER["REQUEST_METHOD"] == "POST") {

                    $num = $_POST["num"];

                    // Comprobamos que el número sea natural
                    if (
                        $num !== "" &&
                        filter_var($num, FILTER_VALIDATE_INT) !== false &&
                        $num >= 0
                    ) {

                        // Guardamos el número original
                        $numeroOriginal = $num;

                        // Array donde guardaremos los restos
                        $binario = [];

                        // Caso especial para el número 0
                        if ($num == 0) {
                            array_push($binario, 0);
                        }

                        // Dividimos entre 2 hasta llegar a 0
                        while ($num > 0) {

                            // Guardamos el resto de la división
                            $resto = $num % 2;

                            // Añadimos el resto al array
                            array_push($binario, $resto);

                            // División y conversión a entero
                            $num = (int)($num / 2);
                        }

                        // Acumulador de cadenas
                        $resultado = "";

                        // Recorremos el array hacia atrás
                        for ($i = count($binario) - 1; $i >= 0; $i--) {
                            $resultado = $resultado . $binario[$i];
                        }

                        echo "<div class='alert alert-success mt-4'>";
                        echo "<h5>Resultado de la conversión:</h5>";
                        echo "El número decimal <strong>$numeroOriginal</strong> en binario es: ";
                        echo "<strong class='fs-4'>$resultado</strong>";
                        echo "</div>";
                    } else {

                        echo "<div class='alert alert-danger mt-4'>";
                        echo "Introduce un número natural válido.";
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

        formulario.addEventListener("submit", function(event) {

            let valor = num.value.trim();

            // Comprobamos que no esté vacío y sea un entero natural
            if (!/^(0|[1-9]\d*)$/.test(valor)) {
                num.classList.add("is-invalid");
                event.preventDefault();
            } else {
                num.classList.remove("is-invalid");
            }

        });
    </script>

</body>

</html>