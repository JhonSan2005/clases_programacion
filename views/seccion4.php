<?php
$seccion4 = "Admin";
?>

<head>
    <title> <?php echo "$seccion4"; ?></title>
</head>
<div class="container-fluid min-vh-100 d-flex flex-column">
        <div class="row justify-content-center">
            <div class="col-12 text-center my-3">
                <img src="../img/logol.png" alt="Logo" class="img-fluid" style="max-height: 180px; max-width: 300px;">
            </div>
        </div>
     <audio autoplay>

        <source src="mp3/1-formula-motor.mp3">


</audio>
    

    <!----------------------- Contenedor principal -------------------------->

     <div class="container d-flex justify-content-center align-items-center min-vh-100">

    <!----------------------- Contenedor de registrarse -------------------------->

       <div class="row border rounded-5 p-3 bg-white shadow box-area">

    <!--------------------------- Cuadro izquierdo ----------------------------->

       <div class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-box" style="background: #FF0000;">
           <div class="featured-image mb-3">
            <video controls autoplay class="img-fluid" style="width: auto;">
  <source src="css/img/trailer.mp4" type="video/mp4">
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
                     <h2>Hola</h2>
                     <p>Admistrador</p>
                </div>
                
                <form action="inisiarsesion3_admin.php" method="POST">
                            <div class="input-group mb-3">
                                <input type="email" class="form-control form-control-lg bg-light fs-6" name="correo" placeholder="correo" required>
                            </div>
                            <div class="input-group mb-1">
                                <input type="password" class="form-control form-control-lg bg-light fs-6" name="password" placeholder="password" required>
                            </div>
                            <br>
                            <button type="submit" class="btn btn-lg btn-danger w-100 fs-6">Iniciar Sesión</button>
                        </form>
                <div class="input-group mb-5 d-flex justify-content-between">
                </div>
           

                <div class="row">
                   <div class="row">
                    

      
</div>

                </div>
          </div>
       </div> 

      </div>
    </div>
