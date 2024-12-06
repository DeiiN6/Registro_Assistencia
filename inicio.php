<?php
// Conexión a la base de datos
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'Registro_Asistencias';

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$success = null;
$error = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_estudiante = $_POST['id_estudiante'];
    $status = $_POST['status'];

    if (!empty($id_estudiante) && !empty($status)) {
        $query = "INSERT INTO Estudiantes (Nombre, IdEstudiante, Status) VALUES ('Estudiantes $id_estudiante', '$id_estudiante', '$status')";
        if ($conn->query($query) === TRUE) {
                $success = "Estudiante registrado correctamente.";
        } else {
            $error = "Error al registrar el estudiante: " . $conn->error;
        }
    } else {
        $error = "Por favor, complete todos los campos.";
    }
    
}

$query = "SELECT * FROM Estudiantes";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Tienda de Libros</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body>
    <!-- Barra de navegación -->
    <nav class="navbar navbar-expand-lg bg-warning fixed-top">
        <div class="container">
            <!-- Botón para abrir la barra lateral -->
            <button class="btn btn-outline-dark me-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasMenu" aria-controls="offcanvasMenu">
                <i class="fas fa-bars"></i>
            </button>
            <a class="navbar-brand" href="#">Registro de Asistencia</a>
        </div>
    </nav>

    <!-- Menu -->
    <div class="offcanvas offcanvas-start bg-warning" tabindex="-1" id="offcanvasMenu" aria-labelledby="offcanvasMenuLabel">
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

    <div class="container mt-5 pt-5">
        <h1 class="text-center mb-4">Sistema de Registro</h1>
        <!-- Mensajes -->
        <?php if ($success): ?>
            <div class="alert alert-success"><?php echo $success; ?></div>
        <?php elseif ($error): ?>
            <div class="alert alert-danger"><?php echo $error; ?></div>
        <?php endif; ?>

        <!-- Formulario-->
        <div class="card mb-4">
            <div class="card-header bg-dark text-white">Registrar Estudiantes</div>
            <div class="card-body">
                <form method="POST">
                    <div class="mb-3">
                        <label for="id_estudiante" class="form-label">ID del Estudiante</label>
                        <input type="text" class="form-control" id="id_estudiante" name="id_estudiante" required>
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Estado</label>
                        <select id="status" name="status" class="form-select" required>
                            <option value="Presente">Presente</option>
                            <option value="Ausente">Ausente</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-warning">Registrar</button>
                </form>
            </div>
        </div>

        <!-- Listado -->
        <div class="card">
            <div class="card-header bg-dark text-white">Listado de Estudiantes</div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nombre</th>
                            <th>ID del Estudiante</th>
                            <th>Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($result && $result->num_rows > 0): ?>
                            <?php while ($row = $result->fetch_assoc()): ?>
                                <tr>
                                    <td><?php echo $row['Id']; ?></td>
                                    <td><?php echo $row['Nombre']; ?></td>
                                    <td><?php echo $row['IdEstudiante']; ?></td>
                                    <td><?php echo $row['Status']; ?></td>
                                </tr>
                            <?php endwhile; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="3" class="text-center">No hay estudiantes registrados.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
