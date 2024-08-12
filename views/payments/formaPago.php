<div class="container-fluid min-vh-100 d-flex flex-column">
    <div class="row mt-5 mb-5 gap-5" style="max-width: 1300px;"> <!-- Ajuste de max-width -->
        <!-- Columna para el formulario -->
        <div class="col-12 col-lg-7">
            <div class="container-forma mx-auto shadow bg-white rounded py-4 px-3">
                <div class="row">
                    <div class="col py-5 text-center">
                        <h2>Confirmación de Pago</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-8 offset-md-2">
                        <h4 class="mb-3">Dirección de Envío</h4>
                        <form method="POST" class="formulario--pago">
                            <div class="row">
                                <div class="col-12 col-sm-6 mb-3">
                                    <label for="nombre">Nombre</label>
                                    <input type="text" class="form-control" id="nombre" name="nombre" required>
                                </div>
                                <div class="col-12 col-sm-6 mb-3">
                                    <label for="apellido">Apellido</label>
                                    <input type="text" class="form-control" id="apellido" name="apellido" required>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="correo">Correo</label>
                                <input type="email" class="form-control" id="correo" placeholder="nombre@correo.com" name="correo">
                            </div>
                            <div class="mb-3">
                                <label for="direccion">Dirección</label>
                                <input type="text" class="form-control" id="direccion" placeholder="1234 Calle Principal" name="direccion" required>
                            </div>
                            <div class="row">
                                <div class="col-12 col-sm-4 mb-3">
                                    <label for="pais">País</label>
                                    <select name="pais" id="pais" class="form-select d-block w-100" required>
                                        <option value="">Seleccionar País</option>
                                        <option value="colombia">Colombia</option>
                                    </select>
                                </div>
                                <div class="col-12 col-sm-4 mb-3">
                                    <label for="departamento">Departamento</label>
                                    <select name="departamento" id="departamento" class="form-select d-block w-100" required>
                                        <option value="">Seleccionar</option>
                                        <option value="guaviare">Guaviare</option>
                                    </select>
                                </div>
                                <div class="col-12 col-sm-4 mb-3">
                                    <label for="municipio">Municipio</label>
                                    <select name="municipio" id="municipio" class="form-select d-block w-100" required>
                                        <option value="">Seleccionar</option>
                                        <option value="retorno">Retorno</option>
                                        <option value="san-jose-del-guaviare">San Jose Del Guaviare</option>
                                        <option value="calamar">Calamar</option>
                                        <option value="miraflores">Miraflores</option>
                                    </select>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-12 col-sm-6 mb-3">
                                    <label for="numero-tarjeta">Número de tarjeta</label>
                                    <input type="text" id="numero-tarjeta" class="form-control" required>
                                </div>
                                <div class="col-12 col-sm-6 mb-3">
                                    <label for="nombre-tarjeta">Nombre en la tarjeta</label>
                                    <input type="text" id="nombre-tarjeta" class="form-control" required>
                                    <small class="text-muted">Nombre completo como se muestra en la tarjeta</small>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6 col-sm-4 mb-3">
                                    <label for="tarjeta-expiracion">Expiración</label>
                                    <input type="text" id="tarjeta-expiracion" class="form-control" placeholder="MM/AA" required>
                                </div>
                                <div class="col-6 col-sm-4 mb-3">
                                    <label for="tarjeta-ccv">CVV</label>
                                    <input type="text" id="tarjeta-ccv" class="form-control" required>
                                </div>
                            </div>
                            <hr class="mb-4">
                            <button type="submit" class="btn btn-primary btn-forma-pago fs-5">Confirmar Pago</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <!-- Columna para el resumen de compra -->
        <div class="col-12 col-lg-4 shadow bg-white rounded py-4 px-2" style="height: fit-content;">
            <div class="container-resumen-compra mx-auto">
                <h4 class="mb-3">Resumen de Compra</h4>

                <ul class="list-group lista-resumen-compra mb-3 overflow-y-auto" style="max-height: 170px;"></ul>

                <a href="/carrito" class="btn btn-primary btn-lg btn-block fs-6">Editar Carrito</a>
            </div>
        </div>
    </div>
</div>