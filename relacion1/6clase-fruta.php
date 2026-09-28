<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Programa PHP una clase fruta, con dos atributos</title>
</head>

<body>
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

    // Mostrar los nombres por pantalla
    echo "Fruta 1: " . $apple->get_name() . "<br>";
    echo "Fruta 2: " . $banana->get_name() . "<br>";

    ?>

</body>

</html>