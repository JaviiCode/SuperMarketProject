let email = ""; // Variable para almacenar el email
let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content'); // Obtener el token CSRF

async function login() {
    try {
        // Obtener los valores del formulario
        email = document.getElementById("usuario").value;
        const password = document.getElementById("clave").value;

        // Preparar parámetros para enviar
        const params = new URLSearchParams();
        params.append("email", email);
        params.append("password", password);

        // Enviar la petición fetch
        const response = await fetch("/login", {
            method: "POST",
            headers: {
                "X-CSRF-TOKEN": token, // Incluir el token CSRF
                "Content-Type": "application/x-www-form-urlencoded", // Tipo de contenido
            },
            body: params.toString() // Enviar los parámetros
        });

        // Convertir la respuesta a JSON
        const responseJson = await response.json();

        // Manejar la respuesta
        if (response.ok) {
            if (responseJson.respuesta === false) {
                alert("Revise usuario y contraseña"); // Mostrar alerta si falla
                window.location.href = "/"; // Redirigir al login
                email = ""; // Limpiar el email
            } else {
                // Redirigir a la página principal si el login es exitoso
                window.location.href = "/principal";
            }
        } else {
            console.error("Error en la respuesta: ", response.status); // Error HTTP
        }
    } catch (error) {
        console.error("Error en la petición:", error); // Error en fetch
    }

    return false; // Evitar cualquier comportamiento por defecto
}
