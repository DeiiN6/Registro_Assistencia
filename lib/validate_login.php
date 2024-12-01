<?php
require 'config.php';

$pdo = getDatabaseConnection();
$matricula = $_POST['matricula'];
$password = $_POST['password'];


$sql = "SELECT * FROM Maestros WHERE IdMaestro = :matricula";
$stmt = $pdo->prepare($sql);
$stmt->execute(['matricula' => $matricula]);

if ($stmt->rowCount() > 0) {
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($user['Contraseña'] === $password) {
        echo "Inicio de sesión exitoso. Bienvenido, " . htmlspecialchars($user['Nombre']) . " " . htmlspecialchars($user['Apellido']) . "!";
    } else {
        echo "Contraseña incorrecta.";
    }
} else {
    echo "La matrícula no existe. <a href='register.php'>Regístrate aquí</a>.";
}
?>
