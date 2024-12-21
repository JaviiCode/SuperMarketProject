<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script type="text/javascript" src="{{ asset('login.js') }}"></script>
    <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
</head>

<body>

    <section id="login">
        <form action="" method="POST" class="form form-light">
            <h5 class="font-weight-normal">Email</h5> <input class="form-control w-25" id="email" type="text"><br>
            <h5 class="font-weight-normal">Clave</h5> <input class="form-control w-25" id="clave" type="password"><br>
            <input type="button" class="btn btn-primary" value="Iniciar sesión" onclick="login();">
        </form>
    </section>

</body>

</html>
