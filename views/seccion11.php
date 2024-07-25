<?php
$seccion11 = "Formualrio de pago";
?>

<head>
    <title> <?php echo "$seccion11"; ?></title>
</head>
<div class="container-fluid min-vh-100 d-flex flex-column">
        <div class="row justify-content-center">
            <div class="col-12 text-center my-3">
                <img src="../img/logol.png" alt="Logo" class="img-fluid" style="max-height: 180px; max-width: 300px;">
            </div>
        </div>

        <div class="container" style="margin-top: 100px;">
    <div class="row">
      <div class="col py-5 text-center">
        <h2>Confirmación de Pago</h2>
      </div>
    </div>
    <div class="row">
      <div class="col-12 col-md-8 order-2 order-md-1">
        <h4 class="mb-3">Direccion de Envío</h4>
        <form action="">
          <div class="row">
            <div class="col-12 col-sm-6 mb-3">
              <label for="nombre">Nombre</label>
              <input type="text" class="form-control" id="nombre" name="nombre">
            </div>
            <div class="col-12 col-sm-6 mb-3">
              <label for="apellido">Apellido</label>
              <input type="text" class="form-control" id="apellido" name="apellido">
            </div>
          </div>
  
          <div class="mb-3">
            <label for="correo">Correo <span class="text-muted">(Opcional)</span></label>
            <input type="email" class="form-control" placeholder="nombre@correo.com" name="correo">
          </div>
  
          <div class="mb-3">
            <label for="direccion">Direccion</label>
            <input type="text" class="form-control" placeholder="1234 Calle Principal" name="direccion">
          </div>
  
          <div class="row">
            <div class="col-12 col-sm-4 mb-3">
              <label for="pais">Pais</label>
              <select name="pais" id="pais" class="custom-select d-block w-100">
                                  <option value="">Seleccionar Pais</option>
                                  <option value="colombia">Colombia</option>
                              </select>
            </div>
            <div class="col-12 col-sm-4 mb-3">
              <label for="estado">Departamento</label>
              <select name="estado" id="estado" class="custom-select d-block w-100">
                                  <option value="">Seleccionar</option>
                                  <option value="">Guaviare</option>
                              </select>
            </div>
        
          <div class="col-12 col-sm-4 mb-3">
            <label for="estado">Municipio</label>
            <select name="estado" id="estado" class="custom-select d-block w-100">
                                <option value="">Seleccionar</option>
                                <option value="">Retorno</option>
                                <option value="">San Jose Del Guaviare</option>
                                <option value="">Calamar</option>
                                <option value="">MiraFlores</option>
                            </select>
          </div>
          </div>
  
          <hr>
  
          <div class="row">
            <div class="col-12 col-sm-6 mb-3">
              <label for="numero-tarjeta">Numero de tarjeta</label>
              <input type="text" id="numero-tarjeta" class="form-control">
            </div>
            <div class="col-12 col-sm-6 mb-3">
              <label for="nombre-tarjeta">Nombre en la tarjeta</label>
              <input type="text" id="nombre-tarjeta" class="form-control">
              <small class="text-muted">Nombre completo como se muestra en la tarjeta</small>
            </div>          
          </div>
  
          <div class="row">
            <div class="col-6 col-sm-4 mb-3">
              <label for="tarjeta-expiracion">Expiración</label>
              <input type="text" id="tarjeta-expiracion" class="form-control">
            </div>
            <div class="col-6 col-sm-4 mb-3">
              <label for="tarjeta-ccv">CVV</label>
              <input type="text" id="tarjeta-ccv" class="form-control">
            </div>
          </div>
  
          <hr class="mb-4">
          <a href="controlador.php?seccion=seccion00">
            <button type="button" class="btn btn-primary btn-lg btn-block">Confirmar Pago</button>
          </a>
        </form>
      </div>
      <div class="col-12 col-md-4 order-1 order-md-2">
        <h4 class="mb-3 d-flex justify-content-between align-items-center">
          <span class="text-muted">Tu Carrito</span>
        </h4>
        <ul class="list-group mb-3">
          <li class="list-group-item d-flex justify-content-between">
            <div>
              <img src="imganes/actevo.png" width="70px">
              <small class="text-muted">Aceite Sintetico</small>
            </div>
            <span class="text-muted">$10.000</span>
          </li>
          <li class="list-group-item d-flex justify-content-between">
            <div>
              <img src="imganes/txr.png" width="70px">
              <small class="text-muted">PACK -2 TXR-200</small>
            </div>
            <span class="text-muted">$120.000</span>
          </li>
          <li class="list-group-item d-flex justify-content-between">
            <div>
              <img src="imganes/yamalube.png" width="70px">
              <small class="text-muted">Aceite Yamalube</small>
            </div>
            <span class="text-muted">$10.000</span>
          </li>
          <li class="list-group-item d-flex justify-content-between bg-light">
            <div class="text-success">
              <h6 class="my-0">Codigo de descuento</h6>
              <small class="text-success">DPS5</small>
            </div>
            <span class="text-success">$ -11.900</span>
          </li>
          <li class="list-group-item d-flex justify-content-between bg-light">
            <span>Total</span>
            <strong>$128.100</strong>
          </li>
        </ul>
        <form action="" class="card p-2">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Cupon">
            <div class="input-group-append">
              <button class="btn btn-secondary">Canjear</button>
            </div>
          </div>
        </form>
      </div>
    </div>
 