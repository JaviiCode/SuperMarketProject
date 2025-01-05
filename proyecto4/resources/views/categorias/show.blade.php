@include('layouts.cabecera')

<body>
    <h1>Categoria: <?php echo $categoria->nombre; ?></h1>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="nombre">Nombre:</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $categoria->nombre; ?>" readonly>
        </div>
        <div class="form-group col-md-6">
            <label for="apellidos">Descripción:</label>
            <input type="text" class="form-control" id="descripcion" name="descripcion" value="<?php echo $categoria->descripcion; ?>" readonly>
        </div>
        <br>
        <a href="<?php echo route('categorias.index'); ?>"> <button type="button" class="btn btn-primary">Volver</button> </a>
    </div>
    </form>
