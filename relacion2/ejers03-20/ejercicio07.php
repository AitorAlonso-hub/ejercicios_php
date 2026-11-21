<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de dos números</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <!-- Cabecera -->
    <header class="bg-primary text-white text-center py-4">
        <h1>Formulario de dos números</h1>
        <p class="mb-0">Introducción de datos con Bootstrap 5</p>
    </header>

    <main class="container my-5">

        <div class="row justify-content-center">

            <div class="col-md-6">

                <div class="card shadow">

                    <div class="card-header bg-primary text-white text-center">
                        <h4 class="mb-0">Introduce los números</h4>
                    </div>

                    <div class="card-body">

                        <form action="" method="POST">

                            <!-- Primer número -->
                            <div class="mb-3">
                                <label for="numero1" class="form-label">Primer número:</label>
                                <input type="number" class="form-control" id="numero1" name="numero1" required>
                            </div>

                            <!-- Segundo número -->
                            <div class="mb-3">
                                <label for="numero2" class="form-label">Segundo número:</label>
                                <input type="number" class="form-control" id="numero2" name="numero2" required>
                            </div>

                            <!-- Botones -->
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary">
                                    Enviar datos
                                </button>

                                <button type="reset" class="btn btn-secondary">
                                    Limpiar formulario
                                </button>
                            </div>

                        </form>

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

</body>

</html>