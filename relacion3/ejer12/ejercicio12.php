<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 12 - Ordenación por burbuja</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <header class="bg-primary text-white text-center p-4">
        <h1>Ejercicio 12</h1>
        <p>Ordenación de arrays mediante el algoritmo de burbuja</p>
    </header>

    <main class="container mt-5">

        <div class="card shadow">

            <div class="card-header bg-primary text-white">
                <h4>Prueba de la función ordenarBurbuja()</h4>
            </div>

            <div class="card-body">

                <?php

                // Incluimos la librería de funciones
                include("./ordenarBurbuja.php");


                // PRUEBA CON UN ARRAY DE STRINGS

                $datos = [
                    'Pérez',
                    'García',
                    'López',
                    'Márquez',
                    'Álvarez',
                    'Domínguez',
                    'Ruíz',
                    'Díaz'
                ];

                echo '<h5>Array de nombres</h5>';

                echo '<p>Array original:</p>';
                echo '<pre>';
                print_r($datos);
                echo '</pre>';

                // Ordenamos el array original
                ordenarBurbuja($datos);

                echo '<p>Array ordenado:</p>';
                echo '<pre>';
                print_r($datos);
                echo '</pre>';


                echo '<hr>';


                // PRUEBA CON UN ARRAY DE NÚMEROS

                $numeros = [8, 3, 10, 1, 5, 2, 9, 4];

                echo '<h5>Array de números</h5>';

                echo '<p>Array original:</p>';
                echo '<pre>';
                print_r($numeros);
                echo '</pre>';

                // Ordenamos el array original
                ordenarBurbuja($numeros);

                echo '<p>Array ordenado:</p>';
                echo '<pre>';
                print_r($numeros);
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