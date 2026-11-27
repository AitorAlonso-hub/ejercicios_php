<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 8 - Disyunción</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <header class="bg-primary text-white text-center p-4">
        <h1>Ejercicio 8</h1>
        <p>Conversión de texto - Disyunción</p>
    </header>

    <main class="container mt-5">

        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h4>Introduce un texto</h4>
            </div>

            <div class="card-body">

                <form method="POST" id="formulario">

                    <div class="mb-3">
                        <label for="texto" class="form-label">Texto:</label>
                        <input type="text" class="form-control" id="texto" name="texto"
                            placeholder="Escribe un texto..." required>
                    </div>

                    <p>Selecciona cómo quieres mostrar el texto:</p>

                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio"
                            id="mayusculas" name="opcion" value="mayusculas">
                        <label class="form-check-label" for="mayusculas">
                            Mostrar en mayúsculas
                        </label>
                    </div>

                    <div class="form-check mb-3">
                        <input class="form-check-input" type="radio"
                            id="minusculas" name="opcion" value="minusculas">
                        <label class="form-check-label" for="minusculas">
                            Mostrar en minúsculas
                        </label>
                    </div>

                    <button type="submit" class="btn btn-primary">
                        Convertir texto
                    </button>

                </form>

                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {

                    $texto = $_POST["texto"];
                    $opcion = $_POST["opcion"] ?? "";

                    echo '<hr>';
                    echo '<h5>Resultado:</h5>';

                    if ($opcion == "mayusculas") {
                        echo '<p>' . htmlspecialchars(strtoupper($texto)) . '</p>';
                    } elseif ($opcion == "minusculas") {
                        echo '<p>' . htmlspecialchars(strtolower($texto)) . '</p>';
                    }
                }
                ?>

            </div>
        </div>

    </main>

    <footer class="bg-danger text-white text-center p-3 mt-5">
        Ejercicios PHP - Relación 3
    </footer>

    <script>
        document.getElementById("formulario").addEventListener("submit", function(event) {

            let mayusculas = document.getElementById("mayusculas").checked;
            let minusculas = document.getElementById("minusculas").checked;

            if (!mayusculas && !minusculas) {
                alert("Debes seleccionar una opción.");
                event.preventDefault();
            }

        });
    </script>

</body>

</html>