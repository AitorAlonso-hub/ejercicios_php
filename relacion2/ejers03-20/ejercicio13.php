<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validación con JavaScript</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <!-- Cabecera -->
    <header class="bg-primary text-white text-center py-4">
        <h1>Notas ponderadas</h1>
        <p class="mb-0">Validación de formularios con JavaScript</p>
    </header>

    <main class="container my-5">

        <div class="row justify-content-center">
            <div class="col-md-7">

                <div class="card shadow">

                    <div class="card-header bg-primary text-white text-center">
                        <h4 class="mb-0">Datos del alumno</h4>
                    </div>

                    <div class="card-body">

                        <!-- novalidate desactiva la validación automática del navegador -->
                        <form action="" method="POST" id="formulario" novalidate>

                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre:</label>
                                <input type="text" class="form-control" id="nombre" name="nombre">
                                <div class="invalid-feedback" id="errorNombre"></div>
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Correo electrónico:</label>
                                <input type="text" class="form-control" id="email" name="email">
                                <div class="invalid-feedback" id="errorEmail"></div>
                            </div>

                            <hr>

                            <h5 class="mb-3">Calificaciones</h5>

                            <div class="mb-3">
                                <label for="inicial" class="form-label">Evaluación inicial (10%):</label>
                                <input type="text" class="form-control" id="inicial" name="inicial">
                                <div class="invalid-feedback" id="errorInicial"></div>
                            </div>

                            <div class="mb-3">
                                <label for="primera" class="form-label">Primera evaluación (25%):</label>
                                <input type="text" class="form-control" id="primera" name="primera">
                                <div class="invalid-feedback" id="errorPrimera"></div>
                            </div>

                            <div class="mb-3">
                                <label for="segunda" class="form-label">Segunda evaluación (30%):</label>
                                <input type="text" class="form-control" id="segunda" name="segunda">
                                <div class="invalid-feedback" id="errorSegunda"></div>
                            </div>

                            <div class="mb-3">
                                <label for="tercera" class="form-label">Tercera evaluación (35%):</label>
                                <input type="text" class="form-control" id="tercera" name="tercera">
                                <div class="invalid-feedback" id="errorTercera"></div>
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">
                                    Calcular nota final
                                </button>
                            </div>

                        </form>

                        <?php

                        // Comprobar si se ha enviado el formulario
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {

                            // Recoger los datos
                            $nombre = trim($_POST["nombre"]);
                            $email = trim($_POST["email"]);

                            $rubrica = [
                                "inicial" => 0.10,
                                "primera" => 0.25,
                                "segunda" => 0.30,
                                "tercera" => 0.35
                            ];

                            $notasPersona = [
                                "inicial" => $_POST["inicial"],
                                "primera" => $_POST["primera"],
                                "segunda" => $_POST["segunda"],
                                "tercera" => $_POST["tercera"]
                            ];

                            // Comprobar los datos también en PHP
                            $datosValidos = (
                                $nombre != "" &&
                                filter_var($email, FILTER_VALIDATE_EMAIL)
                            );

                            foreach ($notasPersona as $nota) {
                                if (!is_numeric($nota) || $nota < 0 || $nota > 10) {
                                    $datosValidos = false;
                                }
                            }

                            if ($datosValidos) {

                                // Calcular la nota final
                                $notaFinal = 0;

                                foreach ($rubrica as $periodo => $porcentaje) {
                                    $notaFinal += $notasPersona[$periodo] * $porcentaje;
                                }

                                // Mostrar los resultados
                                echo '<div class="card mt-4 shadow-sm">';
                                echo '<div class="card-header bg-success text-white">';
                                echo '<h5 class="mb-0">Resultados del alumno</h5>';
                                echo '</div>';

                                echo '<div class="card-body">';

                                echo '<p><strong>Nombre:</strong> ' . htmlspecialchars($nombre) . '</p>';
                                echo '<p><strong>Email:</strong> ' . htmlspecialchars($email) . '</p>';

                                echo '<hr>';

                                foreach ($notasPersona as $periodo => $nota) {
                                    $porcentajeEfectivo = $rubrica[$periodo] * 100;

                                    echo '<p>Calificación ' . ucfirst($periodo) . ': ' .
                                        htmlspecialchars($nota) . ' (Peso: ' .
                                        $porcentajeEfectivo . '%)</p>';
                                }

                                echo '<div class="alert alert-info mb-0">';
                                echo '<h4>Nota final: ' . round($notaFinal, 2) . '</h4>';
                                echo '</div>';

                                echo '</div>';
                                echo '</div>';
                            } else {

                                echo '<div class="alert alert-danger mt-4">';
                                echo 'Los datos enviados no son válidos. Vuelve a rellenar el formulario.';
                                echo '</div>';
                            }
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

    <!-- JavaScript -->
    <script>
        // Obtener el formulario
        const formulario = document.getElementById("formulario");

        // Comprobar los datos cuando se envía el formulario
        formulario.addEventListener("submit", function(event) {

            let formularioValido = true;

            // Función para mostrar errores
            function mostrarError(idCampo, idError, mensaje) {

                let campo = document.getElementById(idCampo);
                let error = document.getElementById(idError);

                campo.classList.add("is-invalid");
                campo.classList.remove("is-valid");

                error.textContent = mensaje;

                formularioValido = false;
            }

            // Función para indicar que un campo es correcto
            function campoCorrecto(idCampo, idError) {

                let campo = document.getElementById(idCampo);
                let error = document.getElementById(idError);

                campo.classList.remove("is-invalid");
                campo.classList.add("is-valid");

                error.textContent = "";
            }

            // Recoger los datos y eliminar espacios al principio y al final
            let nombre = document.getElementById("nombre").value.trim();
            let email = document.getElementById("email").value.trim();

            // Validar nombre
            if (nombre === "") {
                mostrarError("nombre", "errorNombre", "El nombre es obligatorio.");
            } else {
                campoCorrecto("nombre", "errorNombre");
            }

            // Validar correo electrónico
            if (email === "") {
                mostrarError("email", "errorEmail", "El correo electrónico es obligatorio.");
            } else if (!email.includes("@") || !email.includes(".")) {
                mostrarError("email", "errorEmail", "Introduce un correo electrónico válido.");
            } else {
                campoCorrecto("email", "errorEmail");
            }

            // Array con los campos de las notas
            let camposNotas = ["inicial", "primera", "segunda", "tercera"];

            // Recorrer y validar las cuatro notas
            for (let i = 0; i < camposNotas.length; i++) {

                let id = camposNotas[i];

                let nota = document.getElementById(id).value.trim();

                let idError = "error" + id.charAt(0).toUpperCase() + id.slice(1);

                // Comprobar que no esté vacío
                if (nota === "") {

                    mostrarError(id, idError, "La nota es obligatoria.");

                } else if (isNaN(nota)) {

                    // Comprobar que sea un número
                    mostrarError(id, idError, "Debes introducir un número.");

                } else if (Number(nota) < 0 || Number(nota) > 10) {

                    // Comprobar que esté entre 0 y 10
                    mostrarError(id, idError, "La nota debe estar entre 0 y 10.");

                } else {

                    campoCorrecto(id, idError);

                }
            }

            // Si hay errores, impedir el envío del formulario
            if (!formularioValido) {
                event.preventDefault();
            }

        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>