<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Numeros primos</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- CSS propio -->
    <link rel="stylesheet" href="estilos.css">
</head>

<body class="bg-light">

    <?php
    include 'esPrimo.php';
    ?>

    <header class="text-white text-center p-4">
        <h1>Numeros primos</h1>
        <p>Ejercicio 1 - Relacion 3</p>
    </header>

    <main class="container mt-5">

        <div class="card shadow">

            <div class="card-header bg-primary text-white">
                <h4>Introduce un numero</h4>
            </div>

            <div class="card-body">

                <form id="formulario" method="POST" action="" novalidate>

                    <div class="mb-3">

                        <label for="numero" class="form-label">
                            Numero entero positivo:
                        </label>

                        <input type="number"
                            class="form-control"
                            id="numero"
                            name="numero"
                            placeholder="Escribe un numero"
                            step="1">

                        <div class="invalid-feedback">
                            Introduce un numero entero positivo.
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

                    $numero = $_POST["numero"] ?? "";

                    if (
                        filter_var($numero, FILTER_VALIDATE_INT) !== false &&
                        $numero > 0
                    ) {

                        echo "<div class='alert alert-info mt-4'>";

                        echo "<h5>Numeros primos entre 1 y $numero:</h5>";

                        for ($i = 1; $i <= $numero; $i++) {

                            if (esPrimo($i)) {

                                echo "<span class='badge bg-success me-1'>$i</span>";
                            }
                        }

                        echo "</div>";
                    } else {

                        echo "<div class='alert alert-danger mt-4'>";
                        echo "Introduce un numero entero positivo.";
                        echo "</div>";
                    }
                }

                ?>

            </div>
        </div>

    </main>

    <footer class="text-white text-center p-3 mt-5">
        Desarrollo Web en Entorno Servidor
    </footer>

    <!-- JavaScript propio -->
    <script src="validarNumero.js"></script>

</body>

</html>