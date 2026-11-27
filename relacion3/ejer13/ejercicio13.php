<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 13 - Funciones de strings</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <header class="bg-primary text-white text-center p-4">
        <h1>Ejercicio 13</h1>
        <p>Funciones de manejo de strings en PHP</p>
    </header>

    <main class="container mt-5">

        <div class="card shadow">

            <div class="card-header bg-primary text-white">
                <h4>Introduce una cadena de texto</h4>
            </div>

            <div class="card-body">

                <form method="POST">

                    <div class="mb-3">
                        <label for="texto" class="form-label">Texto:</label>

                        <textarea class="form-control" id="texto" name="texto"
                            rows="4" placeholder="Escribe una frase..." required><?php
                                                                                    if (isset($_POST["texto"])) {
                                                                                        echo htmlspecialchars($_POST["texto"]);
                                                                                    }
                                                                                    ?></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">
                        Analizar texto
                    </button>

                </form>

                <?php

                if ($_SERVER["REQUEST_METHOD"] == "POST") {

                    $texto = $_POST["texto"];

                    if (trim($texto) != "") {

                        // FUNCIONES AUXILIARES

                        // Invierte una cadena respetando caracteres especiales
                        function invertirTexto($cadena)
                        {
                            $caracteres = preg_split('//u', $cadena, -1, PREG_SPLIT_NO_EMPTY);

                            return implode("", array_reverse($caracteres));
                        }


                        // RESULTADO 1: TEXTO DEL REVÉS Y PALÍNDROMO

                        $textoInvertido = invertirTexto($texto);

                        // Quitamos espacios y signos para comprobar el palíndromo
                        $textoLimpio = mb_strtolower($texto, "UTF-8");
                        $textoLimpio = preg_replace('/[^\p{L}\p{N}]/u', '', $textoLimpio);

                        $textoLimpioInvertido = invertirTexto($textoLimpio);

                        $esPalindromo = ($textoLimpio == $textoLimpioInvertido);


                        // RESULTADO 2: PALABRAS EN ORDEN INVERSO

                        $palabras = preg_split('/\s+/u', trim($texto));

                        $palabrasInvertidas = array_reverse($palabras);

                        $resultadoPalabras = implode(" ", $palabrasInvertidas);


                        // RESULTADO 3: MAYÚSCULAS Y MINÚSCULAS

                        $mayusculas = mb_strtoupper($texto, "UTF-8");

                        $minusculas = mb_strtolower($texto, "UTF-8");


                        // RESULTADO 4: CONTAR CARACTERES Y PALABRAS

                        $numeroCaracteres = mb_strlen($texto, "UTF-8");

                        $numeroPalabras = count($palabras);


                        // RESULTADO 5: FUNCIONES DE HASH Y CRYPT

                        $resultadoCrypt = crypt($texto, '$2y$10$usesomesillystringforsalt$');

                        $resultadoMd5 = md5($texto);

                        $resultadoSha1 = sha1($texto);


                        echo '<hr>';
                        echo '<h4 class="mb-3">Resultados del análisis</h4>';


                        // ALERT 1: TEXTO INVERTIDO Y PALÍNDROMO

                        echo '<div class="alert alert-primary">';
                        echo '<h5>Texto del revés</h5>';
                        echo '<p>' . htmlspecialchars($textoInvertido) . '</p>';

                        if ($esPalindromo) {
                            echo '<strong>El texto es palíndromo.</strong>';
                        } else {
                            echo '<strong>El texto no es palíndromo.</strong>';
                        }

                        echo '</div>';


                        // ALERT 2: PALABRAS INVERTIDAS

                        echo '<div class="alert alert-secondary">';
                        echo '<h5>Palabras en orden inverso</h5>';
                        echo '<p>' . htmlspecialchars($resultadoPalabras) . '</p>';
                        echo '</div>';


                        // ALERT 3: MAYÚSCULAS Y MINÚSCULAS

                        echo '<div class="alert alert-success">';
                        echo '<h5>Texto en mayúsculas</h5>';
                        echo '<p>' . htmlspecialchars($mayusculas) . '</p>';

                        echo '<h5>Texto en minúsculas</h5>';
                        echo '<p>' . htmlspecialchars($minusculas) . '</p>';
                        echo '</div>';


                        // ALERT 4: RECUENTO DE CARACTERES Y PALABRAS

                        echo '<div class="alert alert-warning">';
                        echo '<h5>Recuento del texto</h5>';
                        echo '<p> Número de caracteres (incluidos espacios): <strong>' .
                            $numeroCaracteres . '</strong></p>';

                        echo '<p>Número de palabras: <strong>' .
                            $numeroPalabras . '</strong></p>';
                        echo '</div>';


                        // ALERT 5: CRYPT, MD5 Y SHA1

                        echo '<div class="alert alert-info">';
                        echo '<h5>Funciones de cifrado y hash</h5>';

                        echo '<p><strong>CRYPT:</strong><br>' .
                            htmlspecialchars($resultadoCrypt) . '</p>';

                        echo '<p><strong>MD5:</strong><br>' .
                            $resultadoMd5 . '</p>';

                        echo '<p><strong>SHA1:</strong><br>' .
                            $resultadoSha1 . '</p>';

                        echo '</div>';
                    } else {

                        echo '<div class="alert alert-danger mt-3">';
                        echo 'Debes introducir un texto válido.';
                        echo '</div>';
                    }
                }

                ?>

            </div>
        </div>

    </main>

    <footer class="bg-danger text-white text-center p-3 mt-5">
        Ejercicios PHP - Relación 3
    </footer>

</body>

</html>