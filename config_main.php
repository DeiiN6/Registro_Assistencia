<?php

$conn = mysqli("localhost", "root", "", "sistema_estudiantes");



if ($conn->connect_error) {
    die("Conexion falida: " . $conn->connect_error);
}


