<?php

// Función que ordena un array mediante el algoritmo de burbuja
function ordenarBurbuja(&$array)
{
    $longitud = count($array);

    for ($i = 0; $i < $longitud - 1; $i++) {

        for ($j = 0; $j < $longitud - 1 - $i; $j++) {

            if ($array[$j] > $array[$j + 1]) {

                // Intercambiamos los elementos
                $auxiliar = $array[$j];

                $array[$j] = $array[$j + 1];

                $array[$j + 1] = $auxiliar;
            }
        }
    }
}
