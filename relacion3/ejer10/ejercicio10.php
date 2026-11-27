<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 10 - Orden inverso</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <header class="bg-primary text-white text-center p-4">
        <h1>Ejercicio 10</h1>
        <p>Mostrar palabras en orden inverso</p>
    </header>

    <main class="container mt-5">

        <div class="card shadow">

            <div class="card-header bg-primary text-white">
                <h4>Introduce un texto</h4>
            </div>

            <div class="card-body">

                <form method="POST">

                    <div class="mb-3">
                        <label for="texto" class="form-label">Texto:</label>

                        <textarea class="form-control" id="texto" name="texto"
                            rows="4" placeholder="Escribe un texto..." required></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">
                        Invertir palabras
                    </button>

                </form>

                <?php

                if ($_SERVER["REQUEST_METHOD"] == "POST") {

                    $texto = trim($_POST["texto"]);

                    if ($texto != "") {

                        // Separamos el texto en palabras
                        $palabras = preg_split('/\s+/', $texto);

                        // Invertimos el orden de las palabras
                        $palabrasInvertidas = array_reverse($palabras);

                        // Unimos las palabras de nuevo
                        $resultado = implode(" ", $palabrasInvertidas);

                        echo '<hr>';
                        echo '<h5>Resultado:</h5>';

                        echo '<p>' . htmlspecialchars($resultado) . '</p>';
                    } else {

                        echo '<div class="alert alert-warning mt-3">';
                        echo 'Debes introducir un texto.';
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