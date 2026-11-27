<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 4 - Biblioteca PHP</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f8f9fa;
        }
    </style>
</head>

<body class="bg-light">

    <header class="bg-primary text-white text-center p-4">
        <h1>Biblioteca de funciones PHP</h1>
        <p>Ejercicio 4 - Relación 3</p>
    </header>

    <main class="container mt-5">

        <div class="card shadow">

            <div class="card-header bg-primary text-white">
                <h4>Comprobar números primos</h4>
            </div>

            <div class="card-body">

                <form method="POST" action="" novalidate>

                    <div class="mb-3">
                        <label for="numero" class="form-label">
                            Introduce un número entero positivo:
                        </label>

                        <input type="number" class="form-control" id="numero" name="numero"
                            placeholder="Escribe un número" min="1" max="1000" step="1"
                            value="<?php echo isset($_POST['numero']) ? htmlspecialchars($_POST['numero']) : ''; ?>">
                    </div>

                    <button type="submit" class="btn btn-primary">
                        Buscar primos
                    </button>

                    <button type="reset" class="btn btn-secondary">
                        Borrar
                    </button>

                </form>

                <?php

                // Incluimos la biblioteca de funciones
                include 'relacion3.php';
                /*
                include: incluye el archivo. Si no lo encuentra, 
                muestra un aviso, pero el programa intenta 
                continuar.
                */

                /*
                // Declaración original de la función esPrimo()
                function esPrimo($num)
                {
                    if ($num < 2) {
                        return false;
                    }

                    for ($i = 2; $i < $num; $i++) {

                        if ($num % $i == 0) {
                            return false;
                        }
                    }

                    return true;
                }
                */

                // Comprobamos si se ha enviado el formulario
                if ($_SERVER["REQUEST_METHOD"] == "POST") {

                    $numero = $_POST["numero"] ?? "";

                    // Validamos el número
                    if (
                        filter_var($numero, FILTER_VALIDATE_INT) !== false &&
                        $numero >= 1 &&
                        $numero <= 1000
                    ) {

                        echo "<div class='alert alert-info mt-4'>";
                        echo "<h5>Números primos hasta $numero:</h5>";

                        $encontrado = false;

                        for ($i = 1; $i <= $numero; $i++) {

                            // Utilizamos esPrimo() desde relacion3.php
                            if (esPrimo($i)) {

                                echo $i . " ";
                                $encontrado = true;
                            }
                        }

                        if (!$encontrado) {
                            echo "No hay números primos.";
                        }

                        echo "</div>";
                    } else {

                        echo "<div class='alert alert-danger mt-4'>";
                        echo "Introduce un número entero entre 1 y 1000.";
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

</body>

</html>