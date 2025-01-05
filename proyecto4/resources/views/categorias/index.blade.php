@include('cabecera')

<body>
        <table class="table">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Descripción</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($listaCategoria as $categoria) {
                    echo "<tr>";
                    echo "<td><a href='" .  route('categorias.show', $categoria->id) . "'>" .  $categoria->nombre . "</a></td>";
                    echo "<td>" .  $categoria->descripcion . "</td>";
                    echo "
                    <td>
                    <a href=" . route('categorias.edit', $categoria) . "><button class='btn btn-primary' type='submit'>Editar</button></a>
                    </td>

                    <td>";
                        $csrf = csrf_field();
                        $methodDelete = method_field('DELETE');
                    echo "
                        <form action='" . route('categorias.destroy', $categoria) . "' method='POST'>
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

        {{ $listaCategoria->links()}}



