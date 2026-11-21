<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clase Fruta</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <!-- Cabecera -->
    <header class="bg-primary text-white text-center py-4">
        <h1>Clase Fruta en PHP</h1>
        <p class="mb-0">Creación de objetos y utilización de métodos</p>
    </header>

    <main class="container my-5">

        <?php
        // Definición de la clase Fruta
        class Fruta
        {
            // Atributos
            public $nombre;
            public $color;

            // Método para asignar el nombre
            public function set_name($nombre)
            {
                $this->nombre = $nombre;
            }

            // Método para obtener el nombre
            public function get_name()
            {
                return $this->nombre;
            }
        }

        // Creación de la primera instancia: apple
        $apple = new Fruta();
        $apple->set_name("Apple");

        // Creación de la segunda instancia: banana
        $banana = new Fruta();
        $banana->set_name("Banana");
        ?>

        <!-- Título -->
        <div class="text-center mb-4">
            <h2>Frutas creadas</h2>
            <p class="text-muted">Resultados obtenidos mediante objetos PHP</p>
        </div>

        <!-- Tarjetas de las frutas -->
        <div class="row justify-content-center g-4">

            <div class="col-md-5">
                <div class="card shadow text-center">
                    <div class="card-header bg-success text-white">
                        Fruta 1
                    </div>
                    <div class="card-body">
                        <h3 class="card-title"><?php echo $apple->get_name(); ?></h3>
                        <p class="card-text">Nombre obtenido con el método get_name().</p>
                    </div>
                </div>
            </div>

            <div class="col-md-5">
                <div class="card shadow text-center">
                    <div class="card-header bg-warning text-dark">
                        Fruta 2
                    </div>
                    <div class="card-body">
                        <h3 class="card-title"><?php echo $banana->get_name(); ?></h3>
                        <p class="card-text">Nombre obtenido con el método get_name().</p>
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