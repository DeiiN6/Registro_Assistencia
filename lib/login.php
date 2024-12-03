<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesión</title>
    <link rel="stylesheet" href="../css/styless.css">
</head>
<body>
    <div class="container">
        <h1>Inicio de Sesión</h1>
        <form action="../inicio.php" method="POST">
            <label for="matricula">Matrícula:</label>
            <input type="text" name="matricula" id="matricula" required>
            <label for="password">Contraseña:</label>
            <input type="password" name="password" id="password" required>
            <button type="submit">Iniciar Sesión</button>
        </form>
        <p class="message">¿No tienes cuenta? <a href="register.php">Regístrate aquí</a>.</p>
    </div>
</body>
</html>
