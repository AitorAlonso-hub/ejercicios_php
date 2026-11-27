// Obtener los elementos del formulario
const formulario = document.getElementById("formulario");
const email = document.getElementById("email");
const tipoDocumento = document.getElementById("tipoDocumento");
const documento = document.getElementById("documento");
const soporte = document.getElementById("soporte");
const campoSoporte = document.getElementById("campoSoporte");

// Mostrar u ocultar el campo de número de soporte
tipoDocumento.addEventListener("change", function () {

    if (tipoDocumento.value === "tie") {

        campoSoporte.style.display = "block";
        soporte.required = true;

    } else {

        campoSoporte.style.display = "none";
        soporte.required = false;
        soporte.value = "";
        soporte.setCustomValidity("");
    }
});

// Comprobar DNI
function validarDNI(dni) {

    const letras = "TRWAGMYFPDXBNJZSQVHLCKE";

    if (!/^[0-9]{8}[A-Z]$/.test(dni)) {
        return false;
    }

    const numero = parseInt(dni.substring(0, 8));
    const letra = dni.charAt(8);

    return letras[numero % 23] === letra;
}

// Comprobar NIE
function validarNIE(nie) {

    const letras = "TRWAGMYFPDXBNJZSQVHLCKE";

    if (!/^[XYZ][0-9]{7}[A-Z]$/.test(nie)) {
        return false;
    }

    let numero = nie.substring(1, 8);

    if (nie.charAt(0) === "X") {
        numero = "0" + numero;
    } else if (nie.charAt(0) === "Y") {
        numero = "1" + numero;
    } else {
        numero = "2" + numero;
    }

    const letra = nie.charAt(8);

    return letras[parseInt(numero) % 23] === letra;
}

// Validar el formulario antes de enviarlo
formulario.addEventListener("submit", function (evento) {

    // Limpiar errores anteriores
    email.setCustomValidity("");
    documento.setCustomValidity("");
    soporte.setCustomValidity("");

    // Validar email
    if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email.value.trim())) {
        email.setCustomValidity("Introduce un correo electrónico válido.");
    }

    // Convertir el documento a mayúsculas
    documento.value = documento.value.trim().toUpperCase();

    // Comprobar el tipo de documento
    if (tipoDocumento.value === "dni") {

        if (!validarDNI(documento.value)) {
            documento.setCustomValidity("El DNI no es válido. Comprueba el número y la letra.");
        }

    } else if (tipoDocumento.value === "nie") {

        if (!validarNIE(documento.value)) {
            documento.setCustomValidity("El NIE no es válido. Comprueba el número y la letra.");
        }

    } else if (tipoDocumento.value === "tie") {

        if (!validarNIE(documento.value)) {
            documento.setCustomValidity("El NIE del TIE no es válido.");
        }

        // Validar número de soporte
        soporte.value = soporte.value.trim().toUpperCase();

        if (!/^E[0-9]{8}$/.test(soporte.value)) {
            soporte.setCustomValidity("El número de soporte debe empezar por E y tener 8 dígitos.");
        }

    }

    // Comprobar si el formulario es válido
    if (!formulario.checkValidity()) {
        evento.preventDefault();
        formulario.reportValidity();
    }

});