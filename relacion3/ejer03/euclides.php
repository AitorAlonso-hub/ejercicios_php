<?php

// DIVISIÓN DE EUCLIDES CON BUCLE
function divisionEuclides($dividendo, $divisor)
{
    $cociente = 0;

    while ($dividendo >= $divisor) {
        $dividendo = $dividendo - $divisor;
        $cociente++;
    }

    return [$cociente, $dividendo];
}


// DIVISIÓN DE EUCLIDES RECURSIVA
function divisionEuclidesRecursiva($dividendo, $divisor)
{
    // Caso base
    if ($dividendo < $divisor) {
        return [0, $dividendo];
    }

    // Llamada recursiva
    $resultado = divisionEuclidesRecursiva(
        $dividendo - $divisor,
        $divisor
    );

    $resultado[0]++;

    return $resultado;
}


// MCD DE EUCLIDES CON BUCLE
function mcdEuclides($a, $b)
{
    while ($a != $b) {

        if ($a > $b) {
            $a = $a - $b;
        } else {
            $b = $b - $a;
        }
    }

    return $a;
}


// MCD DE EUCLIDES RECURSIVO
function mcdEuclidesRecursivo($a, $b)
{
    // Caso base
    if ($a == $b) {
        return $a;
    }

    // Llamada recursiva
    if ($a > $b) {
        return mcdEuclidesRecursivo($a - $b, $b);
    } else {
        return mcdEuclidesRecursivo($a, $b - $a);
    }
}
