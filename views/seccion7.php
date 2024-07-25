<?php
$seccion7 = "Index_Admin";
?>

<head>
    <title> <?php echo "$seccion7"; ?></title>
</head>



<header>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-4 col-12 text-center text-md-left mb-1 mb-md-0">
                <img src="../img/logol.png" alt="Logo" class="img-fluid" style="max-height: 180px; max-width: 300px;">
            </div>
            <div class="col-md-4 col-12 mb-1 mb-md-0">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Buscar" aria-label="Buscar" aria-describedby="button-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-warning" type="button" id="button-addon2">Buscar</button>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-12 text-center text-md-center mb-1 mb-md-0">
                <div class="menu-container">
                    <button class="btn btn-secondary menu-button">Menú</button>
                    <div class="menu-content">
                        <a href="controlador.php?seccion=seccion6" class="menu-item">Editar Perfil</a>
                        <a href="controlador.php?seccion=seccion1" class="menu-item">Cerrar Sesión</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<div class="contenedor-audio" style="text-align: center;">
    <!-- <div class="video"><iframe width="560" height="315" src="https://www.youtube.com/embed/x4fSOEsy0d0?si=tlSZfgQ1Y0it_HXd" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe></div>
    <div class="audio-player"> 
        <audio id="audio-player" controls muted>
            <source src="mp3/kawasaki-ninja.mp3" type="audio/mpeg">
        </audio> -->
</div>

<section id="nuestros-programas">
      <div class="container" style="margin-top: auto;">
        <div class="row">
            <div class="col-md-4 col-sm-6 mb-4">
                <div class="carta" style="background-image: linear-gradient(0deg, rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('imganes/repuestos.jpg');">
                    <h3>REPUESTOS</h3>
                    <a href="controlador.php?seccion=seccion8"><button class="btn btn-warning">Agregar Producto</button></a>
                    
                </div>
            </div>
            <div class="col-md-4 col-sm-6 mb-4">
                <div class="carta" style="background-image: linear-gradient(0deg, rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('imganes/aceites.png');">
                    <h3>ACEITES</h3>
                    <a href="agregar_producto_aceites.html"><button class="btn btn-warning">Agregar Producto</button></a>
                    <a href="aceites.html"><button class="btn btn-warning">VER +</button></a>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 mb-4">
                <div class="carta" style="background-image: linear-gradient(0deg, rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('imganes/llantas.png');">
                    <h3>LLANTAS</h3>
                    <a href="agregar_producto_llantas.html"><button class="btn btn-warning">Agregar Producto</button></a>
                    <a href="llantas.html"><button class="btn btn-warning">VER +</button></a>
                </div>
            </div>
        </div>
    </div>
</section>

        
 



    <footer>
        <div class="container">
            <div class="row">
                <div class="col-12 text-center text-muted my-3">
                    &copy; Repuestos JJ
                </div>
                <div class="col-12 text-center text-muted">
                    repuestosjj@gmail.com
                </div>
            </div>
        </div>
    </footer>

 