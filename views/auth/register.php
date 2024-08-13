<!----------------------- Contenedor base -------------------------->
<div class="container min-h-100 d-flex justify-content-center align-items-center">

    <!----------------------- Contenedor principal -------------------------->
    <div class="mt-5 d-flex justify-content-center" style="width: fit-content; height: fit-content;">

        <!----------------------- Contenedor de registrarse -------------------------->
        <div class="d-flex flex-column flex-md-row gap-3 border rounded-2 p-3 bg-white shadow">

           
            <!-------------------------- Caja derecha ---------------------------->
            <div class="p-3">
                <div class="header-text mb-2">
                    <h2 class="text-body-secondary">¡Regístrate!</h2>
                    <p class="text-body-secondary">Es fácil y rápido</p>
                </div>

                <?php include_once __DIR__ . "/../../views/includes/alertaTemplate.php"; ?>

                <form id="register-form" action="/register" method="POST">
                    <div class="input-group mb-2">
                        <input type="number" class="form-control form-control-lg bg-light fs-6" name="documento" placeholder="N° Documento" required>
                    </div>
                    <div class="input-group mb-2">
                        <input type="text" class="form-control form-control-lg bg-light fs-6" name="nombre" placeholder="Nombre" required>
                    </div>
                    <div class="input-group mb-2">
                        <input type="email" class="form-control form-control-lg bg-light fs-6" name="correo" placeholder="Correo" required>
                    </div>
                    <div class="input-group mb-2">
                        <input type="password" class="form-control form-control-lg bg-light fs-6" name="password" placeholder="Contraseña" required>
                    </div>
                    <div class="input-group mb-2">
                        <input type="password" class="form-control form-control-lg bg-light fs-6" name="password_confirmation" placeholder="Vuelve a escribir tu contraseña" required>
                    </div>
                    <div class="input-group mb-2 d-flex ">
                        <div class="form-check">
                            <input type="checkbox" name="termsAndConditions" class="form-check-input" id="formCheck">
                            <label for="formCheck" class="form-check-label text-secondary custom-label">
                                <small><a href="/terminos-y-condiciones">Acepto los Términos y Condiciones</a></small>
                            </label>
                        </div>
                    </div>
                    <!-- reCAPTCHA widget -->
                    <div class="g-recaptcha" data-sitekey="6LfaIgwqAAAAAFjrowWPA5vbDBONVvx83AP2Iv9S"></div>
                    <button type="submit" class="btn btn-lg btn-danger w-100 fs-6" style="background-color: #FF0000;">Registrarse</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Agregar el script de reCAPTCHA -->
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.getElementById('register-form');

        form.addEventListener('submit', function(event) {
            const recaptchaResponse = grecaptcha.getResponse();

            if (recaptchaResponse.length === 0) {
                event.preventDefault(); // Detiene el envío del formulario
                alert('Por favor, completa el reCAPTCHA.');
            }
        });
    });
</script>
