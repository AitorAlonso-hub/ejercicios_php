# Ejercicio 12 de la relación 2 de EJERCICIOS PHP (DWES 2º DAW)

Este ejercicio contiene, entre otras cosas:
* un archivo [12formulario.php](https://github.com/pgonaug-playamar/formulario-con-validaciones/blob/main/12formulario.php): una página HTML con un formulario con estilo Bootstrap. Obsérvese que tras cada campo input,
  hay un div con un texto que inicialmente se oculta, utilizándose para ello una pequeña indicación de estilo. Ese campo se visualizará sí y solo sí
  se produce un error de validación (ver validación.js)
  
  ![Formulario de entrada](https://github.com/pgonaug-playamar/formulario-con-validaciones/blob/main/screenshots/imagen-form.png)
  
* [validación.js](https://github.com/pgonaug-playamar/formulario-con-validaciones/blob/main/validaciones.js) es un archivo js enlazado con el anterior, que incluye la adición de eventListeners:
   * al formulario de entrada (asociado al evento submit), para que se desencadena la comprobación de la adecuación de cada campo introducido,
     y de no ser así, modificar su apariencia visual (estilo) con un resaltado en rojo y la aparición del mensaje de error oculto
   * a cada campo de entrada validado, por si se produjera un error y una posterior rectificación, devolviendolo a su aspecto original\ 
>
>   **IMPORTANTE:** obsérvese que lo primero que se hace al manejar el evento submit, es frenar su acción asociada por defecto (preventDefault)
>   y solo si se demuestra que todos los campos son correctos, se reactiva ese comportamiento por defecto, que es el envío de los datos a 12calculo-notas.php
> 
   ![formulario con errores](https://github.com/pgonaug-playamar/formulario-con-validaciones/blob/main/screenshots/imagen-form-2.png)
   ![formulario con rectificación de errores](https://github.com/pgonaug-playamar/formulario-con-validaciones/blob/main/screenshots/imagen-form-3.png)
 
* un archivo [12calculo-notas.php](https://github.com/pgonaug-playamar/formulario-con-validaciones/blob/main/12calculo-notas.php) que "descarga" los datos recibidos por la superglobal $_GET desde el formulario,
  habiendo pasado ya el primer filtro de validación en el lado cliente. Una vez depositados los dats en variables locales php,
  realiza el cálculo requerido (una simple media aritmética, y resta de las faltas, ponderadas a 0.25 cada una. Para editar los
  resultados, se utiliza un component Bootstrap, la progress bar, que le añade un plus visual. El color de la progress bar
  dependerá de la nota: verde si es superior a 7, amarilla si es 5 o 6 y roja si es menor o igual a 4
  
  ![cálculo de nota final](https://github.com/pgonaug-playamar/formulario-con-validaciones/blob/main/screenshots/imagen-form-4.png)
