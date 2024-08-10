<style>
        .container-forma {
            max-width: 900px; /* Aumenta el ancho máximo */
            padding: 30px; /* Ajusta el relleno para dar más espacio interior */
            border-radius: 8px;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
        }

        h2, h4 {
            color: #333;
            font-weight: bold;
        }

        label {
            font-weight: 500;
            color: #555;
        }

        input[type="text"],
        input[type="email"],
        select {
            background-color: #f7f7f7;
            border: 1px solid #ced4da;
            padding: 10px;
            border-radius: 4px;
            font-size: 14px;
        }

        input[type="text"]:focus,
        input[type="email"]:focus,
        select:focus {
            background-color: #fff;
            border-color: #80bdff;
            outline: none;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.25);
        }

        button:hover {
            background-color: #0056b3;
            box-shadow: 0px 0px 10px rgba(0, 91, 187, 0.2);
        }

        small.text-muted {
            color: #6c757d;
        }

        @media (max-width: 768px) {
            .container-forma {
                padding: 15px;
            }

            button {
                font-size: 14px;
                padding: 10px;
            }
        }
    </style>

    <div class="container-fluid min-vh-100 d-flex flex-column">
        <div class="row mt-5 mb-5 px-4 mx-auto" style="max-width: 1300px;"> <!-- Ajuste de max-width -->
            <!-- Columna para el formulario -->
            <div class="col-12 col-lg-8">
                <div class="container-forma mx-auto">
                    <div class="row">
                        <div class="col py-5 text-center">
                            <h2>Confirmación de Pago</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-8 offset-md-2">
                            <h4 class="mb-3">Dirección de Envío</h4>
                            <form>
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
                                    <label for="correo">Correo <span class="text-muted">(Opcional)</span></label>
                                    <input type="email" class="form-control" id="correo" placeholder="nombre@correo.com" name="correo">
                                </div>
                                <div class="mb-3">
                                    <label for="direccion">Dirección</label>
                                    <input type="text" class="form-control" id="direccion" placeholder="1234 Calle Principal" name="direccion" required>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-sm-4 mb-3">
                                        <label for="pais">País</label>
                                        <select name="pais" id="pais" class="custom-select d-block w-100" required>
                                            <option value="">Seleccionar País</option>
                                            <option value="colombia">Colombia</option>
                                        </select>
                                    </div>
                                    <div class="col-12 col-sm-4 mb-3">
                                        <label for="estado">Departamento</label>
                                        <select name="estado" id="estado" class="custom-select d-block w-100" required>
                                            <option value="">Seleccionar</option>
                                            <option value="guaviare">Guaviare</option>
                                        </select>
                                    </div>
                                    <div class="col-12 col-sm-4 mb-3">
                                        <label for="municipio">Municipio</label>
                                        <select name="municipio" id="municipio" class="custom-select d-block w-100" required>
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
                                <button type="submit" class="btn btn-primary btn-lg btn-block">Confirmar Pago</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Columna para el resumen de compra -->
            <div class="col-12 col-lg-4">
                <div class="container-forma mx-auto">
                    <h4 class="mb-3">Resumen de Compra</h4>
                    <ul class="list-group mb-3">
                        <li class="list-group-item d-flex justify-content-between">
                            <span>Producto 1</span>
                            <strong>$25,000</strong>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <span>Producto 2</span>
                            <strong>$50,000</strong>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <span>Envío</span>
                            <strong>$5,000</strong>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <span>Total</span>
                            <strong>$80,000</strong>
                        </li>
                    </ul>
                    <button type="button" class="btn btn-primary btn-lg btn-block">Editar Carrito</button>
                </div>
            </div>
        </div>
    </div>