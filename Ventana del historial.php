<?php
// Conexión a la base de datos
$host = "localhost";
$user = "root";
$password = "";
$dbname = "Registro_Asistencias";

$conn = new mysqli($host, $user, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener registros de asistencia
$sql = "
    SELECT 
        Estudiantes.Nombre AS NombreEstudiante,  
        Asistencia.Fecha, 
        Asistencia.Status 
    FROM Asistencia
    INNER JOIN Estudiantes ON Asistencia.IdEstudiante = Estudiantes.Id
    ORDER BY Asistencia.Fecha DESC
";

$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historial de Registro de Asistencia</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body style="overflow: hidden; padding-right: 0px;">
    <!-- Barra de navegación -->
    <nav class="navbar navbar-expand-lg bg-warning fixed-top">
        <div class="container">
            <!-- Botón para abrir la barra lateral -->
            <button class="btn btn-outline-dark me-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasMenu" aria-controls="offcanvasMenu">
                <i class="fas fa-bars"></i>
            </button>
            <a class="navbar-brand" href="#">Historial de Registro</a>
        </div>
    </nav>

    <!-- Menu -->
    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasMenu" aria-labelledby="offcanvasMenuLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasMenuLabel">Menú</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <ul class="list-group">
                <li class="list-group-item"><a href="#" class="text-decoration-none">Inicio</a></li>
                <li class="list-group-item"><a href="ventana del historial.php" class="text-decoration-none">Historial</a></li>
                <li class="list-group-item"><a href="#" class="text-decoration-none">Modificar</a></li>
            </ul>
        </div>
    </div>

    <h1>Historial de Registro de Asistencia</h1>

    <table>
        <thead>
            <tr>
                <th>Nombre del Estudiante</th>
                <th>Fecha</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($result->num_rows > 0): ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['NombreEstudiante']); ?></td>
                        <td><?php echo htmlspecialchars($row['Fecha']); ?></td>
                        <td><?php echo htmlspecialchars($row['Status']); ?></td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="3">No hay registros de asistencia.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <?php $conn->close(); ?>
</body>
</html>
