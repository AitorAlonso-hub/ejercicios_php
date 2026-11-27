<?php

// Función que intercambia dos valores
function swap(&$n1, &$n2)
{
    $auxiliar = $n1;
    $n1 = $n2;
    $n2 = $auxiliar;
}


// Función que invierte los elementos de un array utilizando swap()
function invertirArray($array)
{
    $inicio = 0;
    $final = count($array) - 1;

    while ($inicio < $final) {

        swap($array[$inicio], $array[$final]);

        $inicio++;
        $final--;
    }

    return $array;
}
