<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body class="bg-secondary-subtle">
    <!-- como se monta un grid para distribuir el espacio-->
    <!--1º un div de class container-->
    <div id="main" class="container text-center" class="container bg-secondary-subtle">
        <h2 class="text-primary text-center mt-3">Formulario de referencias</h2>
        <!--2º un div de class row-->

        <div class="row">
            <!--3º varios div de columnas, indicando reparto de las 12 áreas decolumna-->

            <div class="col-md-3 col-sm-1 col-0">
                <!--aqui va un espacio en blanco a la izquierda-->
            </div>
            <div class="col-md-6 col-sm-10 col-12">
                <!--aqui va el formulario-->
                <form class="m-auto mt-5 border rounded p-3 shadow">

                    <!---->
                    <div class="mb-3">
                        <label for="n1" class="form-label fw-bold">Número 1:</label>
                        <input type="number" name="n1" class="form-control" id="n1">
                    </div>

                    <div class="mb-5">
                        <select name="op" class="form-select" aria-label="Default select example" method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>">
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
                        <input type="number" name="n2" class="form-control" id="n2">
                    </div>

                    <!--aquí se procesan los datos al pulsar el botón enviar-->

                    <button type="submit" name="calcular" class="btn btn-primary">Calcular</button>
                </form>
            </div>
            <div class="col-md-3 col-sm-1 col-0">
                <!--aqui va un espacio en blanco a la izquierda-->
            </div>

            <?php
            // Solo se ejecutará solo si lo he pulsado
            if (isset($_GET["calcular"]))
                // ZONA DE DESCARGA de datos
                $n1 = (float) $_GET["n1"]; // podría dar error si no introduzco num en el form
            $n2 = (float) $_GET["n2"]; // podría dar error si no introduzco num en el form
            $op = $_GET["op"];

            $resultado = match ($op) {
                "+" => $n1 + $n2,
                "-" => $n1 - $n2,
                "*" => $n1 * $n2,
                "/" => $n1 / $n2,
                "%" => (int) $n1 % (int) $n2, // si tiene decimales los corta para resto de división
                "0" => "no has elegido operador"
            };

            echo "<h3 class='text-center text-primary mt-2'>El resultado es: $resultado</h3>"

            ?>
        </div>

    </div>

</body>

</html>