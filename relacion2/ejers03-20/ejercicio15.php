<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calcular factorial</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <header class="bg-primary text-white text-center p-4">
        <h1>Calculadora de factoriales</h1>
        <p>Ejercicio 15 - Desarrollo Web en Entorno Servidor</p>
    </header>

    <main class="container mt-5">

        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h4>Introduce un número</h4>
            </div>

            <div class="card-body">

                <form id="formulario" method="POST" action="" novalidate>

                    <div class="mb-3">
                        <label for="num" class="form-label">Número entero positivo:</label>

                        <input type="number" class="form-control" id="num" name="num"
                            placeholder="Escribe un número" step="1">

                        <div class="invalid-feedback">
                            Introduce un número entero positivo.
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">
                        Calcular factorial
                    </button>

                    <button type="reset" class="btn btn-secondary">
                        Borrar
                    </button>

                </form>

                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {

                    $num = $_POST["num"];

                    if (is_numeric($num) && filter_var($num, FILTER_VALIDATE_INT) !== false && $num > 0) {

                        // Inicializamos factorial en 1
                        $factorial = 1;

                        echo "<div class='alert alert-info mt-4'>";
                        echo "<h5>Operación:</h5>";

                        // Recorremos los números desde $num hasta 1
                        for ($i = $num; $i >= 1; $i--) {

                            // Multiplicamos
                            $factorial = $factorial * $i;

                            // Mostramos el número actual
                            echo $i;

                            // Mostramos una x si no hemos llegado al 1
                            if ($i > 1) {
                                echo " x ";
                            }
                        }

                        echo " = <strong>" . $factorial . "</strong>";
                        echo "</div>";
                    } else {
                        echo "<div class='alert alert-danger mt-4'>";
                        echo "Introduce un número entero positivo.";
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

            // Comprobamos que no esté vacío
            if (valor === "") {
                num.classList.add("is-invalid");
                event.preventDefault();
                return;
            }

            // Comprobamos que sea un número entero positivo
            if (!/^[1-9]\d*$/.test(valor)) {
                num.classList.add("is-invalid");
                event.preventDefault();
            } else {
                num.classList.remove("is-invalid");
            }

        });
    </script>

</body>

</html>