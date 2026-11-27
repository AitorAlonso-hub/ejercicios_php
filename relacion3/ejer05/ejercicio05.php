<?php
// Función para comprobar el DNI
function validarDNI($dni)
{
    $dni = strtoupper($dni);

    if (!preg_match('/^[0-9]{8}[A-Z]$/', $dni)) {
        return false;
    }

    $letras = "TRWAGMYFPDXBNJZSQVHLCKE";

    $numero = substr($dni, 0, 8);
    $letra = substr($dni, 8, 1);

    $letraCalculada = $letras[$numero % 23];

    return $letra == $letraCalculada;
}

// Función para comprobar el NIE
function validarNIE($nie)
{
    $nie = strtoupper($nie);

    if (!preg_match('/^[XYZ][0-9]{7}[A-Z]$/', $nie)) {
        return false;
    }

    $letras = "TRWAGMYFPDXBNJZSQVHLCKE";

    // Sustituimos la primera letra por su número
    $primeraLetra = substr($nie, 0, 1);

    if ($primeraLetra == "X") {
        $numeroInicial = "0";
    } elseif ($primeraLetra == "Y") {
        $numeroInicial = "1";
    } else {
        $numeroInicial = "2";
    }

    $numero = $numeroInicial . substr($nie, 1, 7);
    $letra = substr($nie, 8, 1);

    $letraCalculada = $letras[(int)$numero % 23];

    return $letra == $letraCalculada;
}

// Función para comprobar el número de soporte del TIE
function validarSoporte($soporte)
{
    return preg_match('/^E[0-9]{8}$/', strtoupper($soporte));
}

// Comprobamos si se ha enviado el formulario
$errores = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nombre = trim($_POST["nombre"]);
    $email = trim($_POST["email"]);
    $tipoDocumento = $_POST["tipoDocumento"];
    $documento = strtoupper(trim($_POST["documento"]));
    $soporte = strtoupper(trim($_POST["soporte"] ?? ""));

    // Validar email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errores[] = "El correo electrónico no es válido.";
    }

    // Validar documento según el tipo seleccionado
    if ($tipoDocumento == "dni") {

        if (!validarDNI($documento)) {
            $errores[] = "El DNI no es válido.";
        }
    } elseif ($tipoDocumento == "nie") {

        if (!validarNIE($documento)) {
            $errores[] = "El NIE no es válido.";
        }
    } elseif ($tipoDocumento == "tie") {

        if (!validarNIE($documento)) {
            $errores[] = "El NIE del TIE no es válido.";
        }

        if (!validarSoporte($soporte)) {
            $errores[] = "El número de soporte debe empezar por E y tener 8 dígitos.";
        }
    } else {
        $errores[] = "Selecciona un tipo de documento válido.";
    }

    // Validar las notas
    $rubrica = [
        "inicial" => 0.10,
        "primera" => 0.25,
        "segunda" => 0.30,
        "tercera" => 0.35
    ];

    $notasPersona = [];

    foreach ($rubrica as $periodo => $porcentaje) {

        $nota = $_POST[$periodo] ?? "";

        if (!is_numeric($nota) || $nota < 0 || $nota > 10) {
            $errores[] = "Todas las notas deben estar entre 0 y 10.";
        } else {
            $notasPersona[$periodo] = $nota;
        }
    }

    // Si no hay errores, calculamos la nota final
    if (empty($errores)) {

        $notaFinal = 0;

        foreach ($rubrica as $periodo => $porcentaje) {
            $notaFinal = $notaFinal + ($notasPersona[$periodo] * $porcentaje);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notas ponderadas</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <!-- Cabecera -->
    <header class="bg-primary text-white text-center py-4">
        <h1>Cálculo de notas ponderadas</h1>
        <p class="mb-0">Evaluación mediante porcentajes</p>
    </header>

    <main class="container my-5">

        <div class="row justify-content-center">
            <div class="col-md-7">

                <div class="card shadow">

                    <div class="card-header bg-primary text-white text-center">
                        <h4 class="mb-0">Datos del alumno</h4>
                    </div>

                    <div class="card-body">

                        <!-- Mostrar errores -->
                        <?php if (!empty($errores)) { ?>

                            <div class="alert alert-danger">
                                <h5>Se han encontrado errores:</h5>

                                <ul class="mb-0">
                                    <?php foreach ($errores as $error) { ?>
                                        <li><?php echo htmlspecialchars($error); ?></li>
                                    <?php } ?>
                                </ul>
                            </div>

                        <?php } ?>

                        <!-- Formulario -->
                        <form action="" method="POST" id="formulario">

                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre:</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" required>
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Correo electrónico:</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>

                            <hr>

                            <h5 class="mb-3">Documento de identidad</h5>

                            <div class="mb-3">
                                <label for="tipoDocumento" class="form-label">Tipo de documento:</label>

                                <select class="form-select" id="tipoDocumento" name="tipoDocumento" required>
                                    <option value="">Selecciona una opción</option>
                                    <option value="dni">DNI</option>
                                    <option value="nie">NIE</option>
                                    <option value="tie">TIE</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="documento" class="form-label" id="etiquetaDocumento">
                                    Número de documento:
                                </label>

                                <input type="text" class="form-control" id="documento" name="documento"
                                    placeholder="Ejemplo: 12345678Z" required>
                            </div>

                            <!-- Campo que solo se utiliza para TIE -->
                            <div class="mb-3" id="campoSoporte" style="display: none;">

                                <label for="soporte" class="form-label">
                                    Número de soporte:
                                </label>

                                <input type="text" class="form-control" id="soporte" name="soporte"
                                    placeholder="Ejemplo: E00235566">

                            </div>

                            <hr>

                            <h5 class="mb-3">Introduce las calificaciones</h5>

                            <div class="mb-3">
                                <label for="inicial" class="form-label">
                                    Evaluación inicial (10%):
                                </label>

                                <input type="number" class="form-control" id="inicial" name="inicial"
                                    min="0" max="10" step="0.1" required>
                            </div>

                            <div class="mb-3">
                                <label for="primera" class="form-label">
                                    Primera evaluación (25%):
                                </label>

                                <input type="number" class="form-control" id="primera" name="primera"
                                    min="0" max="10" step="0.1" required>
                            </div>

                            <div class="mb-3">
                                <label for="segunda" class="form-label">
                                    Segunda evaluación (30%):
                                </label>

                                <input type="number" class="form-control" id="segunda" name="segunda"
                                    min="0" max="10" step="0.1" required>
                            </div>

                            <div class="mb-3">
                                <label for="tercera" class="form-label">
                                    Tercera evaluación (35%):
                                </label>

                                <input type="number" class="form-control" id="tercera" name="tercera"
                                    min="0" max="10" step="0.1" required>
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">
                                    Calcular nota final
                                </button>
                            </div>

                        </form>

                        <?php

                        // Mostrar los resultados si no hay errores
                        if ($_SERVER["REQUEST_METHOD"] == "POST" && empty($errores)) {

                            echo '<div class="card mt-4 shadow-sm">';

                            echo '<div class="card-header bg-success text-white">';
                            echo '<h5 class="mb-0">Resultados del alumno</h5>';
                            echo '</div>';

                            echo '<div class="card-body">';

                            echo '<p><strong>Nombre:</strong> ' . htmlspecialchars($nombre) . '</p>';
                            echo '<p><strong>Email:</strong> ' . htmlspecialchars($email) . '</p>';

                            echo '<p><strong>Tipo de documento:</strong> ' . strtoupper(htmlspecialchars($tipoDocumento)) . '</p>';
                            echo '<p><strong>Número de documento:</strong> ' . htmlspecialchars($documento) . '</p>';

                            if ($tipoDocumento == "tie") {
                                echo '<p><strong>Número de soporte:</strong> ' . htmlspecialchars($soporte) . '</p>';
                            }

                            echo '<hr>';

                            echo '<h5>Detalle de calificaciones:</h5>';

                            foreach ($notasPersona as $periodo => $nota) {

                                $porcentajeEfectivo = $rubrica[$periodo] * 100;

                                echo '<p>Calificación ' . ucfirst($periodo) . ': ' .
                                    htmlspecialchars((string)$nota) . ' (Peso: ' . $porcentajeEfectivo . '%)</p>';
                            }

                            echo '<div class="alert alert-info mt-3 mb-0">';
                            echo '<h4>Nota final ponderada: ' . round($notaFinal, 2) . '</h4>';
                            echo '</div>';

                            echo '</div>';
                            echo '</div>';
                        }

                        ?>

                    </div>
                </div>

            </div>
        </div>

    </main>

    <!-- Pie de página -->
    <footer class="bg-danger text-white text-center py-3">
        Desarrollo Web en Entorno Servidor
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- JavaScript de validación -->
    <script src="validarFormulario.js"></script>

</body>

</html>