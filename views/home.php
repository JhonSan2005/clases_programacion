<section id="nuestros-programas">
    <div class="container">

        <h2 class="text-center my-4">Categorías</h2>

        <div class="row justify-content-center">
            <div class="col-md-4 col-sm-6 mb-4">
                <div class="card card--category text-center" style="background-image: linear-gradient(0deg, rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('../img/repuestos.jpg');">
                    <h3 class="text-white">REPUESTOS</h3>
                    <a href="oils.php"><button class="btn btn-warning">VER +</button></a>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 mb-4">
                <div class="card card--category text-center" style="background-image: linear-gradient(0deg, rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('../img/aceites.png');">
                    <h3 class="text-white">ACEITES</h3>
                    <a href="controlador.php?seccion=seccion2"><button class="btn btn-warning">VER +</button></a>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 mb-4">
                <div class="card card--category text-center" style="background-image: linear-gradient(0deg, rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('../img/llantas.png');">
                    <h3 class="text-white">LLANTAS</h3>
                    <a href="llantas.html"><button class="btn btn-warning">VER +</button></a>
                </div>
            </div>
        </div>

        <h2 class="text-center my-4">Productos</h2>

        <div class="container d-flex gap-5 justify-content-center flex-wrap">
            
            <?php if( isset($productos) && $productos ): ?>
                <?php foreach( $productos as $producto ): ?>
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

    </div>
</section>