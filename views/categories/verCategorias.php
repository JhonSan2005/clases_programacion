<div class="container-fluid">

    <h2 class="text-center my-5">Categorias</h2>

    <div class="row justify-content-center row-gap-5">
        <?php if(isset($categories) && $categories): ?>
            <?php foreach( $categories as $category ): ?>
                <div class="col-12 col-sm-6 col-md-4 col-xl-3">
                    <div class="card card--category text-center" style="background-image: linear-gradient(0deg, rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('../img/llantas.png');">
                        <h3 class="text-white"><?php echo $category['nombre_categoria']; ?></h3>
                        <a href="llantas.html"><button class="btn btn-warning">VER +</button></a>
                    </div>
                </div>
            <?php endforeach; ?>
    
        <?php else: ?>
            <p class="alert alert-light" role="alert">No hay datos para mostrar</p>
        <?php endif; ?>
    </div>
</div>