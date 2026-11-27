<?php
include 'relacion3.php';

// Creamos los dos arrays utilizando range()
$pares = range(1, 20, 2);
$multiplosDeTres = range(3, 39, 3);

// ARRAY_COUNT_VALUES
// Comprobamos cuántos números pares e impares hay en cada array.
$conteoPares = array_count_values(
    array_map(fn($numero) => $numero % 2 == 0 ? "pares" : "impares", $pares)
);

$conteoMultiplos = array_count_values(
    array_map(fn($numero) => $numero % 2 == 0 ? "pares" : "impares", $multiplosDeTres)
);

// ARRAY_ANY
// Comprobamos si existe algún múltiplo de 5.
$hayMultiploCincoPares = array_any(
    $pares,
    fn($numero) => $numero % 5 == 0
);

$hayMultiploCincoTres = array_any(
    $multiplosDeTres,
    fn($numero) => $numero % 5 == 0
);

// ARRAY_FILTER
// Extraemos los números primos utilizando esPrimo() del ejercicio 1.
$primosPares = array_values(array_filter($pares, 'esPrimo'));
$primosTres = array_values(array_filter($multiplosDeTres, 'esPrimo'));

// ARRAY_FIND
// Buscamos el primer número de dos cifras cuyos dígitos sean iguales.
$numeroRepetidoPares = array_find(
    $pares,
    fn($numero) =>
    $numero >= 10 &&
        $numero <= 99 &&
        intdiv($numero, 10) == $numero % 10
);

$numeroRepetidoTres = array_find(
    $multiplosDeTres,
    fn($numero) =>
    $numero >= 10 &&
        $numero <= 99 &&
        intdiv($numero, 10) == $numero % 10
);

// ARRAY_MAP
// Calculamos el cuadrado de cada número.
$cuadradosPares = array_map(fn($numero) => $numero ** 2, $pares);
$cuadradosTres = array_map(fn($numero) => $numero ** 2, $multiplosDeTres);

// ARRAY_INTERSECT
// Buscamos los números que aparecen en los dos arrays.
$comunes = array_values(array_intersect($pares, $multiplosDeTres));

// ARRAY_WALK
// Creamos copias para sustituir cada número por su doble.
$doblesPares = $pares;
$doblesTres = $multiplosDeTres;

array_walk($doblesPares, function (&$valor) {
    $valor = $valor * 2;
});

array_walk($doblesTres, function (&$valor) {
    $valor = $valor * 2;
});

// Función para mostrar arrays de forma sencilla.
function mostrarArray($array)
{
    return implode(", ", $array);
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 17 - Funciones de arrays</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <header class="bg-primary text-white text-center p-4">
        <h1>Ejercicio 17</h1>
        <p class="mb-0">Funciones para trabajar con arrays en PHP</p>
    </header>

    <main class="container mt-5 mb-5">

        <div class="card shadow mb-4">
            <div class="card-header bg-primary text-white">
                <h2 class="h4 mb-0">Arrays iniciales</h2>
            </div>

            <div class="card-body">
                <p><strong>Array pares:</strong> <?= mostrarArray($pares) ?></p>
                <p class="mb-0"><strong>Array múltiplos de 3:</strong> <?= mostrarArray($multiplosDeTres) ?></p>
            </div>
        </div>

        <div class="alert alert-primary">
            <h4>1. array_count_values()</h4>
            <p><strong>Array pares:</strong>
                <?= $conteoPares['pares'] ?? 0 ?> números pares y
                <?= $conteoPares['impares'] ?? 0 ?> impares.
            </p>
            <p class="mb-0"><strong>Array múltiplos de 3:</strong>
                <?= $conteoMultiplos['pares'] ?? 0 ?> números pares y
                <?= $conteoMultiplos['impares'] ?? 0 ?> impares.
            </p>
        </div>

        <div class="alert alert-secondary">
            <h4>2. array_any()</h4>
            <p><strong>Array pares:</strong>
                <?= $hayMultiploCincoPares ? "Sí hay algún múltiplo de 5" : "No hay múltiplos de 5" ?>
            </p>
            <p class="mb-0"><strong>Array múltiplos de 3:</strong>
                <?= $hayMultiploCincoTres ? "Sí hay algún múltiplo de 5" : "No hay múltiplos de 5" ?>
            </p>
        </div>

        <div class="alert alert-success">
            <h4>3. array_filter()</h4>
            <p><strong>Primos del primer array:</strong> <?= mostrarArray($primosPares) ?></p>
            <p class="mb-0"><strong>Primos del segundo array:</strong> <?= mostrarArray($primosTres) ?></p>
        </div>

        <div class="alert alert-warning">
            <h4>4. array_find()</h4>
            <p><strong>Primer array:</strong>
                <?= $numeroRepetidoPares ?? "No se ha encontrado ninguno" ?>
            </p>
            <p class="mb-0"><strong>Segundo array:</strong>
                <?= $numeroRepetidoTres ?? "No se ha encontrado ninguno" ?>
            </p>
        </div>

        <div class="alert alert-info">
            <h4>5. array_map()</h4>
            <p><strong>Cuadrados del primer array:</strong> <?= mostrarArray($cuadradosPares) ?></p>
            <p class="mb-0"><strong>Cuadrados del segundo array:</strong> <?= mostrarArray($cuadradosTres) ?></p>
        </div>

        <div class="alert alert-danger">
            <h4>6. array_walk()</h4>
            <p><strong>Primer array multiplicado por 2:</strong> <?= mostrarArray($doblesPares) ?></p>
            <p class="mb-0"><strong>Segundo array multiplicado por 2:</strong> <?= mostrarArray($doblesTres) ?></p>
        </div>

        <div class="alert alert-dark">
            <h4>7. array_intersect()</h4>
            <p class="mb-0"><strong>Números que aparecen en ambos arrays:</strong>
                <?= mostrarArray($comunes) ?>
            </p>
        </div>

    </main>

    <footer class="bg-danger text-white text-center p-3">
        Ejercicios PHP - Relación 3
    </footer>

</body>

</html>