<section id="nuestros-programas">
    <div class="container">

        <h2 class="text-center my-4">Categorías</h2>

        <div class="row justify-content-center">
            <div class="col-md-4 col-sm-6 mb-4">
                <div class="card card--category text-center" style="background-image: linear-gradient(0deg, rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('../img/repuestos.jpg');">
                    <h3 class="text-white">REPUESTOS</h3>
                    <a href="/products?category=2"><button class="btn btn-warning">VER +</button></a>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 mb-4">
                <div class="card card--category text-center" style="background-image: linear-gradient(0deg, rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('../img/aceites.png');">
                    <h3 class="text-white">ACEITES</h3>
                    <a href="/products?category=1"><button class="btn btn-warning">VER +</button></a>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 mb-4">
                <div class="card card--category text-center" style="background-image: linear-gradient(0deg, rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('../img/llantas.png');">
                    <h3 class="text-white">LLANTAS</h3>
                    <a href="/products?category=3"><button class="btn btn-warning">VER +</button></a>
                </div>
            </div>
        </div>
        <div class="d-flex flex-column flex-md-row justify-content-md-between my-4 justify-content-center text-center">
    <h2 class="w-100">Últimos Productos Agregados</h2>
</div>


    <div class="container d-flex gap-5 justify-content-center flex-wrap" id="lista-productos">
        <?php if (isset($productos) && $productos): ?>
            <?php foreach ($productos as $producto): ?>
                <div class="card card--product border shadow-sm mb-4" style="width: 18rem;" data-id="<?php echo htmlspecialchars($producto['id_producto']); ?>">
                    <div class="card-img-top-wrapper" style="height: 200px; overflow: hidden;">
                        <img
                            src="<?php echo htmlspecialchars($producto['imagen_url']); ?>"
                            class="card-img-top img-fluid"
                            alt="Imagen del Producto"
                            style="width: 100%; height: 100%; object-fit: cover;"
                        >
                    </div>

                    <hr>

                    <div class="card-body">
                        <h5 class="card-title"><?php echo htmlspecialchars($producto['nombre_producto']); ?></h5>
                        <p class="card-text"><?php echo htmlspecialchars($producto['descripcion']); ?></p>
                        <span class="d-block mb-1">Precio: <span class="card-price"><?php echo htmlspecialchars($producto['precio']); ?></span> USD</span>
                        <span class="d-block mb-1">Impuesto: <span class="card-taxes"><?php echo htmlspecialchars($producto['impuesto']); ?></span> %</span>
                        <span class="d-block mb-3">Cantidad en Bodega: <span class="card-stock"><?php echo htmlspecialchars($producto['stock']); ?></span></span>
                        <button class="btn btn-primary add-to-cart">
                            Agregar al Carrito
                        </button>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p class="alert alert-light" role="alert">No hay datos para mostrar</p>
        <?php endif; ?>
    </div>
</div>

</section>
