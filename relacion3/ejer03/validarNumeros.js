const formulario = document.getElementById("formulario");
const num1 = document.getElementById("num1");
const num2 = document.getElementById("num2");
const errorOperacion = document.getElementById("errorOperacion");

formulario.addEventListener("submit", function(event) {

    let correcto = true;

    // Comprobamos el primer número
    if (!/^[1-9]\d*$/.test(num1.value.trim()) || Number(num1.value) > 1000) {
        num1.classList.add("is-invalid");
        correcto = false;
    } else {
        num1.classList.remove("is-invalid");
    }

    // Comprobamos el segundo número
    if (!/^[1-9]\d*$/.test(num2.value.trim()) || Number(num2.value) > 1000) {
        num2.classList.add("is-invalid");
        correcto = false;
    } else {
        num2.classList.remove("is-invalid");
    }

    // Comprobamos que se haya seleccionado alguna operación
    const operaciones = document.querySelectorAll(
        'input[name="operaciones[]"]:checked'
    );

    if (operaciones.length == 0) {
        errorOperacion.style.display = "block";
        correcto = false;
    } else {
        errorOperacion.style.display = "none";
    }

    // Si hay algún error, no enviamos el formulario
    if (!correcto) {
        event.preventDefault();
    }

});