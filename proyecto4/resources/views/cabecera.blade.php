

<header>
    <h1>Libreria</h1>
    <span id="cab_usuario"></span><br><br>
    Menú:
    <a href="#" onclick="cargarGeneros();">Añadir Categoria</a>
    <a href="#" onclick="cargarLibros();">Listar Categorias</a>
    <a href="#" onclick="cargarCarrito();">Añadir Productos</a>
    <a href="#" onclick="obtenerPedidos();">Carrito</a>
    <a href="#" onclick="logout();">Cerrar sesión</a>
</header>

<script>
    async function obtenerUsuario(){
    const response = await fetch("/getUsario", {
        method: "GET",
        headers: {
            "X-CSRF-TOKEN": token,
            "Content-Type": "application/x-www-form-urlencoded",
        },
    });

    const responseText = await response.json();


    document.getElementById("cab_usuario").innerHTML = "Usuario: "+responseText.usuario;
}
obtenerUsuario();
</script>
