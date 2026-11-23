const formulario = document.getElementById("formulario");
const num = document.getElementById("num");

formulario.addEventListener("submit", function(event) {

    let valor = num.value.trim();

    // Comprobamos que no esté vacío
    if (valor === "") {
        num.classList.add("is-invalid");
        event.preventDefault();
        return;
    }

    // Comprobamos que sea un número entero positivo
    if (!/^[1-9]\d*$/.test(valor) || Number(valor) > 20) {
        num.classList.add("is-invalid");
        event.preventDefault();
    } else {
        num.classList.remove("is-invalid");
    }

});