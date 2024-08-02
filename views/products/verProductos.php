<h2 class="text-body-secondary text-center my-4 text-uppercase fw-medium">Productos</h2>


<div class="container d-flex gap-5 justify-content-center flex-wrap">
    <?php if (isset($productos) && $productos) : ?>
        <?php foreach ($productos as $producto) : ?>
            <div class="card card--product border">
                <img src="../img/repuestos.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?php echo htmlspecialchars($producto['nombre_producto'], ENT_QUOTES, 'UTF-8'); ?></h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <button class="btn btn-primary add-to-cart" data-id="<?php echo htmlspecialchars($producto['id'], ENT_QUOTES, 'UTF-8'); ?>">Agregar al Carrito</button>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else : ?>
        <p class="alert alert-light" role="alert">No hay datos para mostrar</p>
    <?php endif; ?>
</div>





<script src="js/main.js"></script>