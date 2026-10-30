<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body class="bg-secondary-subtle">

    <div id="main" class="container text-center bg-secondary-subtle">
        <h2 class="text-primary text-center mt-3">Formulario de referencias</h2>

        <div class="row">
            <div class="col-md-3 col-sm-1 col-0"></div>

            <div class="col-md-6 col-sm-10 col-12">
                <!-- SE CORRIGE AQUÍ: Se añade el action y method al formulario -->
                <form class="m-auto mt-5 border rounded p-3 shadow" method="get" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">

                    <div class="mb-3">
                        <label for="n1" class="form-label fw-bold">Número 1:</label>
                        <input type="number" name="n1" class="form-control" id="n1" required step="any">
                    </div>

                    <div class="mb-5">
                        <!-- SE CORRIGE AQUÍ: Se eliminan los atributos incorrectos del select -->
                        <select name="op" class="form-select" aria-label="Default select example">
                            <option selected value="0">Elige operador</option>
                            <option value="+">+</option>
                            <option value="-">-</option>
                            <option value="*">*</option>
                            <option value="/">/</option>
                            <option value="%">%</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="n2" class="form-label">Número 2:</label>
                        <input type="number" name="n2" class="form-control" id="n2" required step="any">
                    </div>

                    <button type="submit" name="calcular" class="btn btn-primary">Calcular</button>
                </form>
            </div>

            <div class="col-md-3 col-sm-1 col-0"></div>

            <?php
            // SE CORRIGE AQUÍ: Se añaden las llaves { } para agrupar todo el bloque lógico
            if (isset($_GET["calcular"])) {
                $n1 = (float) $_GET["n1"];
                $n2 = (float) $_GET["n2"];
                $op = $_GET["op"];

                $resultado = match ($op) {
                    "+" => $n1 + $n2,
                    "-" => $n1 - $n2,
                    "*" => $n1 * $n2,
                    "/" => $n2 != 0 ? $n1 / $n2 : "Error: División por cero",
                    "%" => $n2 != 0 ? (int) $n1 % (int) $n2 : "Error: División por cero",
                    "0" => "no has elegido operador"
                };

                echo "<h3 class='text-center text-primary mt-4'>El resultado es: $resultado</h3>";
            }
            ?>
        </div>
    </div>
</body>

</html>