<?php
require 'config.php';

$pdo = getDatabaseConnection();
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$matricula = $_POST['matricula'];
$password = $_POST['password'];


$sql = "SELECT * FROM Maestros WHERE IdMaestro = :matricula";
$stmt = $pdo->prepare($sql);
$stmt->execute(['matricula' => $matricula]);

if ($stmt->rowCount() > 0) {
    echo "La matrícula ya está registrada. <a href='register.php'>Intentar nuevamente</a>.";
} else {
    $sql = "INSERT INTO Maestros (Nombre, Apellido, IdMaestro, Contraseña) 
            VALUES (:nombre, :apellido, :matricula, :password)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'nombre' => $nombre,
        'apellido' => $apellido,
        'matricula' => $matricula,
        'password' => $password
    ]);
    echo "Registro exitoso. <a href='login.php'>Inicia sesión</a>.";
}
?>
