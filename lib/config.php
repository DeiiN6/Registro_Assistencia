<?php
function getDatabaseConnection() {
    $config = [];
    $file = "../DB.txt";
    
    if (!file_exists($file)) {
        die("Archivo DB.txt no encontrado.");
    }
    
    
    foreach (file($file) as $line) {
        [$key, $value] = explode('=', trim($line));
        $config[$key] = $value;
    }
    
    try {
        $pdo = new PDO("mysql:host={$config['host']};dbname={$config['db']}", $config['user'], $config['pass']);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (PDOException $e) {
        die("Error al conectar con la base de datos: " . $e->getMessage());
    }
}
?>
