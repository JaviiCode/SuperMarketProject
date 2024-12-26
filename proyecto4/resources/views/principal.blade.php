
<html>

<head>
    <title>Formulario de login</title>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script type="text/javascript" src="{{ asset('login.js') }}"></script>
</head>
<body>
<section id="principal" style="display:block">
    {{view("cabecera")}}
    <h2 id="titulo"></h2>
</section>
</body>
</html>
