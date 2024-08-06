<div class="container-xl px-4 mt-4">
        <nav class="nav nav-borders">
            <a class="nav-link active ms-0" href="perfil_user.php">Perfil</a>
            <a class="nav-link" href="change_pass_user.php">Seguridad</a>
        </nav>
        <hr class="mt-0 mb-4">
        <div class="row">
            <div class="col-xl-4">
                <div class="card mb-4 mb-xl-0">
                    <div class="card-header">Foto de Perfil</div>
                    <div class="card-body text-center">
                        <img id="profileImage" class="img-account-profile mb-2 img-thumbnail" src="<?php echo htmlspecialchars($user['foto_perfil'] ?: 'http://bootdey.com/img/Content/avatar/avatar1.png'); ?>" alt="Foto de perfil">
                        <div class="small font-italic text-muted mb-3">JPG o PNG máximo 5 MB</div>
                        <div id="previewContainer" class="mb-3" style="display: none;">
                            <img id="previewImage" class="img-thumbnail" src="#" alt="Vista previa">
                            <button type="button" class="btn btn-danger mt-2" onclick="cancelUpload()">Cancelar</button>
                        </div>
                        <form id="formSubirImagen" action="../controller/upload_profile_user.php" method="POST" enctype="multipart/form-data">
                            <label for="foto_perfil" class="btn btn-primary">
                                <i class='bx bx-upload'></i> Seleccionar archivo
                            </label><br><br>
                            <input type="file" id="foto_perfil" name="foto_perfil" accept="image/*" required style="display:none;" onchange="previewImage(this);">
                            <button type="submit" class="btn btn-primary">Subir Nueva imagen</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-xl-8">
                <div class="card mb-4">
                    <div class="card-header">Detalles de la cuenta</div>
                    <div class="card-body">
                        <form action="../controller/edit_perfil_user.php" method="POST">
                            <div class="mb-3">
                                <label class="small mb-1" for="inputUsername">Nombre de Usuario</label>
                                <input class="form-control" id="inputUsername" name="inputUsername" type="text" placeholder="Ingresa tu nombre de usuario" value="<?php echo htmlspecialchars($user['nombre_usuario']); ?>">
                            </div>
                            <div class="row gx-3 mb-3">
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputFirstName">Nombre</label>
                                    <input class="form-control" id="inputFirstName" name="inputFirstName" type="text" placeholder="Ingresa tu nombre" value="<?php echo htmlspecialchars($user['nombre']); ?>">
                                </div>
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputLastName">Apellido</label>
                                    <input class="form-control" id="inputLastName" name="inputLastName" type="text" placeholder="Ingresa tu apellido" value="<?php echo htmlspecialchars($user['apellido']); ?>">
                                </div>
                            </div>
                            <div class="row gx-3 mb-3">
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputLocation">Ubicación</label>
                                    <input class="form-control" id="inputLocation" name="inputLocation" type="text" placeholder="Ingresa tu ubicación" value="<?php echo htmlspecialchars($user['ubicacion']); ?>">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="small mb-1" for="inputEmailAddress">Correo Electrónico</label>
                                <input class="form-control" id="inputEmailAddress" name="inputEmailAddress" type="email" placeholder="Ingresa tu correo electrónico" value="<?php echo htmlspecialchars($user['correo_electronico']); ?>">
                            </div>
                            <button class="btn btn-primary" type="submit">Guardar Cambios</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    if (isset($_GET['mensaje'])) {
        $mensaje = $_GET['mensaje'];
        if ($mensaje === 'exito') {
            echo '<script>
                    mostrarAlertaExito("Foto de perfil actualizada exitosamente.");
                  </script>';
        } elseif ($mensaje === 'exito_cambio') {
            echo '<script>
                    mostrarAlertaExito("Datos de perfil actualizados exitosamente.");
                  </script>';
        } else {
            echo '<script>
                    mostrarAlertaError("' . htmlspecialchars($mensaje) . '");
                  </script>';
        }
    }
    ?>

    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="../js/alert.js"></script>
    <script>
        // Función para previsualizar imagen seleccionada
        function previewImage(input) {
            var preview = document.getElementById('preview');
            var previewContainer = document.getElementById('previewContainer');
            var previewImage = document.getElementById('previewImage');
            
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    previewImage.src = e.target.result;
                    previewContainer.style.display = 'block';
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        // Función para cancelar selección de archivo
        function cancelUpload() {
            var input = document.getElementById('foto_perfil');
            var previewContainer = document.getElementById('previewContainer');
            var previewImage = document.getElementById('previewImage');
            
            input.value = null; // Clear the file input
            previewContainer.style.display = 'none'; // Hide the preview container
            previewImage.src = ''; // Clear the preview image source
        }
    </script>