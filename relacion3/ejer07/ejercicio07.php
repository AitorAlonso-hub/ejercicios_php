<?php

// Establecer la zona horaria de España
date_default_timezone_set("Europe/Madrid");

// FUNCIÓN PARA OBTENER EL NOMBRE DEL DÍA EN ESPAÑOL
function nombreDia($numeroDia)
{
    $dias = [
        1 => "Lunes",
        2 => "Martes",
        3 => "Miércoles",
        4 => "Jueves",
        5 => "Viernes",
        6 => "Sábado",
        7 => "Domingo"
    ];

    return $dias[$numeroDia];
}

// FUNCIÓN PARA OBTENER EL NOMBRE DEL MES EN ESPAÑOL
function nombreMes($numeroMes)
{
    $meses = [
        1 => "Enero",
        2 => "Febrero",
        3 => "Marzo",
        4 => "Abril",
        5 => "Mayo",
        6 => "Junio",
        7 => "Julio",
        8 => "Agosto",
        9 => "Septiembre",
        10 => "Octubre",
        11 => "Noviembre",
        12 => "Diciembre"
    ];

    return $meses[$numeroMes];
}

// FECHA Y HORA ACTUAL
$fechaActual = new DateTime();

$dia = $fechaActual->format("j");
$numeroDia = $fechaActual->format("N");
$numeroMes = $fechaActual->format("n");
$anio = $fechaActual->format("Y");

// Obtener el nombre del día y del mes
$diaSemana = nombreDia($numeroDia);
$mes = nombreMes($numeroMes);

// FUNCIONES DATE() Y TIME()
$fechaFormato = date("d/m/Y");
$horaFormato = date("H:i:s");
$marcaTiempo = time();

// FUNCIÓN GETDATE()
$datosFecha = getdate();

// FUNCIÓN MKTIME()
$fechaConcreta = mktime(0, 0, 0, 12, 25, 2026);

// FUNCIÓN STRTOTIME()
$fechaFutura = strtotime("+10 days");

// FUNCIÓN CHECKDATE()
$fechaValida = checkdate(2, 29, 2024);

// ARITMÉTICA CON DATETIME

// Crear una fecha inicial
$fechaInicio = new DateTime("2026-01-01");

// Sumar 7 días
$fechaSuma = clone $fechaInicio;
$fechaSuma->add(new DateInterval("P7D"));

// Restar 1 mes
$fechaResta = clone $fechaInicio;
$fechaResta->sub(new DateInterval("P1M"));

// Calcular la diferencia entre dos fechas
$fechaFin = new DateTime("2026-12-31");

$diferencia = $fechaInicio->diff($fechaFin);

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funciones de fecha y hora</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

    <!-- Cabecera -->
    <header class="bg-primary text-white text-center py-4">
        <h1>Funciones de fecha y hora</h1>
        <p class="mb-0">Práctica de fechas y aritmética en PHP</p>
    </header>

    <main class="container my-5">

        <!-- Fecha actual -->
        <div class="card shadow mb-4">

            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">Fecha y hora actual</h4>
            </div>

            <div class="card-body">

                <p>
                    <strong>Fecha:</strong>
                    <?php echo $fechaFormato; ?>
                </p>

                <p>
                    <strong>Hora:</strong>
                    <?php echo $horaFormato; ?>
                </p>

                <p>
                    <strong>Día de la semana:</strong>
                    <?php echo $diaSemana; ?>
                </p>

                <p>
                    <strong>Día del mes:</strong>
                    <?php echo $dia; ?>
                </p>

                <p>
                    <strong>Mes:</strong>
                    <?php echo $mes; ?>
                </p>

                <p>
                    <strong>Año:</strong>
                    <?php echo $anio; ?>
                </p>

            </div>
        </div>

        <!-- Funciones date y time -->
        <div class="card shadow mb-4">

            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">Funciones date() y time()</h4>
            </div>

            <div class="card-body">

                <p>
                    <strong>Fecha con date():</strong>
                    <?php echo date("d/m/Y"); ?>
                </p>

                <p>
                    <strong>Hora con date():</strong>
                    <?php echo date("H:i:s"); ?>
                </p>

                <p>
                    <strong>Marca de tiempo Unix con time():</strong>
                    <?php echo $marcaTiempo; ?>
                </p>

            </div>
        </div>

        <!-- Función getdate -->
        <div class="card shadow mb-4">

            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">Función getdate()</h4>
            </div>

            <div class="card-body">

                <p>
                    <strong>Día:</strong>
                    <?php echo $datosFecha["mday"]; ?>
                </p>

                <p>
                    <strong>Mes:</strong>
                    <?php echo $datosFecha["mon"]; ?>
                </p>

                <p>
                    <strong>Año:</strong>
                    <?php echo $datosFecha["year"]; ?>
                </p>

                <p>
                    <strong>Hora:</strong>
                    <?php echo $datosFecha["hours"] . ":" . $datosFecha["minutes"] . ":" . $datosFecha["seconds"]; ?>
                </p>

            </div>
        </div>

        <!-- Funciones mktime y strtotime -->
        <div class="card shadow mb-4">

            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">Funciones mktime() y strtotime()</h4>
            </div>

            <div class="card-body">

                <p>
                    <strong>Fecha creada con mktime():</strong>
                    <?php echo date("d/m/Y", $fechaConcreta); ?>
                </p>

                <p>
                    <strong>Fecha dentro de 10 días con strtotime():</strong>
                    <?php echo date("d/m/Y", $fechaFutura); ?>
                </p>

            </div>
        </div>

        <!-- Función checkdate -->
        <div class="card shadow mb-4">

            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">Función checkdate()</h4>
            </div>

            <div class="card-body">

                <p>
                    ¿Es válida la fecha 29/02/2024?

                    <?php
                    if ($fechaValida) {
                        echo '<span class="text-success fw-bold">Sí, es válida.</span>';
                    } else {
                        echo '<span class="text-danger fw-bold">No es válida.</span>';
                    }
                    ?>
                </p>

            </div>
        </div>

        <!-- Aritmética con fechas -->
        <div class="card shadow mb-4">

            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">Aritmética con fechas</h4>
            </div>

            <div class="card-body">

                <p>
                    <strong>Fecha inicial:</strong>
                    <?php echo $fechaInicio->format("d/m/Y"); ?>
                </p>

                <p>
                    <strong>Sumar 7 días:</strong>
                    <?php echo $fechaSuma->format("d/m/Y"); ?>
                </p>

                <p>
                    <strong>Restar 1 mes:</strong>
                    <?php echo $fechaResta->format("d/m/Y"); ?>
                </p>

                <hr>

                <h5>Diferencia entre fechas</h5>

                <p>
                    Fecha inicial:
                    <?php echo $fechaInicio->format("d/m/Y"); ?>
                </p>

                <p>
                    Fecha final:
                    <?php echo $fechaFin->format("d/m/Y"); ?>
                </p>

                <div class="alert alert-info">
                    <strong>Diferencia:</strong>

                    <?php
                    echo $diferencia->y . " años, ";
                    echo $diferencia->m . " meses y ";
                    echo $diferencia->d . " días.";
                    ?>

                    <br>

                    <strong>Total de días:</strong>
                    <?php echo $diferencia->days; ?>
                </div>

            </div>
        </div>

    </main>

    <!-- Pie de página -->
    <footer class="bg-danger text-white text-center py-3">
        Desarrollo Web en Entorno Servidor
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>