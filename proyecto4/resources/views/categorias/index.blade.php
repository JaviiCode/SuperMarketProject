@include('cabecera')

<body>
        <table class="table">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($listaCategoria as $categoria) {
                    echo "<tr>";
                    echo "<td><a>" .  $categoria->nombre . "</a></td>";
                    echo "<td>" .  $categoria->descripcion . "</td>";
                    echo "
                    <td>
                    <a style='display:inline' href='" . route('categorias.edit', $categoria) . "'><button class='btn btn-primary' type='submit'>Editar</button></a>


                    ";
                        $csrf = csrf_field();
                        $methodDelete = method_field('DELETE');
                    echo "
                    <form style='display:inline' action='" . route('obtenerProductos', $categoria) . "' method='GET'>
                        <button>Ver Producto</button>
                    </form>
                        <form style='display:inline' action='" . route('categorias.destroy', $categoria) . "' method='POST'>
                            $csrf
                            $methodDelete
                            <button class='btn btn-danger' type='submit'>Eliminar</button>
                        </form>

                    </td>
                    </tr>";
                }
                ?>
                </ul>
            </tbody>
        </table>




