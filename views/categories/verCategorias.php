<?php

require_once __DIR__ . "/../../helpers/functions.php";

?>

<div class="container">
    <a class="btn btn-success mt-5 mb-3" href="/admin/agregarCategoria">Agregar Categoría</a>

    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre Categoría</th>
                    <th scope="col-2">Opciones</th>
                </tr>
            </thead>
            <tbody>
                <?php if (is_array($categorias) && count($categorias) > 0): ?>
                    <?php foreach($categorias as $category): ?>
                        <tr>
                            <th><?php echo $category['id_categoria']; ?></th>
                            <td><?php echo $category['nombre_categoria']; ?></td>
                            <td>
                                <a href="/admin/edit-categoria?id=<?php echo $category['id_categoria']; ?>">Editar</a>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal<?php echo $category['id_categoria']; ?>">
                                    Eliminar
                                </button>

                                <div class="modal fade" id="deleteModal<?php echo $category['id_categoria']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="deleteModalLabel<?php echo $category['id_categoria']; ?>" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="deleteModalLabel<?php echo $category['id_categoria']; ?>">Confirmar Eliminación</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                ¿Estás seguro de que deseas eliminar esta categoría?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                <form action="/admin/categories?id=<?php echo $category['id_categoria']; ?>" method="POST">
                                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="3">No hay categorías disponibles.</td>
                    </tr>
                <?php endif; ?>
            </tbody> 
        </table>
    </div>
</div>
