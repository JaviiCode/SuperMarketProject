@include('cabecera')

<body>
    <?php
    echo "<form action='" . route('categorias.store') . "' method='POST'>" ;
        $csrf=csrf_field();
        $method=method_field('POST');
        echo $csrf;
        echo $method; ?>

        <div class="form-row">

            <div class="form-group col-md-6">
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="">

                <!-- mensajes de error con plantillas BLADE -->
                @error('nombre')
                    <small class="text-danger">{{ $message }} </small>
                @enderror
            </div>
            <div class="form-group col-md-6">
                <label for="descripcion">Descripcion:</label>
                <input type="text" class="form-control" id="descripcion" name="descripcion" value="">

                @error('descripcion')
                    <small class="text-danger">{{ $message }} </small>
                @enderror
            </div>
        <br>
        <button type="submit" class="btn btn-primary">Crear</button>
        <a href="<?php echo route('categorias.index'); ?>"> <button type="button"
                class="btn btn-primary">Volver</button> </a>
        </div>
    </form>
