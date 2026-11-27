<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 11 - Swap y arrays</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <header class="bg-primary text-white text-center p-4">
        <h1>Ejercicio 11</h1>
        <p>Intercambio de valores e inversión de arrays</p>
    </header>

    <main class="container mt-5">

        <div class="card shadow">

            <div class="card-header bg-primary text-white">
                <h4>Prueba de las funciones</h4>
            </div>

            <div class="card-body">

                <?php

                // Incluimos la librería de funciones
                include 'functionsRel3.php';


                // PRUEBA DE LA FUNCIÓN SWAP

                $n1 = 10;
                $n2 = 20;

                echo '<h5>Función swap()</h5>';

                echo '<p>Antes del intercambio:</p>';
                echo '<p>Número 1: ' . $n1 . '</p>';
                echo '<p>Número 2: ' . $n2 . '</p>';

                swap($n1, $n2);

                echo '<p>Después del intercambio:</p>';
                echo '<p>Número 1: ' . $n1 . '</p>';
                echo '<p>Número 2: ' . $n2 . '</p>';


                echo '<hr>';


                // PRUEBA DE LA FUNCIÓN invertirArray()

                $numeros = [1, 2, 3, 4, 5, 6];

                echo '<h5>Función invertirArray()</h5>';

                echo '<p>Array original:</p>';
                echo '<pre>';
                print_r($numeros);
                echo '</pre>';

                $arrayInvertido = invertirArray($numeros);

                echo '<p>Array invertido:</p>';
                echo '<pre>';
                print_r($arrayInvertido);
                echo '</pre>';

                ?>

            </div>
        </div>

    </main>

    <footer class="bg-danger text-white text-center p-3 mt-5">
        Ejercicios PHP - Relación 3
    </footer>

</body>

</html>