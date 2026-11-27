<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 16 - Funciones callback</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <header class="bg-primary text-white text-center p-4">
        <h1>Ejercicio 16</h1>
        <p>Funciones callback para arrays</p>
    </header>

    <main class="container mt-5">

        <div class="card shadow">

            <div class="card-header bg-primary text-white">
                <h4>Operaciones con arrays</h4>
            </div>

            <div class="card-body">

                <?php

                // CREAMOS UN ARRAY CON LOS NÚMEROS DEL 1 AL 100

                $numeros = range(1, 100);

                echo '<div class="alert alert-secondary">';
                echo '<h5>Array original</h5>';
                echo '<p>' . implode(", ", $numeros) . '</p>';
                echo '</div>';


                // 1. ARRAY_ALL: COMPROBAR SI TODOS SON POSITIVOS

                $todosPositivos = array_all(
                    $numeros,
                    fn($numero) => $numero > 0
                );

                echo '<div class="alert alert-primary">';
                echo '<h5>1. array_all()</h5>';

                if ($todosPositivos) {
                    echo 'Todos los números son positivos.';
                } else {
                    echo 'No todos los números son positivos.';
                }

                echo '</div>';


                // 2. ARRAY_ANY: COMPROBAR SI HAY ALGÚN MÚLTIPLO DE 5

                $hayMultiploDeCinco = array_any(
                    $numeros,
                    fn($numero) => $numero % 5 == 0
                );

                echo '<div class="alert alert-success">';
                echo '<h5>2. array_any()</h5>';

                if ($hayMultiploDeCinco) {
                    echo 'Hay números que son múltiplos de 5.';
                } else {
                    echo 'No hay ningún múltiplo de 5.';
                }

                echo '</div>';


                // 3. ARRAY_FILTER: EXTRAER LOS NÚMEROS PRIMOS

                $primos = array_filter(
                    $numeros,
                    function ($numero) {

                        if ($numero < 2) {
                            return false;
                        }

                        for ($i = 2; $i < $numero; $i++) {

                            if ($numero % $i == 0) {
                                return false;
                            }
                        }

                        return true;
                    }
                );

                echo '<div class="alert alert-warning">';
                echo '<h5>3. array_filter()</h5>';
                echo '<p>Números primos:</p>';
                echo implode(", ", $primos);
                echo '</div>';


                // 4. ARRAY_FIND: BUSCAR EL PRIMER NÚMERO
                // QUE TENGA SUS DOS CIFRAS IGUALES

                $numeroEncontrado = array_find(
                    $numeros,
                    fn($numero) =>
                    $numero >= 10 &&
                        $numero <= 99 &&
                        intdiv($numero, 10) == $numero % 10
                );

                echo '<div class="alert alert-info">';
                echo '<h5>4. array_find()</h5>';

                if ($numeroEncontrado !== null) {
                    echo 'El primer número con dos cifras iguales es: ';
                    echo '<strong>' . $numeroEncontrado . '</strong>';
                } else {
                    echo 'No se ha encontrado ningún número.';
                }

                echo '</div>';


                // 5. ARRAY_MAP: CALCULAR EL CUADRADO DE CADA NÚMERO

                $cuadrados = array_map(
                    fn($numero) => $numero * $numero,
                    $numeros
                );

                echo '<div class="alert alert-danger">';
                echo '<h5>5. array_map()</h5>';
                echo '<p>Cuadrado de cada número:</p>';
                echo implode(", ", $cuadrados);
                echo '</div>';


                // 6. ARRAY_WALK: MULTIPLICAR CADA NÚMERO POR DOS

                array_walk(
                    $numeros,
                    function (&$valor) {
                        $valor = $valor * 2;
                    }
                );

                echo '<div class="alert alert-dark">';
                echo '<h5>6. array_walk()</h5>';
                echo '<p>Array original modificado: cada número multiplicado por 2.</p>';
                echo implode(", ", $numeros);
                echo '</div>';

                ?>

            </div>
        </div>

    </main>

    <footer class="bg-danger text-white text-center p-3 mt-5">
        Ejercicios PHP - Relación 3
    </footer>

</body>

</html>