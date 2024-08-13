<?php
// Archivo: statistics.php

// Incluye el archivo de conexión a la base de datos


// Crear una instancia de la conexión
$conexion = Conexion::conectar();

// Consulta para obtener las estadísticas
$query = "
    SELECT 
        (SELECT COUNT(*) FROM usuario) AS total_usuarios,
        (SELECT COUNT(*) FROM ventas) AS total_ventas,
        (SELECT COUNT(*) FROM productos) AS total_productos,
        (SELECT COUNT(*) FROM categorias) AS total_categorias,
        (SELECT COUNT(*) FROM factura) AS total_facturas
";

$result = $conexion->query($query);

if ($result) {
    $stats = $result->fetch_assoc();
} else {
    die("Error en la consulta: " . $conexion->error);
}
?>

<div class="container mt-4">
    <div class="row">
        <div class="col-md-6">
            <div class="stat-box">
                <h4>Estadísticas de la Página</h4>
                <p><strong>Total de Usuarios Registrados:</strong> <?php echo htmlspecialchars($stats['total_usuarios']); ?></p>
                <p><strong>Total de Ventas:</strong> <?php echo htmlspecialchars($stats['total_ventas']); ?></p>
                <p><strong>Total de Productos:</strong> <?php echo htmlspecialchars($stats['total_productos']); ?></p>
                <p><strong>Total de Categorías:</strong> <?php echo htmlspecialchars($stats['total_categorias']); ?></p>
                <p><strong>Total de Facturas Generadas:</strong> <?php echo htmlspecialchars($stats['total_facturas']); ?></p>
            </div>
        </div>
        <div class="col-md-6">
            <div class="stat-box">
                <h4>Gráficos de Estadísticas</h4>
                <canvas id="statsChart"></canvas>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Datos de las estadísticas
    const data = {
        labels: ['Usuarios', 'Ventas', 'Productos', 'Categorías', 'Facturas'],
        datasets: [{
            label: 'Estadísticas',
            data: [
                <?php echo (int)$stats['total_usuarios']; ?>,
                <?php echo (int)$stats['total_ventas']; ?>,
                <?php echo (int)$stats['total_productos']; ?>,
                <?php echo (int)$stats['total_categorias']; ?>,
                <?php echo (int)$stats['total_facturas']; ?>
            ],
            backgroundColor: ['#FF5733', '#33FF57', '#3357FF', '#FF33A1', '#FFBF00'],
            borderColor: '#000',
            borderWidth: 1,
            borderRadius: 5, // Bordes redondeados en el gráfico
            hoverBorderWidth: 2
        }]
    };

    // Configuración del gráfico
    const config = {
        type: 'bar', // Puedes cambiar esto a 'pie', 'line', etc.
        data: data,
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: true,
                    labels: {
                        font: {
                            size: 14
                        },
                        color: '#333'
                    }
                },
                tooltip: {
                    callbacks: {
                        label: function(tooltipItem) {
                            return tooltipItem.label + ': ' + tooltipItem.raw;
                        }
                    }
                }
            },
            scales: {
                x: {
                    ticks: {
                        font: {
                            size: 12
                        }
                    }
                },
                y: {
                    ticks: {
                        font: {
                            size: 12
                        }
                    }
                }
            }
        }
    };

    // Renderizar el gráfico
    const ctx = document.getElementById('statsChart').getContext('2d');
    new Chart(ctx, config);
});
</script>

<style>
    .container {
        background: linear-gradient(135deg, #f5f5f5 0%, #e2e2e2 100%);
        padding: 20px;
        border-radius: 10px;
    }
    .stat-box {
        border: 1px solid #ddd;
        border-radius: 10px;
        padding: 20px;
        margin: 20px 0;
        background-color: #fff;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .stat-box:hover {
        transform: translateY(-5px);
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
    }
    .stat-box h4 {
        margin-bottom: 15px;
        color: #333;
    }
    canvas {
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
</style>
