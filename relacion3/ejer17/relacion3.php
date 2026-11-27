<?php

// EJERCICIO 1: NÚMEROS PRIMOS

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


// EJERCICIO 2: FACTORIAL NORMAL

function factorial($num)
{
    $resultado = 1;

    for ($i = $num; $i >= 1; $i--) {
        $resultado = $resultado * $i;
    }

    return $resultado;
}


// EJERCICIO 2: FACTORIAL RECURSIVO

function factorialRecursivo($num)
{
    if ($num <= 1) {
        return 1;
    }

    return $num * factorialRecursivo($num - 1);
}


// EJERCICIO 3: DIVISIÓN DE EUCLIDES CON BUCLE

function divisionEuclides($dividendo, $divisor)
{
    $cociente = 0;

    while ($dividendo >= $divisor) {
        $dividendo = $dividendo - $divisor;
        $cociente++;
    }

    return [$cociente, $dividendo];
}


// EJERCICIO 3: DIVISIÓN DE EUCLIDES RECURSIVA

function divisionEuclidesRecursiva($dividendo, $divisor)
{
    if ($dividendo < $divisor) {
        return [0, $dividendo];
    }

    $resultado = divisionEuclidesRecursiva(
        $dividendo - $divisor,
        $divisor
    );

    $resultado[0]++;

    return $resultado;
}


// EJERCICIO 3: MCD DE EUCLIDES CON BUCLE

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


// EJERCICIO 3: MCD DE EUCLIDES RECURSIVO

function mcdEuclidesRecursivo($a, $b)
{
    if ($a == $b) {
        return $a;
    }

    if ($a > $b) {
        return mcdEuclidesRecursivo($a - $b, $b);
    } else {
        return mcdEuclidesRecursivo($a, $b - $a);
    }
}
