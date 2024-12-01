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
<body>
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
