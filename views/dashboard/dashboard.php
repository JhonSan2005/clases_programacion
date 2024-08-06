
<div class="container min-h-100 d-flex justify-content-center align-items-center">

    <div class="mt-5 d-flex justify-content-center" style="width: fit-content; height: fit-content;">

        <div class="d-flex flex-column flex-md-row gap-3 p-3 border rounded p-3 bg-white shadow" style="width: fit-content; height: fit-content;">

            <div class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-box">
                <div class="featured-image mb-3">
                    <video controls autoplay class="img-fluid" style="width: auto;">
                        <source src="mp3/trailer.mp4" type="video/mp4">
                        Tu navegador no admite el elemento de video.
                    </video>
                </div>
            </div>

            <!-- Contenedor Formulario -->
            <div class="p-3">

                <div class="header-text mb-2">
                    <h2 class="text-body-secondary">Agregar Categoria</h2>
                </div>

                <?php include_once __DIR__ . "/../../views/includes/alertaTemplate.php"; ?>


                <form action="/admin/categories" method="POST">

                    <div class="input-group mb-2">
                        <input type="number" class="form-control form-control-lg bg-light fs-6" name="id_categoria" placeholder="id_categoria" required>
                    </div>

                    <div class="input-group mb-3">
                        <input type="text" class="form-control form-control-lg bg-light fs-6" name="nombre_categoria" placeholder="nombre_categoria" required>
                    </div>

                    <button type="submit" class="btn btn-lg btn-danger w-100 fs-6" style="background-color: #FF0000;">Agregar</button>
                </form>

                </div>

            </div>

        </div>

    </div>


    <script src="../JS/alerta_bloqueo.js"></script>
</div>

