<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora</title>
    <!-- Enlace a Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<!--
Para abrir el archivo http://localhost/ejercicios_php/relacion2/ejer01/1calculadora.php
-->

<body class="bg-secondary-subtle">

    <div id="main" class="container text-center bg-secondary-subtle">
        <h2 class="text-primary text-center mt-3">Calculadora</h2>

        <div class="row">
            <div class="col-md-3 col-sm-1 col-0"></div>

            <div class="col-md-6 col-sm-10 col-12">
                <!-- 
                  P.D: 
                  Para probar POST cambias method="get" por method="post".
                  Dejamos el action vacío para que envíe los datos al mismo archivo.
                -->
                <form class="m-auto mt-5 border rounded p-3 shadow bg-white text-start" method="post" action="">

                    <div class="mb-3">
                        <label for="n1" class="form-label fw-bold">Número 1 (Entero):</label>
                        <!-- Quitamos step="any" para forzar que sea entero -->
                        <input type="number" name="n1" class="form-control" id="n1" required>
                    </div>

                    <div class="mb-3">
                        <label for="op" class="form-label fw-bold">Operador:</label>
                        <select name="op" id="op" class="form-select" required>
                            <option value="" selected disabled>Elige operador</option>
                            <option value="+">+</option>
                            <option value="-">-</option>
                            <option value="*">*</option>
                            <option value="/">/</option>
                            <option value="%">%</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="n2" class="form-label fw-bold">Número 2 (Entero):</label>
                        <input type="number" name="n2" class="form-control" id="n2" required>
                    </div>

                    <button type="submit" name="calcular" class="btn btn-primary w-100 mt-2">Calcular</button>
                </form>
            </div>

            <div class="col-md-3 col-sm-1 col-0"></div>
        </div>

        <!-- Bloque de procesamiento PHP -->
        <div class="row mt-4">
            <div class="col-md-6 offset-md-3">
                <?php
                // Detectamos si el formulario se envió por cualquier método (GET o POST)
                if (isset($_REQUEST['calcular'])) {

                    // Almacenamos el array correspondiente según el método usado
                    $datos = ($_SERVER['REQUEST_METHOD'] === 'POST') ? $_POST : $_GET;

                    // Capturamos y sanitizamos los datos convirtiendo a Entero (int)
                    $n1 = (int)$datos['n1'];
                    $n2 = (int)$datos['n2'];
                    $op = $datos['op'];

                    // Procesamos la operación
                    $resultado = match ($op) {
                        "+" => $n1 + $n2,
                        "-" => $n1 - $n2,
                        "*" => $n1 * $n2,
                        "/" => $n2 !== 0 ? $n1 / $n2 : "Error: División por cero",
                        "%" => $n2 !== 0 ? $n1 % $n2 : "Error: División por cero",
                        default => "Operador no válido o no seleccionado"
                    };

                    // Mostramos el resultado en pantalla de forma elegante
                    echo "<div class='alert alert-info shadow-sm fw-bold fs-4'>";
                    echo "Método usado: " . $_SERVER['REQUEST_METHOD'] . "<br>";
                    echo "Resultado: $n1 $op $n2 = $resultado";
                    echo "</div>";
                }
                ?>
            </div>
        </div>

    </div>
</body>

</html>