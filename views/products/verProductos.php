<?php
// Estos son los botones
?>
<div>
    <a href="/products?category=all" class="category_item" category="all">Todo</a>
    <a href="/products?category=1" class="category_item" category="1">Aceites</a>   
    <a href="/products?category=2" class="category_item" category="2">Repuestos</a>
    <a href="/products?category=3" class="category_item" category="3">Llantas</a>
</div>

<div class="container d-flex gap-5 justify-content-center flex-wrap">
    <?php if (isset($productos) && $productos): ?>
        <?php foreach ($productos as $producto): ?>
            <div class="card card--product border">
                <img src="../img/repuestos.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $producto['nombre_producto']; ?></h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Agregar al Carrito</a>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p class="alert alert-light" role="alert">No hay datos para mostrar</p>
    <?php endif; ?>
</div>
