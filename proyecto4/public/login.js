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


        const response = await fetch("/login", {
            method: "POST",
            headers: {
                "X-CSRF-TOKEN": token,
                "Content-Type": "application/x-www-form-urlencoded",
            },
            body: params.toString({})
        });


        const responseJson = response.json();

        // Manejar la respuesta
        if (response.ok) {
            if (responseJson.respuesta === false) {
                alert("Revise usuario y contraseña");
                window.location.href = "/";
                email = "";
            } else {

                window.location.href = "/principal";
                
            }
        } else {
            console.error("Error en la respuesta: ", response.status);
        }
    } catch (error) {
        console.error("Error en la petición:", error);
    }

    return false;
}
