<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Maestro</title>
    <link rel="stylesheet" href="../css/styless.css">
</head>
<body>
    <div class="container">
        <h1>Registro de Maestro</h1>
        <form action="save_register.php" method="POST">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre" required>
            <label for="apellido">Apellido:</label>
            <input type="text" name="apellido" id="apellido" required>
            <label for="matricula">Matrícula:</label>
            <input type="text" name="matricula" id="matricula" required>
            <label for="password">Contraseña:</label>
            <input type="password" name="password" id="password" required>
            <button type="submit">Registrar</button>
        </form>
        <p class="message">¿Ya tienes cuenta? <a href="login.php">Inicia sesión aquí</a>.</p>
    </div>
</body>
</html>
