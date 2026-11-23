<?php

// Función normal: utiliza un bucle for
function factorial($num)
{
    $resultado = 1;

    for ($i = $num; $i >= 1; $i--) {
        $resultado = $resultado * $i;
    }

    return $resultado;
}


// Función recursiva: se llama a sí misma
function factorialRecursivo($num)
{
    if ($num <= 1) {
        return 1;
    }

    return $num * factorialRecursivo($num - 1);
}
