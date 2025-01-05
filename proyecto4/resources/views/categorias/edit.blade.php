@include('layouts.cabecera')

<body>
    <h1>Editar Categoria: <?php echo $categoria->nombre; ?></h1>
    <?php
    echo "<form action='" . route('categorias.update', $categoria->id) . "' method='POST'>";

        $csrf = csrf_field();
        $method = method_field('PUT');
        echo $csrf;
        echo $method;
        ?>

        <div class="form-row">

            <div class="form-group col-md-6">
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control" id="nombre" name="nombre"
                    value="<?php echo $categoria->nombre; ?>">
            </div>
            <div class="form-group col-md-6">
                <label for="descripcion">Descripción:</label>
                <input type="text" class="form-control" id="descripcion" name="descripcion"
                    value="<?php echo $categoria->descripcion; ?>">
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Actualizar</button>
            <a href="<?php echo route('categorias.index'); ?>"> <button type="button"
                    class="btn btn-primary">Volver</button> </a>
        </div>
    </form>
