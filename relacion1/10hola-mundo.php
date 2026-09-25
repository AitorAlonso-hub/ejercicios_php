<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

    /**
     * Resuelve una ecuación de segundo grado: ax^2 + bx + c = 0
     * Solo devuelve resultados si son números reales.
     */
    function resolverEcuacionSegundoGrado($a, $b, $c) {
        // 1. Validar que sea una ecuación de segundo grado
        if ($a == 0) {
            return "El coeficiente 'a' no puede ser 0. No es una ecuación de segundo grado.";
        }

        // 2. Calcular el discriminante (b^2 - 4ac)
        $discriminante = ($b * $b) - (4 * $a * $c);

        // 3. Evaluar el discriminante
        if ($discriminante < 0) {
            return "La ecuación no tiene soluciones reales (las raíces son complejas).";
        } elseif ($discriminante == 0) {
            // Una única solución real
            $x = -$b / (2 * $a);
            return "La ecuación tiene una única solución real: x = " . $x;
        } else {
            // Dos soluciones reales distintas
            $x1 = (-$b + sqrt($discriminante)) / (2 * $a);
            $x2 = (-$b - sqrt($discriminante)) / (2 * $a);
            return "La ecuación tiene dos soluciones reales:\n" . "x1 = " . $x1 . "\n" . "x2 = " . $x2;
        }
    }

    // ==========================================
    // EJEMPLOS DE USO
    // ==========================================

    // Ejemplo 1: Dos soluciones reales (x^2 - 5x + 6 = 0) -> Soluciones: 3 y 2
    echo "Ejemplo 1:\n";
    echo resolverEcuacionSegundoGrado(1, -5, 6);
    echo "\n\n";

    // Ejemplo 2: Una solución real (x^2 - 4x + 4 = 0) -> Solución: 2
    echo "Ejemplo 2:\n";
    echo resolverEcuacionSegundoGrado(1, -4, 4);
    echo "\n\n";

    // Ejemplo 3: Sin soluciones reales (x^2 + 1x + 5 = 0) -> Discriminante negativo
    echo "Ejemplo 3:\n";
    echo resolverEcuacionSegundoGrado(1, 1, 5);
    echo "\n";

    ?>
    
</body>
</html>