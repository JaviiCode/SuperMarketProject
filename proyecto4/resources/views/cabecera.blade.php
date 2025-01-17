

<header>
    <script type="text/javascript" src="{{ asset('header.js') }}"></script>
    <h1>Libreria</h1>
    <span id="cab_usuario"></span><br><br>
    Menú:
    <a href="{{route("categorias.create")}}">Añadir Categoria</a>
    <a href="/categorias">Listar Categorias</a>
    <a href="{{route("productos.create")}}">Añadir Productos</a>
    <a href="#" onclick="obtenerPedidos();">Carrito</a>
    <a href="/LogOut">Cerrar sesión</a>
</header>

<script>
    async function obtenerUsuario(){
    const response = await fetch("/getUsario", {
        method: "GET",
        headers: {
            "Content-Type": "application/x-www-form-urlencoded",
        },
    });

    const responseText = await response.json();

    if(responseText.respuesta.length){
        document.getElementById("cab_usuario").innerHTML = "Usuario: "+responseText.respuesta;
    }else{
        window.location="login";
    }

}



obtenerUsuario();
</script>
