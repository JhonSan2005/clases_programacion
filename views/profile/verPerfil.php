<div class="container-xl px-4 mt-4">
    <nav class="nav nav-borders">
        <a class="nav-link active ms-0" href="/profile">Perfil</a>
    </nav>
    <hr class="mt-0 mb-4">
    <div class="row">
        <div class="col-xl-12">
            <div class="card mb-4">
                <div class="card-header">Detalles de la cuenta</div>
                <div class="card-body">
                    <form action="/profile/verPerfil" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label class="small mb-1" for="documento">Documento</label>
                            <input class="form-control" id="documento" name="documento" type="text" 
                                placeholder="Ingresa tu cédula" value="<?php echo htmlspecialchars($documento); ?>">
                        </div>
                        <div class="mb-3">
                            <label class="small mb-1" for="nombre">Nombre</label>
                            <input class="form-control" id="nombre" name="nombre" type="text" 
                                placeholder="Ingresa tu nombre" value="<?php echo htmlspecialchars($nombre); ?>">
                        </div>
                        <div class="mb-3">
                            <label class="small mb-1" for="correo">Correo</label>
                            <input class="form-control" id="correo" name="correo" type="text" 
                                placeholder="Ingresa tu correo" value="<?php echo htmlspecialchars($correo); ?>">
                        </div>
                        <div class="mb-3">
                            <label class="small mb-1" for="password_actual">Contraseña Actual</label>
                            <input class="form-control" id="password_actual" name="password_actual" type="password" 
                                placeholder="Ingresa tu contraseña actual" value="<?php echo htmlspecialchars($password); ?>">
                        </div>
                        
                        <button class="btn btn-primary" type="submit">Guardar Cambios</button>
                    </form>

                    <form action="/profile<?php echo htmlspecialchars($id['id']); ?>" method="POST">
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
