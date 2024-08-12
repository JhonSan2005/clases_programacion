<div class="container py-5">
    <nav class="nav nav-borders mb-4">
        <a class="nav-link active ms-0" href="/profile">Perfil</a>
        <a class="nav-link ms-0" href="profile/contraseña">Seguridad</a>
    </nav>

    <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-6">
            <div class="card border-0 shadow-lg">
                <div class="card-body p-4 p-md-5">
                    <div class="text-center mb-4">
                        <a href="#!">
                            <img src="../img/logol.png" alt="Logo" class="img-fluid mb-4" width="150" height="135">
                        </a>
                    </div>
                    <h2 class="fs-5 text-center text-secondary mb-4">Restablecer Contraseña</h2>
                    
                    <form id="ResetPasswordForm" action="reset_pass.php" method="POST" onsubmit="return validatePassword()">
                        <input type="hidden" name="token" value="<?php echo $token; ?>">
                        
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" name="current_password" id="current_password" placeholder="Contraseña actual" required>
                            <label for="current_password" class="form-label">Contraseña Actual</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" name="new_password" id="new_password" placeholder="Nueva contraseña" required
                            pattern="(?=.*\d)(?=.*[!@#$%^&*]).{8,}" title="La contraseña debe tener al menos 8 caracteres, incluir un número y un símbolo">
                            <label for="new_password" class="form-label">Nueva Contraseña</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Confirmar nueva contraseña" required>
                            <label for="confirm_password" class="form-label">Confirmar Nueva Contraseña</label>
                        </div>
                        <div class="d-grid">
                            <button class="btn btn-primary btn-lg" type="submit">Restablecer</button>
                        </div>
                    </form>

                    <script>
                        function validatePassword() {
                            const currentPassword = document.getElementById('current_password').value;
                            const newPassword = document.getElementById('new_password').value;
                            const confirmPassword = document.getElementById('confirm_password').value;

                            if (newPassword !== confirmPassword) {
                                Swal.fire("Error", "Las contraseñas no coinciden", "error");
                                return false;
                            }

                            return true;
                        }
                    </script>

                </div>
            </div>
        </div>
    </div>
</div>
