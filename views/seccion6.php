<?php
$seccion6 = "Editar Perfil";
?>

<head>
    <title> <?php echo "$seccion6"; ?></title>
</head>
<div class="container-fluid min-vh-100 d-flex flex-column">
        <div class="row justify-content-center">
            <div class="col-12 text-center my-3">
                <img src="../img/logol.png" alt="Logo" class="img-fluid" style="max-height: 180px; max-width: 300px;">
            </div>
        </div>
    <!----------------------- Contenedor principal -------------------------->

     <div class="container d-flex justify-content-center align-items-center min-vh-100">

    <!----------------------- Contenedor de registrarse -------------------------->

       <div class="row border rounded-5 p-3 bg-white shadow box-area">

    <!--------------------------- Cuadro izquierdo ----------------------------->

       <div class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-box" style="background: #FF0000;">
           <div class="featured-image mb-3">
          <video controls autoplay class="img-fluid" style="width: auto;">
            <source src="mp3/trailer.mp4" type="video/mp4">
             Tu navegador no admite el elemento de video.
</video>
           </div>
           <p class="text-white fs-2" style="font-family: 'Courier New', Courier, monospace; font-weight: 600;"></p>
           <small class="text-white text-wrap text-center" style="width: 17rem;font-family: 'Courier New', Courier, monospace;"></small>
       </div> 

    <!-------------------- ------ Caja derecha ---------------------------->
        
       <div class="col-md-6 right-box">
          <div class="row align-items-center">
                <div class="header-text mb-4">
                     <h2>Actualiza tus Datos</h2>
                     <p>Facil  y  rápido </p>
                </div>
   

<form action="registro.php" method="post">
<input type="hidden" name="action" value="register">
    <div class="input-group mb-3">
        <input type="text" class="form-control form-control-lg bg-light fs-6" name="documento" placeholder="N° Documento">
    </div>
    <div class="input-group mb-3">
        <input type="text" class="form-control form-control-lg bg-light fs-6" name="nombre" placeholder="Nombre">
    </div>
    <div class="input-group mb-3">
        <input type="text" class="form-control form-control-lg bg-light fs-6" name="correo" placeholder="correo">
    </div>
    <div class="input-group mb-1">
        <input type="password" class="form-control form-control-lg bg-light fs-6" name="password" placeholder="password">
    </div>
   
    <!-- Resto del formulario -->
    <button type="submit" class="btn btn-lg btn-danger w-100 fs-6" style="background-color: #FF0000;">Actualizar</button>
</form>
    </div>
