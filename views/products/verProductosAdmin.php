<?php

    require_once __DIR__ . "/../../helpers/functions.php";

     //debugguear($productos);

?>

<div class="container">

    <a class="btn btn-success mt-5 mb-3" href="/admin/agregarProductos">Agregar Producto</a>

    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Impuesto</th>
                    <th scope="col">Cantidad en Bodega</th>
                    <th scope="col">Descripcion</th>
                    <th scope="col">imagen</th>
                    <th scope="col-2">opciones</th>
                </tr>
            </thead>
            <tbody>
            </tbody> 
            <?php if (is_array($productos) && count($productos) > 0): ?>
    <?php foreach($productos as $producto): ?>
        <tr>
            <th><?php echo $producto['nombre_producto']; ?></th>
            <td><?php echo $producto['precio']; ?></td>
            <td><?php echo $producto['impuesto']; ?></td>
            <td><?php echo $producto['stock']; ?></td>
            <td><?php echo $producto['descripcion']; ?></td>
            <td><img class="img-thumbnail" style="width: 100px; height: 100px;" src="<?php echo $producto['imagen_url']; ?>" alt="Imagen Producto"></td>
            <td>
               
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal<?php echo $producto['id_producto']; ?>">
                    Eliminar
                </button>

                <!-- Modal -->
                <div class="modal fade" id="deleteModal<?php echo $producto['id_producto']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="deleteModalLabel<?php echo $producto['id_producto']; ?>" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="deleteModalLabel<?php echo $producto['id_producto']; ?>">Confirmar Eliminación</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                ¿Estás seguro de que deseas eliminar este producto?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                <form action="/admin/products?id=<?php echo $producto['id_producto']; ?>" method="POST">
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
        <td colspan="7">No hay productos disponibles.</td>
    </tr>
<?php endif; ?>
