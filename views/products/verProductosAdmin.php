<?php

    require_once __DIR__ . "/../../helpers/functions.php";

    // debugguear($productos);

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
                </tr>
            </thead>
            <tbody>
                <?php foreach($productos as $producto): ?>
                <tr>
                    <th><?php echo $producto['nombre_producto']; ?></th>
                    <td><?php echo $producto['precio']; ?></td>
                    <td><?php echo $producto['impuesto']; ?></td>
                    <td><?php echo $producto['stock']; ?></td>
                    <td><?php echo $producto['descripcion']; ?></td>
                    <td><?php echo $producto['imagen_url'] ?? 'No Image'; ?></td>
                </tr>
                <?php endforeach; ?>
        </table>
    </div>

</div>