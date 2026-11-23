const formulario = document.getElementById("formulario");
const numero = document.getElementById("numero");

formulario.addEventListener("submit", function(event) {

    let valor = numero.value.trim();

    if (!/^[1-9]\d*$/.test(valor)) {

        numero.classList.add("is-invalid");
        event.preventDefault();

    } else {

        numero.classList.remove("is-invalid");
    }

});