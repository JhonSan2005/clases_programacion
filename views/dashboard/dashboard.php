
<?php
$fechaInicio = $fechaInicio ?? '';
$fechaFin = $fechaFin ?? '';
?>

<!-- Main Content Start -->
<div class="container mt-4">
    <h1>Estadísticas para el rango de fechas: <?php echo htmlspecialchars($fechaInicio); ?> a <?php echo htmlspecialchars($fechaFin); ?></h1>

    <form method="POST" action="admin/dashboard" class="mb-4">
        <label for="fecha_inicio">Fecha de inicio:</label>
        <input type="date" id="fecha_inicio" name="fecha_inicio" required>
        <label for="fecha_fin">Fecha de fin:</label>
        <input type="date" id="fecha_fin" name="fecha_fin" required>
        <button type="submit" class="btn btn-primary">Obtener Estadísticas</button>
    </form>

    <?php if ($fechaInicio && $fechaFin && $estadisticas) : ?>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Estadística</th>
                        <th>Valor</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Total de usuarios registrados</td>
                        <td><?php echo htmlspecialchars($estadisticas['total_usuarios']); ?></td>
                    </tr>
                    <tr>
                        <td>Total de productos en el sistema</td>
                        <td><?php echo htmlspecialchars($estadisticas['total_productos']); ?></td>
                    </tr>
                    <tr>
                        <td>Total de categorías en el sistema</td>
                        <td><?php echo htmlspecialchars($estadisticas['total_categorias']); ?></td>
                    </tr>
                    <tr>
                        <td>Total de ventas en el rango de fechas</td>
                        <td><?php echo htmlspecialchars($estadisticas['total_ventas']); ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    <?php elseif ($fechaInicio && $fechaFin) : ?>
        <p>No se encontraron estadísticas para el rango de fechas seleccionado.</p>
    <?php endif; ?>
</div>
<!-- Main Content End -->
