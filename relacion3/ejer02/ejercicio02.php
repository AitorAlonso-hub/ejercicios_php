<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calcular factorial</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- CSS personalizado -->
    <link rel="stylesheet" href="style.css">
</head>

<body class="bg-light">

    <header class="bg-primary text-white text-center p-4">
        <h1>Calculadora de factoriales</h1>
        <p>Ejercicio 2 - Relación 3</p>
    </header>

    <main class="container mt-5">

        <div class="card shadow">

            <div class="card-header bg-primary text-white">
                <h4>Introduce un número</h4>
            </div>

            <div class="card-body">

                <form id="formulario" method="POST" action="" novalidate>

                    <div class="mb-3">
                        <label for="num" class="form-label">
                            Número entero positivo:
                        </label>

                        <input type="number" class="form-control" id="num" name="num"
                            placeholder="Escribe un número" min="1" max="20" step="1"
                            value="<?php echo isset($_POST['num']) ? htmlspecialchars($_POST['num']) : ''; ?>">

                        <div class="invalid-feedback">
                            Introduce un número entero entre 1 y 20.
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

                // Incluimos el archivo que contiene las funciones
                require_once "factorial.php";

                if ($_SERVER["REQUEST_METHOD"] == "POST") {

                    $num = $_POST["num"];

                    if (
                        $num !== "" &&
                        filter_var($num, FILTER_VALIDATE_INT) !== false &&
                        $num >= 1 &&
                        $num <= 20
                    ) {

                        // Calculamos los dos factoriales
                        $resultadoNormal = factorial($num);
                        $resultadoRecursivo = factorialRecursivo($num);

                        // Construimos la operación
                        $operacion = "";

                        for ($i = $num; $i >= 1; $i--) {

                            $operacion .= $i;

                            if ($i > 1) {
                                $operacion .= " x ";
                            }
                        }

                        echo "<div class='alert alert-info mt-4'>";

                        echo "<h5>Factorial con función normal:</h5>";
                        echo "<p>" . $operacion . " = <strong>" . $resultadoNormal . "</strong></p>";

                        echo "<hr>";

                        echo "<h5>Factorial con función recursiva:</h5>";
                        echo "<p>" . $operacion . " = <strong>" . $resultadoRecursivo . "</strong></p>";

                        echo "</div>";
                    } else {

                        echo "<div class='alert alert-danger mt-4'>";
                        echo "Introduce un número entero entre 1 y 20.";
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
    <script src="validarNumero.js"></script>

</body>

</html>