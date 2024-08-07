<div class="container mt-5">
    <h2>Política de Devoluciones</h2>
    <p>En MR Repuestos, nos comprometemos a ofrecer productos de alta calidad. Si no estás completamente satisfecho con tu compra, estamos aquí para ayudarte.</p>

    <h4>Condiciones para Devoluciones</h4>
    <ul>
        <li>El producto debe estar en su estado original y sin uso.</li>
        <li>La devolución debe realizarse dentro de los 30 días posteriores a la compra.</li>
        <li>Es necesario presentar el recibo o comprobante de compra.</li>
    </ul>

    <h4>Proceso de Devolución</h4>
    <ol>
        <li>Completa el formulario de solicitud de devolución a continuación.</li>
        <li>Nos pondremos en contacto contigo para coordinar la devolución.</li>
        <li>Una vez recibido y verificado el producto, procederemos con el reembolso.</li>
    </ol>

    <h4>Formulario de Solicitud de Devolución</h4>
    <form action="procesar_devolucion.php" method="POST">
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required>
        </div>
        <div class="form-group">
            <label for="email">Correo Electrónico</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="telefono">Teléfono</label>
            <input type="text" class="form-control" id="telefono" name="telefono" required>
        </div>
        <div class="form-group">
            <label for="numero_pedido">Número de Pedido</label>
            <input type="text" class="form-control" id="numero_pedido" name="numero_pedido" required>
        </div>
        <div class="form-group">
            <label for="motivo">Motivo de la Devolución</label>
            <textarea class="form-control" id="motivo" name="motivo" rows="3" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Enviar Solicitud</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>